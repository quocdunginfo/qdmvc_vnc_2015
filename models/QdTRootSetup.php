<?php

class QdTRootSetup extends QdRootSetup
{
    static $table_name = 'mpd_setup_theme_root';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'topleft_tuvan' => array(
                'DataType' => 'WYSIWYG',
            ),
            'seo_description_struct' => array(
            ),
            'seo_title_struct' => array(
            ),
            'seo_keywords_struct' => array(
            ),
            'topcenter_promotion' => array(
                'DataType' => 'WYSIWYG',
            ),
            'topright_navs' => array(
                'DataType' => 'WYSIWYG',
            ),
            'bottomleft_footer_note' => array(
                'DataType' => 'WYSIWYG',
            ),
            'vnc_logo' => array(
                'DataType' => 'Image',
            ),
            'commercial_logo' => array(
                'DataType' => 'Image',
            ),
            'banner_service_page' => array(
                'Name' => 'banner_service_page',
                'Caption' => array('en-US' => 'Banner Service Page', 'vi-VN' => 'Banner trang DV'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdWidgetNavCat',
                    'Field' => 'id',
                    'TableFilter' => array(

                    )
                )
            ),
            'widgetnavcat_id' => array(
                'Name' => 'widgetnavcat_id',
                'Caption' => array('en-US' => 'Widget Nav Cat', 'vi-VN' => 'Widget Nav Cat'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdWidgetNavCat',
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
                            'Value' => QdPostCat::$TYPE_WIDGETNAV
                        )*/
                    )
                )
            ),
            'partnergrp_id' => array(
                'Name' => 'partnergrp_id',
                'Caption' => array('en-US' => 'Partner Group', 'vi-VN' => 'Nhóm Đối tác'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdPartnerGrp',
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
                            'Value' => QdPostCat::$TYPE_WIDGETNAV
                        )*/
                    )
                )
            ),
            'img_slider' => array(
                'Name' => 'img_slider',
                'Caption' => array('en-US' => 'Banner', 'vi-VN' => 'Banner'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdImgGrp',
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
                            'Value' => QdPostCat::$TYPE_WIDGETNAV
                        )*/
                    )
                )
            ),
            'social_icon' => array(
                'Name' => 'social_icon',
                'Caption' => array('en-US' => 'Social Icon', 'vi-VN' => 'Social Icon'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdWidgetNavCat',
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
                            'Value' => QdPostCat::$TYPE_WIDGETNAV
                        )*/
                    )
                )
            ),

        ));
    }

}