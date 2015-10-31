<?php

class QdProductCatXEDAP extends QdProductCatPG2XE
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatXEDAP();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_XEDAP;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_XEDAP => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_XEDAP]
        );
        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatXEDAP';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductXEDAP';

        return $obj;
    }
}