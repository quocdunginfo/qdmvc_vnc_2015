<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 09/02/2015
 * Time: 10:45 PM
 */
class QdRoot extends ActiveRecord\Model
{
    public static $OP_EQUAL = 'EQUAL';
    public static $OP_LESS_THAN_OR_EQUAL = 'LESS_THAN_OR_EQUAL';
    public static $OP_LESS_THAN = 'LESS_EQUAL';
    public static $OP_NOT_EQUAL = 'NOT_EQUAL';
    public static $OP_GREATER_THAN = 'GREATER_THAN';
    public static $OP_GREATER_THAN_OR_EQUAL = 'GREATER_THAN_OR_EQUAL';
    public static $OP_CONTAINS = 'CONTAINS';

    protected static $fields_config = array(
        //SAMPLE FIELD CONFIG
        'id' => array(
            'ReadOnly' => true
        ),
        'owner_id' => array(
            'ReadOnly' => true,
            'FieldClass' => 'System'
        ),
        '__sys_note_url' => array(
            'FieldClass' => 'System'
        ),
        '__sys_log_url' => array(
            'FieldClass' => 'System'
        ),
        '__sys_image_url' => array(
            'FieldClass' => 'System'
        ),
        '__sys_lines_url' => array(
            'FieldClass' => 'System',
            'Caption' => array('en-US' => 'Lines', 'vi-VN' => 'Lines'),
            'TableRelation' => array()
        ),
        '__lasteditor_name' => array(
            'Name' => '_lasteditor_name',
            'Caption' => array('en-US' => 'Last editor name', 'vi-VN' => 'Sửa bởi'),
            'DataType' => 'Text',
            'FieldClass' => 'System',
        ),
        '__owner_name' => array(
            'Name' => '_lasteditor_name',
            'Caption' => array('en-US' => 'Owner name', 'vi-VN' => 'Tạo bởi'),
            'DataType' => 'Text',
            'FieldClass' => 'System',
        ),
        'date_created' => array(
            'Name' => 'date_created',
            'Caption' => array('en-US' => 'Date created', 'vi-VN' => 'Ngày tạo'),
            'DataType' => 'Date',
            'FieldClass' => 'System',
            'ReadOnly' => true
        ),
        'date_modified' => array(
            'Name' => 'date_modified',
            'Caption' => array('en-US' => 'Date modified', 'vi-VN' => 'Ngày sửa cuối'),
            'DataType' => 'Date',
            'FieldClass' => 'System',
            'ReadOnly' => true
        )
    );
    static $primary_key = 'id';

    static $before_update = array('on_before_update'); # new records only

    /**
     *
     */
    public function on_before_update()
    {
        $this->date_modified = new DateTime();
        $this->lasteditor_id = get_current_user_id();
    }

    static $before_create = array('on_before_create'); # new records only

    /**
     *
     */
    public function on_before_create()
    {
        $this->date_created = new DateTime();
        $this->date_modified = $this->date_created;//can not insert date time null
        $this->owner_id = get_current_user_id();
    }

    protected static function  addFieldConfig()
    {

    }

    protected $fields_validation = array(//'0' => array('msg' => 'MSG', 'type' => 'success', 'hash' => md5)
    );

    protected function pushValidateError($field_name = '', $msg = '', $type = 'error')
    {
        //notify
        if (is_array($field_name)) {
            $this->fields_validation = array_merge($this->fields_validation, $field_name);
        } else {
            $hash = md5($field_name . $msg . $type);
            $this->fields_validation[$hash] = array('field' => $field_name, 'msg' => $msg, 'type' => $type);
        }
        //rollback
        //if ($type === 'error') {
        //    static::connection()->rollback();
        //}
    }

    private $_xRec = null;

    protected function xRec()
    {
        if ($this->_xRec == null) {
            if ($this->id !== '0' && $this->id !== 0 && $this->id !== '') {
                $this->_xRec = static::GET($this->id);
            } else {
                $this->_xRec = null;
            }
        }
        return $this->_xRec;
    }

