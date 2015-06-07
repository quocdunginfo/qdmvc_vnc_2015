<?php

class QdContact extends QdRoot
{
    static $table_name = 'mpd_contact';

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
        ));
    }
}