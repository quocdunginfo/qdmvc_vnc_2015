<?php

class QdProcat2Manu extends QdRoot
{
    static $table_name = 'mpd_procat2manu';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'productcat_id' => array(

            ),
            'manufactor_id' => array(

            ),
            'order' => array(
                'DataType' => 'Integer'
            ),
            'struct_level' => array(
                'DataType' => 'Integer'
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdProcat2Manu();
        return $obj;
    }
}