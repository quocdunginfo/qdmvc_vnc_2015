<?php

class QdProGrp extends QdRoot
{
    static $table_name = 'mpd_progrp';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
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
            'group_type' => array(
                'Caption' => array('en' => 'Group Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    QdProductCat::$TYPE_PRODUCTCAT => array(
                        'Caption' => array('en' => 'Product Cat', 'vn' => 'Product Cat'),
                    ),
                    QdBigSaleCat::$TYPE_BIGSALE => array(
                        'Caption' => array('en' => 'Big Sale', 'vn' => 'Bán chạy'),
                    ),
                    QdPromotionCat::$TYPE_PROMOTION=> array(
                        'Caption' => array('en' => 'Promotion', 'vn' => 'Khuyến mãi'),
                    ),
                )
            ),
            '_group_name' => array(
                'Name' => '_group_name',
                'Caption' => array('en' => 'Category Name', 'vn' => 'Tên loại'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdProductCat',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'group_id'
                        )
                    )
                )
            ),
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
                            'Type' => 'CONST',
                            'Value' => QdProductCat::$TYPE_PRODUCTCAT
                        )
                    )
                )
            ),
        ));

        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdProGrp();
        $obj->group_type = QdProductCat::$TYPE_PRODUCTCAT;
        return $obj;
    }
}