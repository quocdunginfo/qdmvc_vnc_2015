<?php

class QdProductCat extends QdRoot
{
    static $table_name = 'mpd_product_cat';
    public static $TYPE_PRODUCTCAT = 0;
    public static $TYPE_MANUFACTOR = 215;
    public static $PROPERTY_G2 = 'PG2';
    public static $PROPERTY_G3 = 'PG3';
    public static $TYPE3_DCN = 'DCN';
    public static $TYPE3_XE = 'XE';

    /*
    static $has_many = array(
        array('product_list', 'class_name' => 'QdProduct', 'primary_key' => 'id', 'foreign_key' => 'product_cat_id')
    );*/
    public static function getInitObj()
    {
        $obj = new QdProductCat();
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->type2 = QdManufactor::$TYPE2_MANUFACTOR_DEFAULT;
        $obj->active = true;
        return $obj;
    }

    public function getProducts2()
    {
        $record = new QdProBigSale();
        $record->SETRANGE('group_id', $this->id);

        $re = array();
        foreach ($record->GETLIST() as $item) {
            array_push($re, QdProduct::GET($item->product_id));
        }
        return $re;
    }

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'name' => array(
                'Caption' => array('vi-VN' => 'Tên LSP'),
            ),
            'avatar' => array(
                'Caption' => array('en-US' => 'Avatar', 'vi-VN' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện'
            ),
            'active' => array(
                'DataType' => 'Boolean',
            ),
            'order' => array(
                'Caption' => array('vi-VN' => 'Thứ tự'),
            ),
            'level' => array(
                'DataType' => 'Integer',
                'ReadOnly' => true
            ),
            '_parent_name' => array(
                'Name' => '_parent_name',
                'Caption' => array('en-US' => 'Parent Name', 'vi-VN' => 'Tên cha'),
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
                'Caption' => array('en-US' => 'Parent ID', 'vi-VN' => 'Mã LSP cha'),
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
                'Caption' => array('en-US' => 'Is leaf', 'vi-VN' => 'Nút lá'),
                'DataType' => 'Boolean'
            ),*/
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_PRODUCTCAT => array(
                        'Caption' => array('en-US' => 'Product Cat', 'vi-VN' => 'Product Cat'),
                    ),
                    /*
                    static::$TYPE_MANUFACTOR => array(
                        'Caption' => array('en-US' => 'Manufactor', 'vi-VN' => 'Hãng SX'),
                    )*/
                )
            ),
            'type2' => array(
                'Caption' => array('en-US' => 'Type2', 'vi-VN' => 'Dòng SP'),
                'DataType' => 'Option',
                'Options' => array(
                    QdManufactor::$TYPE2_MANUFACTOR_DEFAULT => array(
                        'Caption' => array('en-US' => 'Product Cat DF', 'vi-VN' => 'Loại SP DF'),
                    ),
                    QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP => array(
                        'Caption' => array('en-US' => 'Product Cat GD', 'vi-VN' => 'Loại SP GD'),
                    ),
                    QdManufactor::$TYPE2_MANUFACTOR_QUANAO => array(
                        'Caption' => array('en-US' => 'Product Cat QA', 'vi-VN' => 'Loại SP QA'),
                    ),
                    QdManufactor::$TYPE2_MANUFACTOR_OTHER => array(
                        'Caption' => array('en-US' => 'Product Cat Other', 'vi-VN' => 'Loại SP Other'),
                    ),
                )
            ),
            'type3' => array(
                'Caption' => array('en-US' => 'Type 3', 'vi-VN' => 'Type 3'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE3_DCN => array(
                        'Caption' => array('en-US' => 'Đồ công nghệ', 'vi-VN' => 'Đồ công nghệ'),
                    ),
                    static::$TYPE3_XE => array(
                        'Caption' => array('en-US' => 'Xe', 'vi-VN' => 'Xe'),
                    )
                )
            ),
            'property_grp_type' => array(
                'Caption' => array('en-US' => 'Property Group', 'vi-VN' => 'Nhóm thuộc tính'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$PROPERTY_G2 => array(
                        'Caption' => array('en-US' => '2 properties', 'vi-VN' => '2 thuộc tính'),
                    ),
                    static::$PROPERTY_G3 => array(
                        'Caption' => array('en-US' => '3 properties', 'vi-VN' => '3 thuộc tính'),
                    ),
                )
            ),
            '_permalink' => array(
                'Name' => '_permalink',
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
            ),
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
        $obj->SETFILTERDEFAULT(array(array('field' => 'product_cat_id', 'value' => $this->id, 'exact' => true, 'operator' => '=')));
        return $obj;
    }

    public function getPermalink()
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));
        $query = add_query_arg(array('product-cat-id' => $this->id), $query);
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
        $product_search = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));
        array_push($re, array('name' => 'Sản phẩm', 'url' => $product_search));
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
            } else if ($this->$field_name == $this->id) {
                $this->pushValidateError($field_name, 'Không thể chọn cha là chính nó!');
            }
        }
        $this->level = $this->getDeepLevel();
    }

    protected function avatarOnValidate($field_name)
    {
        if ($this->$field_name == '') {
            $pro_setup = QdSetupProduct::GET();
            $this->$field_name = $pro_setup->df_pro_cat_avatar;
            $this->pushValidateError($field_name, 'Tự động gán Avatar mặc định cho Product Cat', 'info');
        }
    }

    public function getDeepLevel()
    {
        $p = static::GET($this->parent_id);
        if ($p == null) {
            return 1;
        } else {
            return $p->getDeepLevel() + 1;
        }
    }

    public static function genObjectsToArray($list)
    {
        $re = array();
        foreach ($list as $item) {
            array_push($re, array(
                'id' => $item->id,
                'title' => $item->name,
                'url' => 'http://google.com',
                'active' => true,
                'deep' => $item->getDeepLevel(),
                'parent_id' => $item->parent_id
            ));
        }
        return $re;
    }

    public function getParentObj()
    {
        return QdProductCat::GET($this->parent_id);
    }

    public function fn_validate_all_level($loc, $params)
    {
        $tmp = new QdProductCat();
        //$tmp->SETRANGE('type', static::$TYPE_PRODUCTCAT);
        $count = 0;
        foreach ($tmp->GETLIST() as $item) {
            if ($item->save()) {
                $count++;
            }
        }
        $this->pushValidateError('', 'Total items validated: ' . $count, 'info');
        return true;
    }

    protected function CALCFIELDS($flowfield_name)
    {
        if ($flowfield_name == '_permalink') {
            $this->qd_cached_attr[$flowfield_name] = $this->getPermalink();
            //return
            return $this->qd_cached_attr[$flowfield_name];
        }

        return parent::CALCFIELDS($flowfield_name);
    }

}