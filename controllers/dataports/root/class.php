<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 15/02/2015
 * Time: 9:20 AM
 */
class Qdmvc_Dataport
{
    protected static $model = '';
    protected $obj = null;
    protected $data = null;
    protected $msg = array();//array(array('msg' => 'MSG', 'type' => 'error'), array('msg2' => 'MSG', 'type' => 'warning', 'hash' => md5))
    protected $action = 'update';
    protected $function = '';
    protected $working_mode = '';
    protected $function_params = array();
    protected $manual_no = false;
    private $for_card = true;
    private $fn_result = false;

    function __construct()
    {

    }

    protected function pushMsg($msg = '', $type = '')
    {
        if (is_array($msg)) {
            $this->msg = array_merge($this->msg, $msg);
        } else {
            //array_push($this->msg, array('field' => '', 'msg' => $msg, 'type' => $type, 'hash' => md5(''.$msg.$type)));
            $this->msg[md5('' . $msg . $type)] = array('field' => '', 'msg' => $msg, 'type' => $type);
        }
    }

    protected function checkSecurity()
    {
        return is_user_logged_in();
    }

    public function run()
    {
        header('Content-Type: application/json');
        //check security
        if (!$this->checkSecurity()) {
            $this->pushMsg('You are not allowed to access dataport!', 'error');
            $this->finish();
            return;
        }

        $this->for_card = isset($_POST) && isset($_POST['submit']);
        if ($this->for_card) {
            $this->loadPostValue();
            //call service fn
            if ($this->action=='call_fn') {
                if($this->function != '')
                    $this->call_fn($this->data['id'], $this->function);
            }if ($this->action=='call_fn_multi') {
                if($this->function != '')
                    $this->call_fn_multi($this->data['id'], $this->function);
            } else if ($this->action == 'delete') {
                $this->delete($this->data['id']);
            } else if ($this->action == 'delete_multi') {
                $this->delete_multi($this->data['id']);
            } else if ($this->action == 'update') {
                $this->update();
            } else if ($this->action == 'insert') {
                $this->insert();
            }
            $this->card_return();
        } else {
            $this->list_return();
        }
    }
    protected function call_fn_multi($ids, $function){
        foreach($ids as $id){
            $this->call_fn($id, $function);
        }
    }
    protected function call_fn($id, $function)
    {
        $c = static::$model;
        $this->obj = $c::GET($id);
        if ($this->obj != null) {
            $this->beforeCallFnAssign();
            //$this->assign();//call Fn do not auto save because of multi-objs
        } else {
            $this->obj = new $c();
        }

        $class_name = $this->getCalledClassName();
        $location = "|{$class_name}|call_fn";

        if (!$this->checkPermission(__FUNCTION__)) return false;

        if (method_exists($this->obj, $function)) {
            $this->fn_result = $this->obj->$function($location, $this->function_params);
            if ($this->fn_result !== false) {
                $this->pushMsg('Call Fn OK, ID=' . $this->obj->id);
            }
            $this->pushMsg($this->obj->GETVALIDATION());
        } else {
            $this->pushMsg("Function \"{$function}\" not exists", 'error');
        }
    }

    protected function finish($msg_array = null, $result_array = null, $total = 0, $id = 0)
    {
        $re = array();
        $c = static::$model;
        if ($msg_array != null) {
            $re['msg'] = $msg_array;
        } else {
            $re['msg'] = $this->msg;
        }
        if ($result_array != null) {
            $re['rows'] = $c::toJSON($result_array);
        } else {
            $re['rows'] = array();
        }
        $re['id'] = $id;

        $re['total'] = $total;
        $re['working_mode'] = $this->working_mode;
        $re['fn_result'] = $this->fn_result;
        echo json_encode($re);
        exit(0);
    }

    private function card_return()
    {
        $this->finish(null, array($this->obj), 1, $this->obj->id);
    }

    protected function beforeInsertAssign()
    {

    }

    protected function beforeCallFnAssign()
    {

    }

    protected function beforeUpdateAssign()
    {

    }

    protected static function canInsert()
    {
        return true;
    }

