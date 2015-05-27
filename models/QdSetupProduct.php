<?php

class QdSetupProduct extends QdRootSetup
{
    static $table_name = 'mpd_setup_product';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'df_pro_cat_avatar' => array(
                'Caption' => array('en-US' => 'DF Pro Cat Ava', 'vi-VN' => 'Hình mặc định Pro Cat'),
                'DataType' => 'Image'
            ),
            'df_pro_avatar' => array(
                'Caption' => array('en-US' => 'DF Product Ava', 'vi-VN' => 'Hình mặc định Product'),
                'DataType' => 'Image'
            ),
            'df_product_desc_tpl' => array(
                'Caption' => array('en-US' => 'DF Product Desc Tpl', 'vi-VN' => 'DF Product Desc Tpl'),
                'DataType' => 'WYSIWYG'
            ),
            'bigsalecat_id' => array(
                'Name' => 'bigsalecat_id',
                'Caption' => array('en-US' => 'Big Sale', 'vi-VN' => 'Big Sale'),
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
                            'Value' => QdBigSaleCat::$TYPE_BIGSALE
                        )
                    )
                )
            ),
        ));
    }

}