<?php

class QdPro2Pro extends QdRoot
{
    static $table_name = 'mpd_pro2pro';

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
                //'TableRelation' => array(
                //    'Table' => 'QdProduct',
                //    'Field' => 'id',
                //    'TableFilter' => array(
                //    )
                //),
                //'DataPort' => 'product_port',
                'ReadOnly' => true
            ),
            'order' => array(),
            '_r_product_name' => array(
                'Name' => '_r_product_name',
                'Caption' => array('en-US' => 'Child Product Name', 'vi-VN' => 'Tên SP liên kết'),
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
            'r_product_type' => array(

            ),
            'r_product_id' => array(
                'Name' => 'r_product_id',
                'Caption' => array('en-US' => 'Child Product', 'vi-VN' => 'Mã SP liên kết'),
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
                    )
                ),
                'DataPort' => 'product_port'
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdPro2Pro();
        return $obj;
    }
    /*
     * Fix bug Image, Note, Log Linking
     * */
    protected function getCalledClassName()
    {
        //Use for all it derived class
        return 'QdPro2Pro';
    }
}