    public function GETVALIDATION()
    {
        return $this->fields_validation;
    }

    protected function OnValidate($field_name)
    {

    }

    /*
     * Validate is exist on parent class (cause duplicate validate when sacing), use other Name
     * */
    protected function QDVALIDATE()
    {
        $tmp = static::getFieldsConfig();
        //call validate trigger on all fields and then return array of error
        foreach ($tmp as $key => $config) {
            if (method_exists($this, $key . 'OnValidate')) {
                $this->{$key . 'OnValidate'}($key);
            }
        }
        foreach ($this->fields_validation as $item) {
            if ($item['type'] == 'error') {
                return false;
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public static function getTbName()
    {
        return static::$table_name;
    }

    /**
     * @param $field_name
     * @return mixed
     */
    public static function getPF($field_name)//get Physical Field
    {
        $config = static::getFieldsConfig();
        return $config[$field_name]['name'];
    }

    public static function GET($id = 1)
    {
        try {
            if (static::exists($id)) {
                return static::find($id);
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /**
     * @param $field_name
     * @return mixed
     */
    public static function getDataType($field_name)
    {
        try {
            $config = static::getFieldsConfig();
            return $config[$field_name]['DataType'];
        } catch (Exception $ex) {
            return 'Text';
        }

    }

    public static function getTableRelation($field_name)
    {
        try {
            $config = static::getFieldsConfig();
            return $config[$field_name]['TableRelation'];
        } catch (Exception $ex) {
            return array();
        }
    }

    protected $record_filter = array(
        'filter_default' => array(),//array(array('field' => 'field_name', 'value' => 'value_filter', 'operator' => 'EQUAL'));
        'filter' => array(),//array(array('field' => 'field_name', 'value' => 'value_filter', 'operator' => 'EQUAL'));
        'limit' => -1,
        'offset' => 0,
        'order' => array(//'id' => 'asc'
        ),
        //'filter_raw' => '1=1 OR 2=2',//raw SQL Condition//May 21 2015, DO NOT USE ANYMORE
        'filter_relation' => 'AND'
    );

    public function SETFILTERDEFAULT($filter = array())
    {
        $this->record_filter['filter_default'] = $filter;
        return $this->SETFILTER($filter);
    }

    public function ADDFILTERDEFAULT($filter = array())
    {
        $this->record_filter['filter_default'] = array_merge($filter);
        return $this->SETFILTER($filter);
    }

    public function delete($location = '')
    {
        if (!$this->checkPermission(__FUNCTION__)) return false;

        $class_name = $this->getCalledClassName();
        if ($class_name != 'QdLog') {
            $location .= "|{$class_name}|delete";
            $action = QdLog::$ACTION_DELETE;
            //write log
            $this->writeLog($action, $location);//quocdunginfo
        }

        $re = parent::delete();
        return $re;
    }

    public function REMOVEFILTERDEFAULT()
    {
        return $this->SETFILTERDEFAULT(array());
    }

    public function REMOVEFILTER()
    {
        $this->record_filter['filter'] = $this->record_filter['filter_default'];
        return $this;
    }

    /**
     * @param $limit
     */
    public function SETLIMIT($limit)
    {
        $this->record_filter['limit'] = $limit;
        return $this;
    }

    /**
     *
     */
    public function REMOVELIMIT()
    {
        $this->record_filter['limit'] = -1;
        return $this;
    }

    /**
     *
     */
    public function REMOVEOFFSET()
    {
        $this->record_filter['offset'] = -1;
        return $this;
    }

    /**
     * @param $offset
     */
    public function SETOFFSET($offset)
    {
        $this->record_filter['offset'] = $offset;
        return $this;
    }

    /**
     * @param $field
     * @param string $asc
     */
    public function SETORDERBY($field, $asc = 'asc')
    {
        $this->record_filter['order'][$field] = $asc;
        return $this;
    }

    public function REMOVEORDERBY()
    {
        $this->record_filter['order'] = array('id' => 'desc');
        return $this;
    }

    /**
     * @param $field
     * @param $value
     */
    protected static function ISPK($field)
    {
        if (strtolower($field) == strtolower(static::$primary_key)) {
            return true;
        }
        return false;
    }

    public function getImages()
    {
        $record = new QdImage();
        $record->SETRANGE('model', $this->getCalledClassName());
        $record->SETRANGE('model_id', $this->id);
        return $record;
    }
    public function FINDFIRST(){
        $this->SETLIMIT(1);
        $tmp = $this->GETLIST();
        $this->REMOVELIMIT();
        if(count($tmp)>0){
            return $tmp[0];
        }else{
            return null;
        }
    }
    public function SELECTMAX($f_name){
        return $this->SELECTAGR($f_name, 'max');
    }
    public function SELECTMIN($f_name){
        return $this->SELECTAGR($f_name, 'min');
    }
    public function SELECTSUM($f_name){
        return $this->SELECTAGR($f_name, 'sum');
    }
    private function SELECTAGR($f_name, $agr){
        $tmp = static::_generateQuery($this->record_filter);
        $tmp = array_merge($tmp, array('select' => "$agr(`$f_name`) as `$f_name`"));
        $agr_value = static::find($tmp);
        if($agr!=null){
            $agr_value = $agr_value->{$f_name};
            return $agr_value;
        }
        return false;
    }
    public function SETRANGE($field, $value, $operator = 'EQUAL')
    {
        //ignore filter on FLOWFIELD
        if (!static::ISFLOWFIELD($field)) {
            if (static::ISPK($field)) {
                //$exact = true;//force filter exact on PK field//Disable this auto convention since NoSeries
            }
            $tmp = array();
            $tmp['value'] = $value;
            $tmp['operator'] = $operator;
            $tmp['field'] = $field;

            array_push($this->record_filter['filter'], $tmp);
        }
        return $this;
    }

    public static function getInitObj()
    {
        $c = get_called_class();
        $obj = new $c();
        return $obj;
    }

    /**
     * array($key => $value)
     *
     * @param $where_array
     */
    public function SETFILTER($where_array)
    {
        $this->record_filter['filter'] = $where_array;
        return $this;
    }

    public function SETFILTERRELATION($relation = 'AND')
    {
        $this->record_filter['filter_relation'] = $relation;
        return $this;
    }

    public function REMOVEFILTERRELATION()
    {
        $this->record_filter['filter_relation'] = 'AND';
        return $this;
    }

    /**
     * @param $field
     */
    public function REMOVERANGE($field)
    {
        $re = array();
        foreach ($this->record_filter['filter'] as $config) {
            if ($config['field'] != $field) {
                array_push($re, $config);
            }
        }
        //unset($this->record_filter['filter'][static::getPF($field)]);
        $this->record_filter['filter'] = $re;
        return $this;
    }

    protected $qd_cached_attr = array();

    protected function CALCFIELDS($flowfield_name)
    {
        $config = static::getFieldsConfig();
        $ff_config = $config[$flowfield_name]['FieldClass_FlowField'];
        if ($ff_config['Method'] == 'Lookup') {
            $ff_config_tf = $ff_config['TableFilter'];
            $c = new $ff_config['Table'];//init new object

            foreach ($ff_config_tf as $filter_item) {
                if ($filter_item['Type'] == 'FIELD') {
                    $c->SETRANGE($filter_item['Field'], $this->{$filter_item['Value']});
                }
            }
            //cache
            $tmp = $c->GETLIST();
            $this->qd_cached_attr[$flowfield_name] = $tmp[0]->{$ff_config['Field']};
            //return
            return $this->qd_cached_attr[$flowfield_name];
        }
    }


    /**
     * @return int
     */
    public function COUNTLIST()
    {
        return static::count(array('conditions' => static::_generateConditionsArray($this->record_filter)));
    }

    /**
     * @return array
     */
    public function GETLIST()
    {
        $query = static::_generateQuery($this->record_filter);
        if (empty($query))//could not find all with empty array query
        {
            return static::all();
        }

        return static::all($query);
    }

    /**
     * @param $record
     * @return array
     */
    protected static function _generateConditionsArray($record)
    {
        if (is_array($record['filter']) && count($record['filter']) > 0) {
            $where = '';
            foreach ($record['filter'] as $config) {
                $key = $config['field'];

                $operator = '=';
                if (isset($config['operator'])) {
                    $operator = Qdmvc_Helper::getOperator($config['operator']);
                }

                if ($operator == 'LIKE') {
                    $where .= "`{$key}` LIKE '%{$config['value']}%' " . $record['filter_relation'] . " ";//quocdunginfo
                } else {
                    $where .= "`{$key}` {$operator} '{$config['value']}' " . $record['filter_relation'] . " ";//quocdunginfo
                }
            }
            if (strtoupper($record['filter_relation']) == 'AND') {
                $where .= '1=1';//trick to avoid SQL fail
            } else {
                $where .= '1=2';//trick to avoid SQL fail
            }
            return array($where);
        }
        return array();
    }

    /**
     * @param $rec_filter
     * @return array
     */
    protected static function _generateQuery($rec_filter)
    {
        $re = array();
        if (is_array($rec_filter)) {
            if (is_array($rec_filter['filter']) && count($rec_filter['filter']) > 0) {
                $re['conditions'] = static::_generateConditionsArray($rec_filter);
            }
            if ($rec_filter['limit'] > 0) {
                $re['limit'] = $rec_filter['limit'];
            }
            if ($rec_filter['offset'] > 0) {
                $re['offset'] = $rec_filter['offset'];
            }
            //BEGIN ORDER
            $order_s = '';
            $count = 0;
            if (is_array($rec_filter['order']) && count($rec_filter['order']) > 0) {
                foreach ($rec_filter['order'] as $order_k => $order_v) {
                    if ($count > 0) {
                        $order_s .= ', ';
                    }
                    $order_s .= "`{$order_k}` {$order_v}";
                    $count++;
                }
            }
            if ($order_s != '') {
                $re['order'] = $order_s;
            }
            //END ORDER
            return $re;
        }
        return $re;
    }

    protected static $lookup_fields = null;

    public static function ISLOOKUPFIELD($field_name)
    {
        try {
            $config = static::getFieldsConfig();
            if (!Qdmvc_Helper::isNullOrEmpty($config[$field_name]['TableRelation']['Table'])) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * This Fn require Qdmvc Index Tree loaded 1st to use Qdmvc_Page_Index
     * @param $model
     * @return int|string
     */
    protected static function getDefaultNavigatePage($model)
    {
        return Qdmvc_Page_Index::getDefaultNavigatePage($model);
    }

    public static function hasLines()
    {
        $cfg = static::getFieldsConfig();
        if (isset($cfg['__sys_lines_url']['TableRelation']) && !empty($cfg['__sys_lines_url']['TableRelation'])) {
            return true;
        }
        return false;
    }

    public static function hasSEOMetaLines()
    {
        $cfg = static::getFieldsConfig();
        if (isset($cfg['__sys_seometa_url']['TableRelation']) && !empty($cfg['__sys_seometa_url']['TableRelation'])) {
            return true;
        }
        return false;
    }

    public function getSEOMetaValue($meta_name = 'TITLE')
    {
        $record = new QdSEOMeta();
        $c = $this->getCalledClassName();
        $record->SETRANGE('model', $c);
        $record->SETRANGE('model_id', $this->id);
        $record->SETRANGE('meta_name', $meta_name);
        $record->SETRANGE('active', true);

        $record = $record->GETLIST();
        if (!empty($record)) {
            return $record[0]->meta_value;
        }
        return false;
    }

    protected function getLinesURL($line_field = '')
    {
        $tbrelation = static::getTableRelation($line_field);
        if ($tbrelation == null || empty($tbrelation)) {
            return '';
        }
        $tbfilter = $tbrelation['TableFilter'];
        $filter_arr = array();
        $df_lk_page = static::getDefaultNavigatePage($tbrelation['Table']);
        $getfield = $tbrelation['Field'];

        foreach ($tbfilter as $item) {
            if ($item['Type'] == 'FIELD') {
                $filter_arr[$item['Field']] = $this->{$item['Value']};
            } else if ($item['Type'] == 'CONST') {
                $filter_arr[$item['Field']] = $item['Value'];
            }
        }

        $tmp = Qdmvc_Helper::getCompactPageListLink($df_lk_page, $filter_arr);
        //COUNT
        $c = $tbrelation['Table'];
        $record = new $c();
        foreach ($filter_arr as $key => $value) {
            $record->SETRANGE($key, $value);
        }

        $count = $record->COUNTLIST();

        return add_query_arg(array('item_count' => $count), $tmp);
    }

    public static function getLookupFields()
    {
        if (static::$lookup_fields != null) {
            return static::$lookup_fields;
        } else {
            $tmp = static::getFieldsConfig();
            static::$lookup_fields = array();
            foreach ($tmp as $field => $config) {
                if (static::ISLOOKUPFIELD($field)) {
                    array_push(static::$lookup_fields, $field);
                }
            }
            return static::$lookup_fields;
        }
    }

    public static function getFieldCaption($field_name, $lang = 'en-US')
    {
        try {
            $config = static::getFieldsConfig();
            if (isset($config[$field_name]['Caption'][$lang])) {
                return $config[$field_name]['Caption'][$lang];
            }
            return '@' . $field_name;
        } catch (Exception $ex) {
            return '@' . $field_name;
            //return Qdmvc_Helper::getNoneText();
        }

    }

    public static function getFieldDescription($field_name, $lang = 'en-US')
    {
        try {
            $config = static::getFieldsConfig();
            if (isset($config[$field_name]['Description'][$lang])) {
                return $config[$field_name]['Description'][$lang];
            }
            return '@' . $field_name;
        } catch (Exception $ex) {
            return '@' . $field_name;
            //return Qdmvc_Helper::getNoneText();
        }

    }

    public static function getFieldsConfig()
    {
        return static::$fields_config;
    }

    public static function getSingleFieldConfig($f_name, $meta_name, $lang = 'en-US')
    {
        if ($meta_name == 'ReadOnly') {
            return static::ISREADONLY($f_name);
        } else {
            $config = static::getFieldsConfig();
            if (!Qdmvc_Helper::isNullOrEmpty($config[$f_name][$meta_name])) {
                return $config[$f_name][$meta_name];
            }
        }
        return '';
    }

    public static function ISREADONLY($f_name)
    {
        try {
            $config = static::getFieldsConfig();
            if (static::ISSYSTEMFIELD($f_name) || static::ISFLOWFIELD($f_name) || (!Qdmvc_Helper::isNullOrEmpty($config[$f_name]['ReadOnly']))) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public static function ISFLOWFIELD($flowfield_name)
    {
        try {
            $config = static::getFieldsConfig();
            return $config[$flowfield_name]['FieldClass'] == 'FlowField';
        } catch (Exception $ex) {
            return false;
        }
    }

    public static function ISSYSTEMFIELD($field_name = '')
    {
        try {
            $config = static::getFieldsConfig();
            return $config[$field_name]['FieldClass'] == 'System';
        } catch (Exception $ex) {
            return false;
        }
    }

    public function __get($field_name)
    {
        //check cached value
        if (is_array($this->qd_cached_attr) && isset($this->qd_cached_attr[$field_name])) {
            return $this->qd_cached_attr[$field_name];
        }
        //calculate field value
        if (static::ISFLOWFIELD($field_name)) {
            //CALC FlowField First
            return $this->CALCFIELDS($field_name);
        } else if (static::ISSYSTEMFIELD($field_name)) {
            $class_name = $this->getCalledClassName();
            //system preserved field
            if ($field_name == '__sys_note_url') {
                $tmp = $this->qd_cached_attr[$field_name] = Qdmvc_Helper::getCompactPageListLink('note', array('model' => $class_name, 'model_id' => $this->id));
                //COUNT
                $record = new QdNote();
                $record->SETRANGE('model', $this->getCalledClassName());
                $record->SETRANGE('model_id', $this->id);
                $count = $record->COUNTLIST();

                return add_query_arg(array('item_count' => $count), $tmp);
            } else if ($field_name == '__sys_log_url') {
                $tmp = $this->qd_cached_attr[$field_name] = Qdmvc_Helper::getCompactPageListLink('log', array('model' => $class_name, 'model_id' => $this->id));
                //COUNT
                $record = new QdLog();
                $record->SETRANGE('model', $this->getCalledClassName());
                $record->SETRANGE('model_id', $this->id);
                $count = $record->COUNTLIST();

                return add_query_arg(array('item_count' => $count), $tmp);
            } else if ($field_name == '__sys_image_url') {
                $tmp = $this->qd_cached_attr[$field_name] = Qdmvc_Helper::getCompactPageListLink('image', array('model' => $class_name, 'model_id' => $this->id));
                //COUNT
                $record = new QdImage();
                $record->SETRANGE('model', $this->getCalledClassName());
                $record->SETRANGE('model_id', $this->id);
                $count = $record->COUNTLIST();

                return add_query_arg(array('item_count' => $count), $tmp);
            } else if ($field_name == '__lasteditor_name') {
                if ($this->lasteditor_id > 0) {
                    $user_info = get_userdata($this->lasteditor_id);
                    return $this->qd_cached_attr[$field_name] = $user_info->user_login;
                }
                return Qdmvc_Helper::getNoneText();
            } else if ($field_name == '__owner_name') {
                if ($this->owner_id > 0) {
                    $user_info = get_userdata($this->owner_id);
                    return $this->qd_cached_attr[$field_name] = $user_info->user_login;
                }
                return Qdmvc_Helper::getNoneText();
            }
            else if ($field_name == 'date_created' || $field_name == 'date_modified' || $field_name=='owner_id') {
                return parent::__get($field_name);
            }else {// if ($field_name == '__sys_lines_url') {//Default system Lines Field
                return $this->getLinesURL($field_name);
            }
        }
        return parent::__get($field_name);
    }

    protected function getCalledClassName()
    {
        return get_called_class();
    }

    protected function getClassName()
    {
        return get_class($this);
    }

    public static function toJSON($list)
    {
        $tmp = array();
        foreach ($list as $item) {
            $arr = array();
            foreach (static::getFieldsConfig() as $key => $value) {
                $datatype = static::getDataType($key);
                if ($datatype == 'Date') {
                    $dtmp0 = $item->$key;
                    //$dtmp = new DateTime($item->$key);
                    if ($dtmp0 != null) {
                        $arr[$key] = date_format($dtmp0, get_option('date_format', 'j/m/Y'));//quocdunginfo
                    } else {
                        $arr[$key] = '';
                    }
                    continue;

                } else if ($datatype == 'Boolean' || $datatype == 'Integer') {
                    $arr[$key] = $item->$key;
                    continue;
                }
                $arr[$key] = (string)$item->$key;
            }
            array_push($tmp, $arr);
        }
        return $tmp;
    }

    public function __set($name, $value)
    {
        //prevent set ERROR on 2 special type
        if (static::ISFLOWFIELD($name)) {
            return $value;
        }else if (static::ISSYSTEMFIELD($name)){
            if($name=='date_created' || $name=='date_modified' || $name=='owner_id'){
                return parent::__set($name, $value);
            }
            return $value;
        }
        return parent::__set($name, $value);
    }

    public function getNoSeries()
    {
        //check in NoSeriesMap
        $record = new QdNoSeriesMap();
        $record->SETRANGE('active', true);
        $record->SETRANGE('model', $this->getCalledClassName());
        $record = $record->GETLIST();
        if (!empty($record)) {
            $record = $record[0];
            if ($record->noseries != '') {
                return $record->noseries;
            }
        }

        //by default dont use NoSeries
        return false;
    }

    public function save($validate = true, $location = '')
    {
        //replace all \" to ", to prevent " loopback when saving (client->server " -> \")
        /*$config = static::getFieldsConfig();
        foreach ($config as $key => $value) {
            if (!static::ISFLOWFIELD($key) && !static::ISSYSTEMFIELD($key)) {
                $this->{$key} = str_replace('\\"', '"', $this->{$key});//quocdunginfo, need to find other approach
                $this->{$key} = str_replace("\\'", "'", $this->{$key});//quocdunginfo, need to find other approach
            }
        }*/
        //check permission
        if (!$this->checkPermission(__FUNCTION__)) return false;

        //do validate and save
        if ($this->QDVALIDATE()) {
            $action = $this->is_new_record() ? QdLog::$ACTION_INSERT : QdLog::$ACTION_MODIFY;
            //assign no series before insert
            if ($this->id === null || $this->id === false || $this->id === 0 || $this->id === '0') {
                $use_noseries = $this->getNoSeries();
                if ($use_noseries === false) {
                    //do not use noseries
                } else {
                    //use no series
                    $tmpnose = $this->getNoFromNoSeries($use_noseries);
                    if ($tmpnose === false) {
                        $this->pushValidateError('', 'NoSeries Fail', 'error');
                        return false;
                    } else {
                        $this->id = $tmpnose;
                    }
                }
            } else {
                //manual or update => do not get next no
            }

            try {
                $re = parent::save($validate);//checked on July 05, 2015, Only 1 root save called
                $class_name = $this->getCalledClassName();
                $location .= "|{$class_name}|save";
                if ($re && $class_name != 'QdLog') {
                    //write log
                    $this->writeLog($action, $location);//quocdunginfo
                }
                return $re;
            } catch (Exception $ex) {
                //$this->id = 0;
                return false;
            }

        } else {
            return false;
        }
    }

    protected function writeLog($action = 0, $location = '')
    {
        $location .= '|writeLog';
        $obj = QdLog::getInitObj($this->getCalledClassName(), $this->id, $action, $location, Qdmvc_Helper::getClientIP());
        return $obj->save();
    }

    public static function getFieldOptions($field_name, $lang = 'en-US')
    {
        try {
            $tmp = array();
            $config = static::getFieldsConfig();
            $t = $config[$field_name]['Options'];
            foreach ($t as $value => $config) {
                $tmp[$value] = $config['Caption'][$lang];
            }

            return $tmp;
        } catch (Exception $ex) {
            return array();
        }
    }

    public function fn_($location, $params = array())
    {

    }

    public function getBreadcrumbs()
    {
        return array(array('name' => Qdmvc_Helper::getNoneText(), 'url' => Qdmvc_Helper::getNoneLink()));
    }

    private function getNoFromNoSeries($noseries_id)
    {
        $tmp = QdNoSeries::GET($noseries_id);
        if ($tmp != null) {
            $next_no = $tmp->getNextNo();
            if ($next_no === false) {
                $this->pushValidateError($tmp->GETVALIDATION());
                //$this->pushValidateError('', 'ERROR: getNoFromNoSeries', 'error');
                return false;
            } else {
                return $next_no;
            }
        } else {
            return false;
        }
    }

    public function transferFieldsFrom($source)
    {
        if ($source != null) {
            foreach ($source::getFieldsConfig() as $key => $config) {
                $this->{$key} = $source->{$key};
            }
        }
        return true;
    }

    protected function checkPermission($method_name)
    {
        $class_name = $this->getCalledClassName();
        //get Permissions
        $u = QdUser::GET(get_current_user_id());
        if ($u != null) {
            if (!$u->hasPermission($class_name, $method_name)) {
                $this->pushValidateError('', 'You are not allowed to call ' . $class_name . '|' . $method_name);
                return false;
            }
        }
        return true;
    }

    public function getSEOMeta()
    {
        $tmp = new QdSEOMeta();
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('model', $this->getCalledClassName());
        $tmp->SETRANGE('model_id', $this->id);
        return $tmp->GETLIST();
    }
}