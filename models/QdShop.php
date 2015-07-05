<?php

class QdShop extends QdContact
{
    public static $TYPE_SHOP = 30;
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_SHOP, 'exact' => true, 'operator' => '=')
        ));
    }
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type']['Options'] = array(
            static::$TYPE_SHOP => array(
                'Caption' => array('en-US' => 'Shop', 'vi-VN' => 'Cửa hàng'),
            ),
        );
        $obj['__sys_lines_url']['Caption'] = array('en-US' => 'Shop Products', 'vi-VN' => 'SP trong Shop');
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPro2Shop',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'shop_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdShop();
        $obj->type = static::$TYPE_SHOP;
        $obj->active = $tmp->active;
        return $obj;
    }

}