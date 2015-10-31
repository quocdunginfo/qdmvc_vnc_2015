<?php

class QdProductPG2 extends QdProduct
{
    /*public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'property_grp_type', 'value' => QdProductCat::$PROPERTY_G2, 'operator' => static::$OP_EQUAL)
        ));
    }
    */
    public static function getInitObj()
    {
        $obj = new QdProductPG2();
        $tmp = parent::getInitObj();
        $obj->transferFieldsFrom($tmp);
        $obj->property_grp_type = QdProductCat::$PROPERTY_G2;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();

        $obj['product_cat_id']['TableRelation']['Table'] = 'QdProductCatPG2';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdPro2ProPG2';

        return $obj;
    }
}