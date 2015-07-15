<?php

class QdPermission extends QdRoot
{
    static $table_name = 'mpd_permission';

    public static function getFieldsConfig()
    {
        $obj= array_merge(parent::getFieldsConfig(), array(
            'usergroupid' => array(
                'DataType' => 'Code',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdUserGroup',
                    'Field' => 'id',
                    'TableFilter' => array(

                    )
                )
            ),
            'classname' => array(),
            'methodname' => array(),
            'active' => array(
                'DataType' => 'Boolean'
            ),
        ));
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPermission();
        return $obj;
    }

}