<?php

class QdSize extends QdRoot
{
    static $table_name = 'mpd_size';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'code' => array(),
            'name' => array(),
            'description' => array(
	            'DataType' => 'WYSIWYG'
            ),
            'type' => array(
	            'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
	            'DataType' => 'Option',
	            'Options' => array(
		            QdManufactor::$TYPE2_MANUFACTOR_QUANAO => array(
			            'Caption' => array('en-US' => 'Clothes', 'vi-VN' => 'Quần áo'),
		            ),
		            QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP => array(
			            'Caption' => array('en-US' => 'Shoes', 'vi-VN' => 'Giáy dép'),
		            ),
	            )
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdSize();
        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_QUANAO;
        return $obj;
    }

	protected function codeOnValidate( $field_name ) {
		if($this->$field_name != strtoupper($this->$field_name))
		{
			$this->$field_name = strtoupper($this->$field_name);
			$this->pushValidateError($field_name, 'Code tự động in hoa', 'info');
		}
	}

}