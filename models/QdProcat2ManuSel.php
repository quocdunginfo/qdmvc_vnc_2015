<?php

class QdProcat2ManuSel extends QdProcat2Manu
{
    static $table_name = 'mpd_procat2manu';

    public static function getInitObj()
    {
        $obj = new QdProcat2ManuSel();
        $obj->selection = true;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            '_productcat_name' =>array(
                'Name' => '_productcat_name',
                'Caption' => array('en-US' => 'Product Cat Name', 'vi-VN' => 'Tên LSP'),
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
                            'Value' => 'productcat_id'
                        )
                    )
                )
            ),
            '_manufactor_name' =>array(
                'Name' => '_manufactor_name',
                'Caption' => array('en-US' => 'Manufactor Name', 'vi-VN' => 'Tên Hãng SX'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdManufactor',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'manufactor_id'
                        )
                    )
                )
            )
        ));
    }

}