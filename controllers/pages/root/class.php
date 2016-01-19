<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:34 PM
 */
class Qdmvc_Page_Root
{
    protected $data = array();
    protected static $fields_show = array();

    function __construct()
    {
        if (!$this->checkPermission()) {
            $this->data['nopermission'] = true;
        } else {
            $this->data['nopermission'] = false;
        }

        $this->loadView();
        //build data_port value
        $this->data['data_port'] = Qdmvc_Helper::getDataPortPath(static::getDataPort(), $this->getPageView());
        //pre value for page List
        $this->data['role'] = isset($_GET['qdrole']) ? $_GET['qdrole'] : '';//lookup, navigate
        $this->data['lookupid'] = isset($_GET['qdlookupid']) ? $_GET['qdlookupid'] : null;
        $this->data['returnid'] = isset($_GET['qdreturnid']) ? $_GET['qdreturnid'] : null;
        $this->data['getfield'] = isset($_GET['qdgetfield']) ? $_GET['qdgetfield'] : null;
        $this->data['view_style'] = 'normal';
        $this->data['language'] = Qdmvc_Config::getLanguage();
        $this->data['init_obj'] = $this->getInitObjJSON();
        if ($this->data['role'] == 'lookup' || $this->data['role'] == 'navigate') {
            $this->data['view_style'] = 'compact';//compact, full
        }

        static::initFields();
    }

    protected function getPageView()
    {
        $re = array();
        //passing page filter
        //pre filter
        foreach ($_REQUEST as $key => $value) {
            if (strstr($key, 'filterdatafield') !== false) {
                $number = substr($key, 15);
                $f_condition = 'filtercondition' . $number;
                $f_condition = isset($_REQUEST[$f_condition]) ? $_REQUEST[$f_condition] : 'EQUAL';

                $f_value = $_REQUEST['filtervalue' . $number];
                $f_field = $_REQUEST[$key];

                $re[$f_field] = array(
                    'field' => $f_field,
                    'value' => $f_value,
                    'operator' => $f_condition
                );
            }
        }
        $ree = array_merge($this->getCustomPageView(), $re);
        return $ree;
    }

    protected function getCustomPageView()
    {
        return array();
    }

    public function getFilter()
    {
        return $this->data['filter'];
    }

    protected static function initFields()
    {
        return array(
            'id' => array(
                'Order' => 10,
                'ReadOnly' => true,
                'Width' => 70
            )
        );
    }

    public function run()
    {
        //load View and render
        $c = static::getViewClass();
        if ($c != '') {
            $tmp = new $c($this);
            $tmp->render();
        }
    }

    protected static function getViewClass()
    {
        return '';
    }

    /*
     * Page List Only
     */
    public static function getWidth($f_name)
    {
        try {
            return static::getFieldsConfig($f_name, 'Width');
        } catch (Exception $ex) {
            return '';
        }
    }

    public function getPagePartURL($part_name = '')
    {
        return '';
    }

    public static function isReadOnly($f_name)
    {
        //$c = static::getModel();
        //return $c::ISREADONLY($f_name);
        return static::getFieldsConfig($f_name, 'ReadOnly');
    }
    public static function isMultiValue($f_name)
    {
        //$c = static::getModel();
        //return $c::ISREADONLY($f_name);
        return static::getFieldsConfig($f_name, 'MultiValue');
    }
    public static function getImagePreview($field_name)
    {
        return static::getFieldsConfig($field_name, 'ImagePreviewField');
    }

    public static function getDataType($field_name)
    {
        return static::getFieldsConfig($field_name, 'DataType');
    }

    public static function getLookupURL($field_name)
    {
        $c = static::getModel();
        if ($c::ISLOOKUPFIELD($field_name)) {
            $tbrelation = $c::getTableRelation($field_name);
            $clkp = $c::getLookupPage($field_name);

            if (!Qdmvc_Helper::isNullOrEmpty($tbrelation)) {
                $tbfilter = $tbrelation['TableFilter'];

                $filter_arr = array();
                if($clkp==='') {
                    $df_lk_page = static::getDefaultLookupPage($tbrelation['Table']);
                }else{
                    $df_lk_page = $clkp;
                }
                $getfield = $tbrelation['Field'];

                foreach ($tbfilter as $item) {
                    $filter_arr[$item['Field']] = $item['Value'];
                }

                return Qdmvc_Helper::getLookupPath($df_lk_page, $field_name, $filter_arr, $getfield);
            }
        }
        return '';
    }

