<?php

class QdContact extends QdRoot
{
    static $table_name = 'mpd_contact';
    public static $TYPE_VNC = 0;
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_VNC, 'exact' => true, 'operator' => '=')
        ));
    }
    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'name' => array(

            ),
            'description' => array(
                'DataType' => 'WYSIWYG'
            ),
            'email' => array(

            ),
            'phone' => array(

            ),
            'website' => array(

            ),
            'address' => array(

            ),
            'active' => array(
                'DataType' => 'Boolean'
            ),
            'order' => array(

            ),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_VNC => array(
                        'Caption' => array('en-US' => 'VNC', 'vi-VN' => 'VNC'),
                    ),
                )
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdSubscriber();
        $obj->type = static::$TYPE_VNC;
        $obj->active = true;
        return $obj;
    }

}