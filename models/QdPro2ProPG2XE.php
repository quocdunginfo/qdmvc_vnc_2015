<?php

class QdPro2ProPG2XE extends QdPro2Pro
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['r_product_id']['TableRelation']['Table'] = 'QdProductPG2XE';
        $obj['r_product_id']['DataPort'] = 'product_pg2_xe_port';
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPro2ProPG2XE();
        return $obj;
    }
}