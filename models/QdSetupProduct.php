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
            'df_product_doitra_baohanh_tpl' => array(
                'Caption' => array('en-US' => 'DF Product ĐT/BH Tpl', 'vi-VN' => 'DF Product ĐT/BH Tpl'),
                'DataType' => 'WYSIWYG'
            ),
            'df_product_giaohang_thanhtoan_tpl' => array(
                'Caption' => array('en-US' => 'DF Product GH/TT Tpl', 'vi-VN' => 'DF Product GH/TT Tpl'),
                'DataType' => 'WYSIWYG'
            ),
            /*
            'product_noseries' => array(
                'Name' => 'product_noseries',
                'Caption' => array('en-US' => 'Product Noseries', 'vi-VN' => 'SP Noseries'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdNoSeries',
                    'Field' => 'id',
                    'TableFilter' => array(
                        
                    )
                ),
                'DataPort' => 'noseries_port'
            ),
            'product_qa_noseries' => array(
                'Name' => 'product_qa_noseries',
                'Caption' => array('en-US' => 'Product QA Noseries', 'vi-VN' => 'SP QA Noseries'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdNoSeries',
                    'Field' => 'id',
                    'TableFilter' => array(

                    )
                ),
                'DataPort' => 'noseries_port'
            ),*/
        ));
    }

}