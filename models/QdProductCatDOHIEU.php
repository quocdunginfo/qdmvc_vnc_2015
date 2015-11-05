<?php

class QdProductCatDOHIEU extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatDOHIEU();
        $obj->transferFieldsFrom($tmp);

        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type3']['Options'] = array(
            static::$TYPE3_DOHIEU => $obj['type3']['Options'][static::$TYPE3_DOHIEU]
        );
        $obj['type3']['ReadOnly'] = true;
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatDOHIEU';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductDOHIEU';
        return $obj;
    }
}