<?php

class QdProductPK extends QdProductPG2
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['type']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_PHUKIEN => $obj['type']['Options'][QdManufactor::$TYPE2_MANUFACTOR_PHUKIEN]
        );

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPK';
        $obj['manufacturer_id']['TableRelation']['Table'] = 'QdManufactor';

        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPro2Pro',
            'Field' => 'id',
            'TableFilter' => array(
                array(
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

        $obj = new QdProductPK();
        $obj->transferFieldsFrom($tmp);

        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_PHUKIEN;
        return $obj;
    }

}