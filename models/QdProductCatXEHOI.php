<?php

class QdProductCatXEHOI extends QdProductCatPG2XE
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatXEHOI();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_OTO;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_OTO => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_OTO]
        );
        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatXEHOI';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductXEHOI';

        return $obj;
    }
}