<?php

class QdUserGroup extends QdRoot
{
    static $table_name = 'mpd_usergroup';

    public static function getFieldsConfig()
    {
        $obj= array_merge(parent::getFieldsConfig(), array(
            'description' => array(),
            'active' => array(
                'DataType' => 'Boolean'
            ),
        ));
        $obj['id']['ReadOnly'] = false;
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdUserGroup();
        return $obj;
    }
    public function getPermissions()
    {
        //find all in Permission
        $tmp = new QdPermission();
        $tmp->SETRANGE('usergroupid', $this->id);
        $tmp->SETRANGE('active', true);
        return $tmp->GETLIST();
    }
    public function hasPermission($class_name=null, $method_name=null, $page_name=null)
    {
        //find all in Permission
        $tmp = new QdPermission();
        $tmp->SETRANGE('usergroupid', $this->id);
        $tmp->SETRANGE('active', true);
        if($class_name!==null && $method_name!==null) {
            $tmp->SETRANGE('classname', $class_name);
            $tmp->SETRANGE('methodname', $method_name);
        }
        else{
            $tmp->SETRANGE('pagename', $page_name);
        }

        $tmp = $tmp->GETLIST();
        return empty($tmp);
    }
}