<?php

class QdPostCat extends QdRoot
{
    static $table_name = 'mpd_post_cat';
    public static $TYPE_BESTCHOICECAT = 100;
    public static $TYPE_POSTCAT = 0;
    public static $TYPE_WIDGETNAV = 211;

    /*
    static $has_many = array(
        array('product_list', 'class_name' => 'QdProduct', 'primary_key' => 'id', 'foreign_key' => 'product_cat_id')
    );*/
    public static function getInitObj()
    {
        $obj = new QdPostCat();
        $obj->type = static::$TYPE_POSTCAT;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'title' => array(
                'Caption' => array('en' => 'Title', 'vn' => 'Tiêu đề'),
            ),
            'description' => array(
                'Caption' => array('en' => 'Description', 'vn' => 'Mô tả'),
            ),
            'avatar' => array(
                'Caption' => array('en' => 'Avatar', 'vn' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện'
            ),
            'order' => array(
                'Caption' => array('vn' => 'Thứ tự'),
            ),
            'parent_id' => array(
                'Name' => 'parent_id',
                'Caption' => array('en' => 'Parent ID', 'vn' => 'Mã loại cha'),
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
                'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_POSTCAT => array(
                        'Caption' => array('en' => 'Post Cat', 'vn' => 'Post Cat'),
                    ),
                    static::$TYPE_BESTCHOICECAT => array(
                        'Caption' => array('en' => 'Best choice Cat', 'vn' => 'Best choice Cat'),
                    ),
                    static::$TYPE_WIDGETNAV => array(
                        'Caption' => array('en' => 'WidgetNavs Cat', 'vn' => 'WidgetNavs Cat'),
                    ),
                )
            )
        ));
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

    /*public function delete($location = '')
    {
        //Xóa hết Product
        $class = $this->getCalledClassName();
        $re = true;
        $location .= "|{$class}|delete";
        $objs = $this->getProducts();
        $objs = $objs->GETLIST();

        foreach ($objs as $item) {
            if (!$item->delete($location)) {
                $re = $re && false;
            }
        }

        if ($re) {
            return parent::delete('');
        }
        return false;
    }*/

}