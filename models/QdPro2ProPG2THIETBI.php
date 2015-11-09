<?php

class QdPro2ProPG2THIETBI extends QdPro2ProPG2
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['r_product_id']['TableRelation']['Table'] = 'QdProductPG2THIETBI';
        $obj['r_product_id']['DataPort'] = 'product_pg2_thietbi_port';
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPro2ProPG2THIETBI();
        return $obj;
    }
}