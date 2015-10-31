<?php

class QdProductPG2XE extends QdProductPG2
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type3', 'value' => QdProductCat::$TYPE3_XE, 'operator' => static::$OP_EQUAL)
        ));
    }
    public static function getInitObj()
    {
        $obj = new QdProductPG2XE();
        $tmp = parent::getInitObj();
        $obj->transferFieldsFrom($tmp);
        $obj->type3 = QdProductCat::$TYPE3_XE;
        return $obj;
    }
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPG2XE';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdPro2ProPG2XE';

        return $obj;
    }
}