<?php

class QdImage extends QdNote
{
    static $table_name = 'mpd_image';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
                'path' => array(
                    'Caption' => array('en-US' => 'Image', 'vi-VN' => 'Hình ảnh'),
                    'DataType' => 'Image',
                ),
                'active' => array(
                    'DataType' => 'Boolean'
                ),
                'order' => array(
                    'Caption' => array('en-US' => 'Order', 'vi-VN' => 'Thứ tự'),
                ),
            )
        );
    }


    public static function getInitObj()
    {
        $obj = new QdImage();
        $obj->active = true;
        return $obj;
    }

    protected function orderOnValidate($field_name)
    {
        if ($this->{$field_name} != '') {
            if ($this->{$field_name} <= 0) {
                $this->pushValidateError($field_name, 'Thứ tự phải lớn hơn 0');
            }
        } else {
            $this->{$field_name} = $this->GETIMAGEMAX($field_name) + 10;
            $this->pushValidateError($field_name, 'Thứ tự được gán tự động RANGE +10', 'info');
        }
    }

    public function GETIMAGEMAX($field)
    {
        $record = new QdImage();
        $record->SETRANGE('model', $this->model);
        $record->SETRANGE('model_id', $this->model_id);
        $max = $record->SELECTMAX($field);
        if($max!==false){
            return $max;
        }else{
            return 0;
        }
    }

}