<?php

class QdPro2ProDOHIEU extends QdPro2Pro
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['r_product_id']['TableRelation']['Table'] = 'QdProductDOHIEU';
        $obj['r_product_id']['DataPort'] = 'product_dohieu_port';
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPro2ProDOHIEU();
        return $obj;
    }
}