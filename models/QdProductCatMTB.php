<?php

class QdProductCatMTB extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatMTB();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_MTB;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_MTB => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_MTB]
        );
        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatMTB';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductMTB';

        return $obj;
    }
}