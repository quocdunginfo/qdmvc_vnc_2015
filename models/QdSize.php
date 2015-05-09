<?php

class QdSize extends QdRoot
{
    static $table_name = 'mpd_size';
	public static $TYPE_QUANAO = '10';
	public static $TYPE_GIAYDEP = '15';
    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'code' => array(),
            'name' => array(),
            'description' => array(
	            'DataType' => 'WYSIWYG'
            ),
            'type' => array(
	            'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
	            'DataType' => 'Option',
	            'Options' => array(
		            static::$TYPE_QUANAO => array(
			            'Caption' => array('en' => 'Clothes', 'vn' => 'Quần áo'),
		            ),
		            static::$TYPE_GIAYDEP => array(
			            'Caption' => array('en' => 'Shoes', 'vn' => 'Giáy dép'),
		            ),
	            )
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdSize();
        $obj->type = static::$TYPE_QUANAO;
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