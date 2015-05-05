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
            'topcenter_promotion' => array(
                'DataType' => 'WYSIWYG',
            ),
            'topright_navs' => array(
                'DataType' => 'WYSIWYG',
            ),
            'bottomleft_footer_note' => array(
                'DataType' => 'WYSIWYG',
            ),
            'widgetnavcat_id' => array(
                'Name' => 'widgetnavcat_id',
                'Caption' => array('en' => 'Widget Nav Cat', 'vn' => 'Widget Nav Cat'),
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
            'social_icon' => array(
                'Name' => 'social_icon',
                'Caption' => array('en' => 'Social Icon', 'vn' => 'Social Icon'),
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