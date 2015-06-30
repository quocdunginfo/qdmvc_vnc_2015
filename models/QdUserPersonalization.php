<?php

class QdUserPersonalization extends QdRoot
{
    static $table_name = 'mpd_user_personalization';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'username' => array(),
            'userid' => array(),
            'language' => array(
                'DataType' => 'Option',
                'Options' => array(
                    Qdmvc_Config::$LANG_viVN => array(
                        'Caption' => array('en-US' => 'Vietnamese', 'vi-VN' => 'Tiếng Việt'),
                    ),
                    Qdmvc_Config::$LANG_enUS => array(
                        'Caption' => array('en-US' => 'English', 'vi-VN' => 'Tiếng Anh'),
                    ),
                )
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdUserPersonalization();
        $obj->language = Qdmvc_Config::$LANG_viVN;
        return $obj;
    }

    protected function usernameOnValidate($field_name)
    {
        if(username_exists($this->$field_name)==null)
        {
            $this->pushValidateError($field_name, 'Username không tồn tại', 'error');
        }
    }
}