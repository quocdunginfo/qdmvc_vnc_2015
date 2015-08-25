<?php

class QdPostCat extends QdRoot
{
    static $table_name = 'mpd_post_cat';
    public static $TYPE_BESTCHOICECAT = 100;
    public static $TYPE_POSTCAT = 0;
    public static $TYPE_WIDGETNAV = 211;
    public static $TYPE_IMGGRP = 50;
    public static $TYPE_PARTNER = 487;

    /*
    static $has_many = array(
        array('product_list', 'class_name' => 'QdProduct', 'primary_key' => 'id', 'foreign_key' => 'product_cat_id')
    );*/
    public static function getInitObj()
    {
        $obj = new QdPostCat();
        $obj->type = static::$TYPE_POSTCAT;
        $obj->active = true;
        return $obj;
    }

    public function getChilds()
    {
        $tmp = new QdPost();
        $tmp->SETRANGE('post_cat_id', $this->id);
        return $tmp;
    }

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'title' => array(
                'Caption' => array('en-US' => 'Title', 'vi-VN' => 'Tiêu đề'),
            ),
            'description' => array(
                'Caption' => array('en-US' => 'Description', 'vi-VN' => 'Mô tả'),
            ),
            'avatar' => array(
                'Caption' => array('en-US' => 'Avatar', 'vi-VN' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện'
            ),
            'order' => array(
                'Caption' => array('vi-VN' => 'Thứ tự'),
            ),
            'active' => array(
                'DataType' => 'Boolean'
            ),
            'parent_id' => array(
                'Name' => 'parent_id',
                'Caption' => array('en-US' => 'Parent ID', 'vi-VN' => 'Mã loại cha'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdPostCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                        array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'type',
                            'Type' => 'FIELD',
                            'Value' => static::$TYPE_POSTCAT
                        )
                    )
                )
            ),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_POSTCAT => array(
                        'Caption' => array('en-US' => 'Post Cat', 'vi-VN' => 'Post Cat'),
                    ),
                )
            )
        ));
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPost',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'post_cat_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );

        return $obj;
    }

    protected function orderOnValidate($field_name)
    {
        if ($this->$field_name <= 0) {
            $this->pushValidateError($field_name, 'Order phải lớn hơn 0');
        }
    }

    protected function parent_idOnValidate($field_name)
    {
        //check exit
        if ($this->$field_name > 0) {
            if (static::GET($this->$field_name) == null) {
                $this->pushValidateError($field_name, 'Parent ID không tồn tại!');
                if (!$this->is_new_record()) {
                    $this->$field_name = $this->xRec()->$field_name;
                }
            }
        }
    }

    public function getBreadcrumbs()
    {
        return array(
            array('name' => $this->title, 'url' => QdT_Library::getNoneLink())
        );
    }

}