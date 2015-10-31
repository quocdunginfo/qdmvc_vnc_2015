<?php

class QdPro2ProPG2DCN extends QdPro2Pro
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['r_product_id']['TableRelation']['Table'] = 'QdProductPG2DCN';
        $obj['r_product_id']['DataPort'] = 'product_pg2_dcn_port';
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPro2ProPG2DCN();
        return $obj;
    }
}