    protected function insert()
    {
        $this->working_mode = 'insert_fail';

        if (!static::canInsert()) {
            $this->pushMsg('Permission: Could not Insert!', 'error');
            return false;
        }
        //insert
        $c = static::$model;

        //check manual mode
        if ($this->manual_no == true) {
            //get noseries
            $tmp = new $c();
            $tmp = QdNoSeries::GET($tmp->getNoSeries());
            if ($tmp != null && $tmp->manual_allowed == false) {
                $this->pushMsg('Manual No are not allowed for this Model', 'error');
                return false;
            }
        }

        //check duplicate id
        if ($c::GET($this->data['id'])) {
            $this->pushMsg(sprintf('Can not insert: Duplicate ID with record %s', $this->data['id']), 'error');
            return false;
        }

        $this->obj = $c::getInitObj();
        $this->obj->id = $this->data['id'];//force assign id while manual mode
        $this->beforeInsertAssign();
        $this->assign();
        if (!$this->checkPermission(__FUNCTION__)) return false;


        $class_name = $this->getCalledClassName();
        $location = "|{$class_name}|insert";

        if ($this->obj->save(true, $location)) {
            $this->pushMsg($this->obj->GETVALIDATION());
            $this->pushMsg(sprintf(Qdmvc_Message::getMsg('msg_insert_ok'), $this->obj->id));
            $this->working_mode = 'insert_ok';
            return true;
        } else {
            $this->pushMsg($this->obj->GETVALIDATION());
            return false;
        }
    }

    protected function getCalledClassName()
    {
        return get_called_class();
    }

    protected static function canEdit()
    {
        return true;
    }

    protected function update()
    {
        $this->working_mode = 'update_fail';
        if (!static::canEdit()) {
            $this->pushMsg('Permission: Could not Edit!', 'error');
            return;
        }
        //prevent manual no
        if ($this->manual_no == true) {
            $this->pushMsg('[Manual No] are not allowed in update mode', 'error');
            return;
        }
        //update
        $c = static::$model;

        $this->obj = $c::GET($this->data["id"]);
        if ($this->obj == null) {
            $this->pushMsg('Record does not existed for update', 'error');
            return;
        }

        $this->beforeInsertAssign();
        $this->assign();

        if (!$this->checkPermission(__FUNCTION__)) return false;

        $class_name = $this->getCalledClassName();
        $location = "|{$class_name}|update";

        if ($this->obj->save(true, $location)) {
            $this->pushMsg($this->obj->GETVALIDATION());
            $this->pushMsg(sprintf(Qdmvc_Message::getMsg('msg_update_ok'), $this->obj->id));
            $this->working_mode = 'update_ok';
            return true;
        } else {
            $this->pushMsg($this->obj->GETVALIDATION());
            return false;
        }

    }

    protected static function canView()
    {
        return true;
    }

    protected static function canDelete()
    {
        return true;
    }

    protected function delete($id)
    {
        $this->working_mode = 'delete_fail';
        if (!static::canDelete()) {
            $this->pushMsg('Permission: Could not Delete!', 'error');
            return;
        }
        $c = static::$model;
        $this->obj = $c::GET($id);
        if ($this->obj == null) {
            $this->pushMsg('Record does not existed for delete, ID='.$id, 'error');
            return;
        }
        $class_name = $this->getCalledClassName();
        $location = "|{$class_name}|delete";

        if (!$this->checkPermission(__FUNCTION__)) return false;

        if ($this->obj->delete($location)) {
            $this->pushMsg(sprintf(Qdmvc_Message::getMsg('msg_delete_ok'), $this->obj->id));
            $this->working_mode = 'delete_ok';
            return true;
        } else {
            $this->pushMsg($this->obj->GETVALIDATION());
            return false;
        }
    }
    protected function delete_multi($ids)
    {
        foreach($ids as $id){
            $this->delete($id);
        }
    }

    private function loadPostValue()
    {
        $this->data = isset($_POST['data']) ? $_POST['data'] : array();
        $this->function_params = isset($_POST['params']) ? $_POST['params'] : array();
        $this->action = isset($_POST['action']) ? $_POST['action'] : '';

        if (isset($_POST['manual_no'])) {
            if ($_POST['manual_no'] === 'false' || $_POST['manual_no'] === false || $_POST['manual_no'] === 0 || $_POST['manual_no'] === '0') {
                //do not thing
            } else {
                $this->manual_no = true;
            }
        }

        $this->function = isset($_POST['function']) ? $_POST['function'] : '';
    }

