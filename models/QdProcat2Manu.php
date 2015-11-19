<?php

class QdProcat2Manu extends QdRoot
{
    static $table_name = 'mpd_procat2manu';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'productcat_id' => array(
                'Name' => 'productcat_id',
                'Caption' => array('en-US' => 'Product Cat ID', 'vi-VN' => 'Mã LSP'),
                'DataType' => 'Code',
                'Editable' => true,
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array()
                ),
            ),
            'manufactor_id' => array(
                'Name' => 'manufacturer_id',
                'Caption' => array('en-US' => 'Manufactor ID', 'vi-VN' => 'Mã Hãng SX'),
                'DataType' => 'Code',
                'Editable' => true,
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdManufactor',
                    'Field' => 'id',
                    'TableFilter' => array()
                )
            ),
            'order' => array(
                'DataType' => 'Integer'
            ),
            'struct_level' => array(
                'DataType' => 'Integer'
            ),
            'selection' => array(
                'DataType' => 'Boolean'
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdProcat2Manu();
        $obj->selection = false;
        return $obj;
    }
}