<?php

class QdProductCatPG2THIETBI extends QdProductCatPG2
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatPG2THIETBI();
        $obj->transferFieldsFrom($tmp);

        $obj->type3 = static::$TYPE3_THIETBI;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type3']['Options'] = array(
            static::$TYPE3_THIETBI => $obj['type3']['Options'][static::$TYPE3_THIETBI]
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatPG2THIETBI';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductPG2THIETBI';

        return $obj;
    }
}