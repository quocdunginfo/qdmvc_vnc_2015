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
    public function hasPermission($class_name, $method_name)
    {
        //find all in Permission
        $tmp = new QdPermission();
        $tmp->SETRANGE('usergroupid', $this->id);
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('classname', $class_name);
        $tmp->SETRANGE('methodname', $method_name);
        $tmp = $tmp->GETLIST();
        return empty($tmp);
    }
}