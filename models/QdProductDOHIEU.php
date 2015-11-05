<?php

class QdProductDOHIEU extends QdProduct
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type3', 'value' => QdProductCat::$TYPE3_DOHIEU, 'operator' => static::$OP_EQUAL)
        ));
    }
    public static function getInitObj()
    {
        $obj = new QdProductDOHIEU();
        $tmp = parent::getInitObj();
        $obj->transferFieldsFrom($tmp);
        $obj->type3 = QdProductCat::$TYPE3_DOHIEU;
        return $obj;
    }
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatDOHIEU';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdPro2ProDOHIEU';

        return $obj;
    }
}