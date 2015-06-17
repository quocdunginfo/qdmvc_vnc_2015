<?php

class QdPro2Shop extends QdRoot
{
    static $table_name = 'mpd_pro2shop';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            '_product_name' => array(
                'Name' => '_product_name',
                'Caption' => array('en-US' => 'Product Name', 'vi-VN' => 'Tên SP'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdProduct',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'product_id'
                        )
                    )
                )
            ),
            'product_id' => array(
                'Name' => 'product_id',
                'Caption' => array('en-US' => 'Product ID', 'vi-VN' => 'Mã SP'),
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
            '_shop_name' => array(
                'Name' => '_shop_name',
                'Caption' => array('en-US' => 'Shop name', 'vi-VN' => 'Tên cửa hàng'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdShop',
                    'Field' => 'name',
                    'TableFilter' => array(
                        array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'shop_id'
                        )
                    )
                )
            ),
            'shop_id' => array(
                'Name' => 'shop_id',
                'Caption' => array('en-US' => 'Shop ID', 'vi-VN' => 'Mã cửa hàng'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdShop',
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
                            'Value' => QdProductCat::$TYPE_PRODUCTCAT
                        )*/
                    )
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdPro2Shop();
        return $obj;
    }
}