    protected static function getDefaultLookupPage($model)
    {
        return Qdmvc_Page_Index::getDefaultLookupPage($model);
    }

    protected function loadView($name = 'view')
    {
        Qdmvc::loadController('/pages/' . static::getPage() . '/' . $name);
    }

    /*
     * Trả về tên của Page, Setup trong Page Index Tree
     */
    public static function getPage()
    {

    }

    public static function hasLines()
    {
        $c = static::getModel();
        return $c::hasLines();
    }

    public static function hasSEOMetaLines()
    {
        $c = static::getModel();
        return $c::hasSEOMetaLines();
    }

    /*
     * json init object
     */
    protected function getInitObj()
    {
        $c = static::getModel();
        //if run page root direct
        if (!class_exists($c)) {
            return null;
        }
        $obj = $c::getInitObj();
        //set pre filter
        $arr = static::getPageView();
        foreach ($arr as $field => $value) {
            if (!is_array($value)) {
                $obj->{$field} = $value;
            } else {
                $obj->{$field} = $value['value'];
            }
        }
        return $obj;
    }

    private function getInitObjJSON()
    {
        $obj = $this->getInitObj();
        $c = static::getModel();
        //convert to JSON
        $re = $c::toJSON(array($obj));
        return json_encode($re[0]);
    }

    /*
     * Trả về Caption của 1 field nào đó, thông qua Setup trong Model tương ứng
     */
    public function getFieldCaption($field_name, $lang = 'en-US')
    {
        //check in Page Config first
        foreach (static::getLayout() as $group => $gconfig) {
            if (isset($gconfig['Type']) && $gconfig['Type'] === 'Group') {
                //Page Card
                //if(isset($gconfig['Fields'][$field_name]['Caption'])){
                //if(is_array($gconfig['Fields'][$field_name]['Caption'])){
                if (isset($gconfig['Fields'][$field_name]['Caption'][$lang])) {
                    return $gconfig['Fields'][$field_name]['Caption'][$lang];
                }
                //}
                //}
            } else {
                //Page List
                if ($group === $field_name) {
                    if (isset($gconfig['Caption'][$lang])) {
                        return $gconfig['Caption'][$lang];
                    }
                }
            }
        }
        //look up in Model
        $c = static::getModel();
        return $c::getFieldCaption($field_name, $lang);
    }

    public function getFieldDescription($field_name, $lang = 'en-US')
    {
        //check in Page Config first
        foreach (static::getLayout() as $group => $gconfig) {
            if (isset($gconfig['Type']) && $gconfig['Type'] === 'Group') {
                //Page Card
                //if(isset($gconfig['Fields'][$field_name]['Caption'])){
                //if(is_array($gconfig['Fields'][$field_name]['Caption'])){
                if (isset($gconfig['Fields'][$field_name]['Description'][$lang])) {
                    return $gconfig['Fields'][$field_name]['Description'][$lang];
                }
                //}
                //}
            } else {
                //Page List
                if ($group === $field_name) {
                    if (isset($gconfig['Description'][$lang])) {
                        return $gconfig['Description'][$lang];
                    }
                }
            }
        }
        //look up in Model
        $c = static::getModel();
        return $c::getFieldDescription($field_name, $lang);
    }

    public static function getLayout()
    {
        if (static::$fields_show == null) {
            static::$fields_show = static::initFields();
            //apply sorting
            uasort(static::$fields_show, "static::compareArray");
            foreach (static::$fields_show as $key => &$config) {
                if ($config['Type'] == 'Group' && isset($config['Fields'])) {
                    uasort($config['Fields'], "static::compareArray");
                }
            }
            //end apply sorting
        }
        return static::$fields_show;
    }

    private static function compareArray($a, $b)
    {
        if (isset($a['Order']) && isset($b['Order'])) {
            if ($a['Order'] == $b['Order']) {
                return 0;
            }
            return $a['Order'] - $b['Order'];
        }
        return 0;
    }

    /*
     * Trả về PageList Navigation tương ứng với PageCard hiện hành
     */
    protected function getPageList()
    {
        $index = Qdmvc_Page_Index::getIndex();
        $page = $index[static::getPage()];
        if (isset($page['PageList'])) {
            return $page['PageList'];
        }
    }

