<?php

class QdProductCatXEMAY extends QdProductCatPG2XE
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatXEMAY();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_XEMAY;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_XEMAY => $obj['type2']['Options'][QdManufactor::$TYPE2_MANUFACTOR_XEMAY]
        );
        $obj['type2']['ReadOnly'] = true;

        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatXEMAY';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductXEMAY';

        return $obj;
    }
}