<?php

class QdProductCatDT extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatDT();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_DIENTHOAI;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_DIENTHOAI => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_DIENTHOAI]
        );
        $obj['type2']['ReadOnly'] = true;


        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatDT';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductDT';

        return $obj;
    }
}