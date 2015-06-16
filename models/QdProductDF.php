<?php

class QdProductDF extends QdProduct
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_DEFAULT => array(
                'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
            ),
        );
        $obj['size_id']['TableRelation']['TableFilter'] = array(
            array(
                'Condition' => array(
                    'Field' => '',
                    'Type' => 'CONST',//'FIELD'
                    'Value' => ''
                ),
                'Field' => 'type',
                'Type' => 'CONST',
                'Value' => QdManufactor::$TYPE2_MANUFACTOR_DEFAULT
            )
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDF';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactorDF';

        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPro2Pro',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'product_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                ),
            )
        );

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductDF();
        $obj->description = $tmp->description;

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_DEFAULT;
        return $obj;
    }

}