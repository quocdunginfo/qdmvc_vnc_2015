<?php

class QdProGrp extends QdRoot
{
    static $table_name = 'mpd_progrp';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'product_id' => array(
                'Name' => 'product_id',
                'Caption' => array('en' => 'Product ID', 'vn' => 'Mã SP'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProduct',
                    'Field' => 'id',
                    'TableFilter' => array(
                        /*array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'type',
                            'Type' => 'FIELD',
                            'Value' => QdProduct::
                        )*/
                    )
                )
            ),
            'order' => array(),
            'group_id' => array(
                'Name' => 'group_id',
                'Caption' => array('en' => 'Group ID', 'vn' => 'Mã nhóm'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                        array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'type',
                            'Type' => 'FIELD',
                            'Value' => QdProductCat::$TYPE_BIGSALE
                        )
                    )
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdProGrp();
        return $obj;
    }
}