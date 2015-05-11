<?php

class QdProductSetup extends QdRootSetup
{
    static $table_name = 'mpd_product_setup';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'product_per_segment' => array(
                'Caption' => array('en' => 'Pro Per Segment', 'vn' => 'Số Lượng SP/1trang'),
            ),
            'df_pro_cat_avatar' => array(
                'Caption' => array('en' => 'DF Pro Cat Ava', 'vn' => 'Hình mặc định Pro Cat'),
                'DataType' => 'Image'
            ),
            'df_pro_avatar' => array(
                'Caption' => array('en' => 'DF Product Ava', 'vn' => 'Hình mặc định Product'),
                'DataType' => 'Image'
            ),
            'df_product_desc_tpl' => array(
                'Caption' => array('en' => 'DF Product Desc Tpl', 'vn' => 'DF Product Desc Tpl'),
                'DataType' => 'WYSIWYG'
            ),
            'advice_phone' => array(
                'Caption' => array('en' => 'Advice Phone', 'vn' => 'SĐT tư vấn'),
            ),
            'bigsalecat_id' => array(
                'Name' => 'bigsalecat_id',
                'Caption' => array('en' => 'Big Sale', 'vn' => 'Big Sale'),
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

}