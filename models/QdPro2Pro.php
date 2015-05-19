<?php

class QdPro2Pro extends QdRoot
{
    static $table_name = 'mpd_pro2pro';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            '_product_name' => array(
                'Name' => '_product_name',
                'Caption' => array('en' => 'Product Name', 'vn' => 'Tên SP'),
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
            '_r_product_name' => array(
                'Name' => '_r_product_name',
                'Caption' => array('en' => 'Child Product Name', 'vn' => 'Tên SP liên kết'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdProduct',
                    'Field' => 'name',
                    'TableFilter' => array(
                        array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'r_product_id'
                        )
                    )
                )
            ),
            'r_product_id' => array(
                'Name' => 'r_product_id',
                'Caption' => array('en' => 'Child Product', 'vn' => 'Mã SP liên kết'),
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
                            'Value' => QdProductCat::$TYPE_PRODUCTCAT
                        )*/
                    )
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdPro2Pro();
        return $obj;
    }
}