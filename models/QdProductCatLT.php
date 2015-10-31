<?php

class QdProductCatLT extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatLT();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_LAPTOP;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_LAPTOP => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_LAPTOP]
        );
        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatLT';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductLT';

        return $obj;
    }
}