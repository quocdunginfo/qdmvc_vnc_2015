<?php

class QdSubscriber extends QdContact
{
    public static $TYPE_CUSTOMER = 10;
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_CUSTOMER, 'exact' => true, 'operator' => '=')
        ));
    }
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type']['Options'] = array(
            static::$TYPE_CUSTOMER => array(
                'Caption' => array('en-US' => 'Customer', 'vi-VN' => 'Customer'),
            ),
        );
        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdSubscriber();
        $obj->transferFieldsFrom($tmp);
        $obj->type = static::$TYPE_CUSTOMER;

        return $obj;
    }

}