<?php

class QdWidgetNav extends QdRoot
{
    static $table_name = 'mpd_widgetnav';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'content' => array(),
            'title' => array(),
            'button_text' => array(),
            'path' => array(),
            'order' => array(),
            '_group_name' => array(
                'Name' => '_group_name',
                'Caption' => array('en' => 'Group Name', 'vn' => 'Tên nhóm'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdWidgetNavCat',
                    'Field' => 'title',
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
                'Name' => 'post_cat_id',
                'Caption' => array('en' => 'Cat ID', 'vn' => 'Mã loại'),
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

    public static function getInitObj()
    {
        $obj = new QdWidgetNav();
        return $obj;
    }
}