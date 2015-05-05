<?php

class QdProductCat extends QdRoot
{
    static $table_name = 'mpd_product_cat';
    public static $TYPE_PRODUCTCAT = 0;
    public static $TYPE_BIGSALE = 100;
    public static $TYPE_PROMOTION = 137;
    public static $TYPE_MANUFACTOR = 215;

    /*
    static $has_many = array(
        array('product_list', 'class_name' => 'QdProduct', 'primary_key' => 'id', 'foreign_key' => 'product_cat_id')
    );*/
    public static function getInitObj()
    {
        $obj = new QdProductCat();
        $obj->type = static::$TYPE_PRODUCTCAT;
        return $obj;
    }
    public function getProducts2()
    {
        $record = new QdProBigSale();
        $record->SETRANGE('group_id', $this->id, true);

        $re = array();
        foreach($record->GETLIST() as $item)
        {
            array_push($re, QdProduct::GET($item->product_id));
        }
        return $re;
    }

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'name' => array(
                'Caption' => array('vn' => 'Tên LSP'),
            ),
            'avatar' => array(
                'Caption' => array('en' => 'Avatar', 'vn' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện'
            ),
            'active' => array(
                'DataType' => 'Boolean',
            ),
            'order' => array(
                'Caption' => array('vn' => 'Thứ tự'),
            ),
            '_parent_name' => array(
                'Name' => '_parent_name',
                'Caption' => array('en' => 'Parent Name', 'vn' => 'Tên cha'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdProductCat',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'parent_id'
                        )
                    )
                )
            ),
            'parent_id' => array(
                'Name' => 'parent_id',
                'Caption' => array('en' => 'Parent ID', 'vn' => 'Mã LSP cha'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array(/*0 => array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'is_leaf',
                            'Type' => 'FIELD',
                            'Value' => true
                        )*/
                    )
                )
            ),
            /*
            'is_leaf' => array(
                'Caption' => array('en' => 'Is leaf', 'vn' => 'Nút lá'),
                'DataType' => 'Boolean'
            ),*/
            'type' => array(
                'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_PRODUCTCAT => array(
                        'Caption' => array('en' => 'Product Cat', 'vn' => 'Product Cat'),
                    ),
                    static::$TYPE_BIGSALE => array(
                        'Caption' => array('en' => 'Big Sale', 'vn' => 'Bán chạy'),
                    ),
                    static::$TYPE_PROMOTION => array(
                        'Caption' => array('en' => 'Promotion', 'vn' => 'Khuyến mãi'),
                    ),
                    static::$TYPE_MANUFACTOR => array(
                        'Caption' => array('en' => 'Manufactor', 'vn' => 'Hãng SX'),
                    ),
                )
            )
        ));
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdProduct',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'product_cat_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );

        return $obj;
    }

    public function getProducts()
    {
        $obj = new QdProduct();
        $obj->SETFILTERDEFAULT(array('product_cat_id' => array('value' => $this->id, 'exact' => true)));
        return $obj;
    }

    public function getPermalink()
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-cat.php'));
        $query = add_query_arg(array('id' => $this->id), $query);
        return $query;
        /*
        $query =  get_site_url();
        $query .= sprintf('/loaisp/%s/%s', $this->id, Qdmvc_Helper::sanitize_title_with_dashes($this->name));
        return $query;*/
    }

    public function getProductsSegmentURL($offset = 0)
    {
        $query = get_permalink($this->getPermalink());
        $query = add_query_arg(array('id' => $this->id, 'product-offset' => $offset), $query);
        return $query;
    }

    public function getProductsSegment($limit = 2, $offset = 0)
    {
        //return QdProduct::all(array('conditions' => 'product_cat_id = '.$this->id, 'limit' => $limit, 'offset' => $offset, 'order' => 'id desc'));
        return $this
            ->getProducts()
            ->REMOVEFILTER()
            ->SETLIMIT($limit)
            ->SETOFFSET($offset)
            ->SETORDERBY('id', 'desc')
            ->GETLIST();
    }

    public function getBreadcrumbs()
    {
        $re = array();
        array_push($re, array('name' => 'Sản phẩm', 'url' => $this->getPermalink()));
        array_push($re, array('name' => $this->name, 'url' => $this->getPermalink()));
        return $re;
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
            if (QdProductCat::GET($this->$field_name) == null) {
                $this->pushValidateError($field_name, 'Product Cat không tồn tại!');
                if (!$this->is_new_record()) {
                    $this->$field_name = $this->xRec()->$field_name;
                }
            }
        }
    }

    protected function avatarOnValidate($field_name)
    {
        if ($this->$field_name == '') {
            $pro_setup = QdProductSetup::GET();
            $this->$field_name = $pro_setup->df_pro_cat_avatar;
            $this->pushValidateError($field_name, 'Tự động gán Avatar mặc định cho Product Cat', 'info');
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