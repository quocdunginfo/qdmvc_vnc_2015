<?php

class QdProductPG3 extends QdProduct
{
    public static function getInitObj()
    {
        $obj = new QdProductPG3();
        $tmp = parent::getInitObj();
        $obj->transferFieldsFrom($tmp);
        $obj->property_grp_type = QdProductCat::$PROPERTY_G3;
        return $obj;
    }
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();


        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPG3';
        /*
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactorQA';

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
        */
        return $obj;
    }
}