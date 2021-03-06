<?php

class QdProductPG2XE extends QdProductPG2
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'struct_lv_1', 'value' => QdProductCat::$LV1_XE, 'operator' => static::$OP_EQUAL)
        ));
    }
    public static function getInitObj()
    {
        $obj = new QdProductPG2XE();
        $tmp = parent::getInitObj();
        $obj->transferFieldsFrom($tmp);
        $obj->struct_lv_1 = QdProductCat::$LV1_XE;
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