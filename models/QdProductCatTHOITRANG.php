<?php

class QdProductCatTHOITRANG extends QdProductCatDOHIEU
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatTHOITRANG();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_THOITRANG;
        $obj->property_grp_type = static::$PROPERTY_G3;
        $obj->type4 = QdProductCat::$TYPE4_QUANAO;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_THOITRANG => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_THOITRANG]
        );
        unset($obj['type4']['Options'][QdProductCat::$TYPE4_DF]);

        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatTHOITRANG';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductTHOITRANG';

        $obj['property_grp_type']['Options'] = array(
            static::$PROPERTY_G3 => $obj['property_grp_type']['Options'][static::$PROPERTY_G3]
        );
        $obj['property_grp_type']['ReadOnly'] = true;


        return $obj;
    }
}