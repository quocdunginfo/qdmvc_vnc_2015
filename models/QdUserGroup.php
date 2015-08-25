<?php

class QdUserGroup extends QdRoot
{
    static $table_name = 'mpd_usergroup';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'description' => array(),
            'active' => array(
                'DataType' => 'Boolean'
            ),
            'parent_id' => array(
                'DataType' => 'Code',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdUserGroup',
                    'Field' => 'id',
                    'TableFilter' => array()
                )
            )
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

    public function hasPermission($class_name = null, $method_name = null, $page_name = null)
    {
        //find all in Permission
        $tmp = new QdPermission();
        $tmp->SETRANGE('usergroupid', $this->id);
        $tmp->SETRANGE('active', true);
        if ($class_name !== null && $method_name !== null) {
            $tmp->SETRANGE('classname', $class_name);
            $tmp->SETRANGE('methodname', $method_name);
        } else {
            $tmp->SETRANGE('pagename', $page_name);
        }

        $tmp = $tmp->GETLIST();
        if (empty($tmp)) {
            $po = $this->getParentObj();
            if ($po != null) {
                return $po->hasPermission($class_name, $method_name, $page_name);
            }
            return true;
        } else {
            return false;
        }
    }

    public function getParentObj()
    {
        return QdUserGroup::GET($this->parent_id);
    }
}