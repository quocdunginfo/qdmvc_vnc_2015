<?php

class QdProductCatPK extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPK();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_PHUKIEN;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_PHUKIEN => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_PHUKIEN]
        );
        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPK';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductPK';

        return $obj;
    }
}