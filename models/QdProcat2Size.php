<?php

class QdProcat2Size extends QdRoot
{
    static $table_name = 'mpd_procat2size';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'productcat_id' => array(

            ),
            'size_id' => array(

            ),
            'order' => array(
                'DataType' => 'Integer'
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdProcat2Size();
        return $obj;
    }
}