    protected function list_return()
    {
        if (!static::canView() || !$this->checkPermission(__FUNCTION__)) {
            $this->pushMsg('Permission: Could not View', 'error');
            $this->finish(null, array(), 0);
            return;
        }

        $recordstartindex = isset($_REQUEST['recordstartindex']) ? $_REQUEST['recordstartindex'] : 0;
        $pagesize = isset($_REQUEST['pagesize']) ? $_REQUEST['pagesize'] : 10;
        //SORT => May 19, 2015
        $sort_field = 'date_created';
        if (isset($_REQUEST['sortdatafield']) && $_REQUEST['sortdatafield'] != '') {
            $sort_field = $_REQUEST['sortdatafield'];
        }
        $sort_direction = 'desc';
        if (isset($_REQUEST['sortorder']) && $_REQUEST['sortorder'] != '') {
            $sort_direction = $_REQUEST['sortorder'];
        }
        //END SORT

        $c = static::$model;
        $record = new $c();

        foreach ($_REQUEST as $key => $value) {
            if (strstr($key, 'filterdatafield') !== false) {
                $number = substr($key, 15);
                $f_operator = 'filtercondition' . $number;
                $f_operator = isset($_REQUEST[$f_operator]) ? $_REQUEST[$f_operator] : null;

                $f_value = $_REQUEST['filtervalue' . $number];
                $key = $_REQUEST[$key];
                if(strstr($f_value, '&&')){
                    $value = explode('&&', $f_value);
                    $record = $this->SETFILTER($record, $key, $value[0], $f_operator);
                    $record = $this->SETFILTER($record, $key, $value[1], $f_operator);
                }else{
                    $record = $this->SETFILTER($record, $key, $f_value, $f_operator);
                }
            }
        }

        $record->SETLIMIT($pagesize);
        $record->SETOFFSET($recordstartindex);
        if($record::ISFLOWFIELD($sort_field)===false){
            $record->SETORDERBY($sort_field, $sort_direction);
        }

        $this->pushMsg('List Card Return');
        $this->finish(null, $record->GETLIST(), $record->COUNTLIST());
    }
    private function SETFILTER($record, $key, $f_value, $f_operator_2=null){
        //*, = higher priority than CONTAINS, EQUAL
        $f_operator = null;
        if(strstr($f_value,'*')){
            $f_value = str_replace('*', '', $f_value);
            $f_operator = 'CONTAINS';
        }else if(strstr($f_value,'!=')){
            $f_value = str_replace('!=', '', $f_value);
            $f_operator = 'NOT_EQUAL';
        }else if(strstr($f_value,'>=')){
            $f_value = str_replace('>=', '', $f_value);
            $f_operator = 'GREATER_THAN_OR_EQUAL';
        }else if(strstr($f_value,'<=')){
            $f_value = str_replace('<=', '', $f_value);
            $f_operator = 'LESS_THAN_OR_EQUAL';
        }else if(strstr($f_value,'=')){
            $f_value = str_replace('=', '', $f_value);
            $f_operator = 'EQUAL';
        }else if(strstr($f_value,'<')){
            $f_value = str_replace('<', '', $f_value);
            $f_operator = 'LESS_THAN';
        }else if(strstr($f_value,'>')){
            $f_value = str_replace('>', '', $f_value);
            $f_operator = 'GREATER_THAN';
        }
        if($f_operator===null){
            $f_operator = $f_operator_2;
        }
        $record->SETRANGE($key, $f_value, $f_operator);
        return $record;
    }

    protected function assign()
    {
        //assign value
        $c = static::$model;
        foreach ($c::getFieldsConfig() as $key => $value) {
            if ($c::ISFLOWFIELD($key) || $c::ISSYSTEMFIELD($key)) {
                continue;
            }
            //check allow submit field
            if (!QdT_Library::isNullOrEmpty(static::allowSubmitFields())) {
                if (!in_array($key, static::allowSubmitFields())) {
                    continue;
                }
            }

            //Boolean
            if (in_array($c::getDataType($key), array('Boolean'))) {
                $this->obj->$key = 0;
                if (isset($_POST['data'][$key])) {
                    if ($_POST['data'][$key] === 'true' || $_POST['data'][$key] === '1' || $_POST['data'][$key] === 1 || $_POST['data'][$key] === true) {
                        $this->obj->$key = 1;
                    }
                }
                continue;
            }
            if ($c::getDataType($key) == 'Date') {
                if (isset($_POST['data'][$key])) {
                    $tmp = DateTime::createFromFormat(get_option('date_format', 'j/m/Y'), $_POST['data'][$key]);//DateTime::createFromFormat('d/M/Y', "01/01/2015");//$_POST['data'][$key]);
                    if ($tmp == false) {
                        $this->obj->$key = null;
                    } else {
                        $this->obj->$key = $tmp;
                    }
                }
                continue;
            }

            if (isset($_POST['data'][$key])) {
                $this->obj->$key = $_POST['data'][$key];
                $this->obj->$key = str_replace('\\"', '"', $this->obj->$key);//quocdunginfo, need to find other approach
                $this->obj->$key = str_replace("\\'", "'", $this->obj->$key);//quocdunginfo, need to find other approach
            }
        }
    }

    protected static function allowSubmitFields()
    {
        return array();
    }

    protected function checkPermission($method_name)
    {
        $class_name = $this->getCalledClassName();
        //get Permissions
        $u = QdUser::GET(get_current_user_id());
        if ($u != null) {
            if (!$u->hasPermission($class_name, $method_name)) {
                $this->pushMsg('You are not allowed to call ' . $class_name . '|' . $method_name, 'error');
                return false;
            }
        }
        return true;
    }

    protected function getClassName()
    {
        return get_class($this);
    }
}