    /*
     * Trả về URL của PageList Navigation sau khi đã thêm filter đầy đủ
     */
    public function getPageListURL()
    {
        $filter = $this->getPageView();

        return Qdmvc_Helper::getCompactPageListLink($this->getPageList(), $filter);
    }

    /*
     * Trả về DataPort (name only)
     */
    public static function getDataPort()
    {
        $index = Qdmvc_Page_Index::getIndex();
        $page = $index[static::getPage()];
        if (isset($page['DataPort'])) {
            return $page['DataPort'];
        }
    }

    /*
     * Trả về Model (class name - NOT Table name)
     */
    public static function getModel()
    {
        $index = Qdmvc_Page_Index::getIndex();
        $page = $index[static::getPage()];
        if (isset($page['Model'])) {
            return $page['Model'];
        }
        return '';
    }

    public static function getCaption($lang = 'en-US')
    {
        $index = Qdmvc_Page_Index::getIndex();
        $page = $index[static::getPage()];
        if (isset($page['Caption'][$lang])) {
            return $page['Caption'][$lang];
        } else {
            return 'Default Page Root Caption';
        }
    }

    /*
     * Trả về data dành cho View (MVC)
     */
    public function getData()
    {
        return $this->data;
    }

    public static function getFieldOptions($f_name, $lang = 'en-US')
    {
        $c = static::getModel();
        return $c::getFieldOptions($f_name, $lang);
    }
    public static function getMultiValueField($f_name)
    {
        return static::getFieldsConfig($f_name, 'MultiValue_Field');
    }
    public static function getMultiValueDataPort($f_name)
    {
        return static::getFieldsConfig($f_name, 'MultiValue_DataPort');
    }
    public static function getFieldDataPort($f_name)
    {
        return static::getFieldsConfig($f_name, 'DataPort');
    }

    protected static function getFieldsConfig($f_name, $meta_name, $lang = 'en-US')
    {
        //check in Layout first
        foreach (static::getLayout() as $group => $config) {
            if (isset($config['Type']) && $config['Type'] == 'Group') {
                if (!Qdmvc_Helper::isNullOrEmpty($config['Fields'][$f_name][$meta_name])) {
                    return $config['Fields'][$f_name][$meta_name];
                }
            }
        }
        //check in Model
        $c = static::getModel();
        $tmp = $c::getSingleFieldConfig($f_name, $meta_name, $lang);
        if (Qdmvc_Helper::isNullOrEmpty($tmp) && $meta_name == 'SourceExpr') {
            $tmp = $f_name;
        }
        return $tmp;
    }
    /*
     * Get All fields help (description meta), Page Card only
     */
    public static function getAllFields(){
        $re = array();
        //get all visible fields
        $layout = static::getLayout();
        foreach($layout as $item=>$config){
            if($config['Type']=='Group'){
                foreach($config['Fields'] as $field=>$f_config){
                    $re[$field] = $f_config;
                }
            }
        }
        return $re;
    }
    public static function getFieldsHelp($lang='en-US'){
        $re = '';
        $fs = static::getAllFields();
        foreach($fs as $item=>$config){
            if(isset($config['Hidden']) && $config['Hidden']===false){
                continue;
            }
            $re .= sprintf('-Field: %s: <br>%s<hr>', static::getFieldCaption($item, $lang), static::getFieldDescription($item, $lang));
        }
        return $re;
    }

    public static function getSourceExpr($f_name)
    {
        $re = static::getFieldsConfig($f_name, 'SourceExpr');
        if (Qdmvc_Helper::isNullOrEmpty($re)) {
            $re = $f_name;
        }
        return $re;
    }

    /*Page Card only*/
    public static function getTabConfig($tabid, $meta, $lang = 'en-US')
    {
        $layout = static::getLayout();
        if (isset($layout[$tabid]) && isset($layout[$tabid][$meta])) {
            if (is_array($layout[$tabid][$meta]) && isset($layout[$tabid][$meta][$lang])) {
                return $layout[$tabid][$meta][$lang];
            } else {
                return $layout[$tabid][$meta];
            }
        }
        return '@' . $tabid;
    }

    protected function checkPermission()
    {
        //get Permissions
        $u = Qdmvc_Helper::getCurrentUser();
        return $u->hasPermission(null, null, $this->getPage());
    }
}