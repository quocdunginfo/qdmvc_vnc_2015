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
    private $for_card = true;

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
            if ($this->function != '') {
                $this->call_fn($this->function);

            } else if ($this->action == 'delete') {
                $this->delete();
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

    protected function call_fn($function)
    {
        $c = static::$model;
        $this->obj = $c::GET($this->data["id"]);
        $this->beforeCallFnAssign();
        $this->assign();

        $class_name = $this->getCalledClass();
        $location = "|{$class_name}|call_fn";
        if (method_exists($this->obj, $function)) {
            if ($this->obj->$function($location, arr)) {
                $this->pushMsg('Call Fn OK, ID=' . $this->obj->id);
            }
            $this->pushMsg($this->obj->GETVALIDATION());
        } else {
            $this->pushMsg("Function  \"{$function}\" not exists", 'error');
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
        if(!static::canInsert())
        {
            $this->pushMsg('Permission: Could not Insert!', 'error');
            return;
        }

        //insert
        $c = static::$model;
        $this->obj = new $c();
        $this->beforeInsertAssign();
        $this->assign();

        $class_name = $this->getCalledClass();
        $location = "|{$class_name}|insert";
        if ($this->obj->save(true, $location)) {
            $this->pushMsg(sprintf(Qdmvc_Message::getMsg('msg_insert_ok'), $this->obj->id));
        }
        $this->pushMsg($this->obj->GETVALIDATION());
    }

    public function getCalledClass()
    {
        return get_called_class();
    }
    protected static function canEdit()
    {
        return true;
    }
    protected function update()
    {
        if(!static::canEdit())
        {
            $this->pushMsg('Permission: Could not Edit!', 'error');
            return;
        }

        //update
        $c = static::$model;
        $this->obj = $c::GET($this->data["id"]);
        $this->beforeInsertAssign();
        $this->assign();
        $class_name = $this->getCalledClass();
        $location = "|{$class_name}|update";
        if ($this->obj->save(true, $location)) {
            $this->pushMsg(sprintf(Qdmvc_Message::getMsg('msg_update_ok'), $this->obj->id));
        }
        $this->pushMsg($this->obj->GETVALIDATION());
    }
    protected static function canView()
    {
        return true;
    }
    protected static function canDelete(){
        return true;
    }
    protected function delete()
    {
        if(!static::canDelete())
        {
            $this->pushMsg('Permission: Could not Delete!', 'error');
            return;
        }

        $c = static::$model;
        $this->obj = $c::find($this->data['id']);
        $class_name = $this->getCalledClass();
        $location = "|{$class_name}|delete";
        if ($this->obj->delete($location)) {
            $this->pushMsg(sprintf(Qdmvc_Message::getMsg('msg_delete_ok'), $this->obj->id));
        }
        $this->pushMsg($this->obj->GETVALIDATION());
    }

    private function loadPostValue()
    {
        $this->data = $_POST['data'];
        $this->action = $_POST['action'];
        $this->function = $_POST['function'];
    }

    protected function list_return()
    {
        if(!static::canView())
        {
            $this->pushMsg('Permission: Could not View', 'error');
            $this->finish(null, array(), 0);
            return;
        }

        $recordstartindex = isset($_REQUEST['recordstartindex']) ? $_REQUEST['recordstartindex'] : 0;
        $pagesize = isset($_REQUEST['pagesize']) ? $_REQUEST['pagesize'] : 10;
        //SORT => May 19, 2015
        $sort_field = 'id';
        if(isset($_REQUEST['sortdatafield']) && $_REQUEST['sortdatafield']!='')
        {
            $sort_field = $_REQUEST['sortdatafield'];
        }
        $sort_direction = 'desc';
        if(isset($_REQUEST['sortorder']) && $_REQUEST['sortorder']!='')
        {
            $sort_direction = $_REQUEST['sortorder'];
        }
        //END SORT

        $c = static::$model;
        $record = new $c();

        //pre filter
        $count = 99;
        while (isset($_REQUEST['filterdatafield' . $count])) {
            //$this->filter[$_REQUEST['filterdatafield'.$count]] = $_REQUEST['filtervalue'.$count];
            $record->SETRANGE($_REQUEST['filterdatafield' . $count], $_REQUEST['filtervalue' . $count], true);
            $count++;
        }
        $count = 0;
        while (isset($_REQUEST['filterdatafield' . $count])) {
            //$this->filter[$_REQUEST['filterdatafield'.$count]] = $_REQUEST['filtervalue'.$count];
            $record->SETRANGE($_REQUEST['filterdatafield' . $count], $_REQUEST['filtervalue' . $count], false);//quocdunginfo
            $count++;
        }


        $record->SETLIMIT($pagesize);
        $record->SETOFFSET($recordstartindex);
        $record->SETORDERBY($sort_field, $sort_direction);

        $this->pushMsg('List Card Return');
        $this->finish(null, $record->GETLIST(), $record->COUNTLIST());
    }

    protected function assign()
    {
        //assign value
        $c = static::$model;
        foreach ($c::getFieldsConfig() as $key => $value) {
            if ($c::ISFLOWFIELD($key) || $c::ISSYSTEMFIELD($key)) {
                continue;
            }
            //Boolean
            if (in_array($c::getDataType($key), array('Boolean'))) {
                if (isset($_POST['data'][$key])) {
                    $this->obj->$key = 1;
                } else {
                    $this->obj->$key = 0;
                }
            }
            if ($c::getDataType($key) == 'Date') {
                if (isset($_POST['data'][$key])) {
                    $tmp = DateTime::createFromFormat(get_option( 'date_format', 'j/m/Y' ), $_POST['data'][$key]);//DateTime::createFromFormat('d/M/Y', "01/01/2015");//$_POST['data'][$key]);
                    if($tmp==false)
                    {
                        $this->obj->$key = null;
                    }else
                    {
                        $this->obj->$key = $tmp;
                    }
                }
            } else {
                if (isset($_POST['data'][$key])) {
                    $this->obj->$key = $_POST['data'][$key];
                }
            }
        }
    }
}