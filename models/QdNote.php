<?php

class QdNote extends QdRoot
{
    static $table_name = 'mpd_note';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'content' => array(),
            'model' => array(
                'ReadOnly' => true
            ),
            'model_id' => array(
                'ReadOnly' => true
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdNote();
        return $obj;
    }

    protected function modelOnValidate($field_name)
    {
        if ($this->{$field_name} == '') {
            $this->pushValidateError($field_name, '"model" phải khác rỗng');
        }
    }

    protected function model_idOnValidate($field_name)
    {
        if ($this->{$field_name} == '') {
            $this->pushValidateError($field_name, '"model_id" phải khác rỗng');
        }
    }
}