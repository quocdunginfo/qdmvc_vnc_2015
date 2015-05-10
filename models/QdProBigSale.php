<?php

class QdProBigSale extends QdProGrp
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'group_type', 'value' => QdProductCat::$TYPE_BIGSALE, 'exact' => true, 'operator' => '=')
        ));
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['group_id']['TableRelation']['TableFilter'] = array(
            array(
                'Condition' => array(
                    'Field' => '',
                    'Type' => 'CONST',//'FIELD'
                    'Value' => ''
                ),
                'Field' => 'type',
                'Type' => 'FIELD',
                'Value' => QdProductCat::$TYPE_BIGSALE
            )
        );
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdProBigSale();
        $obj->group_type = QdProductCat::$TYPE_BIGSALE;
        return $obj;
    }
}