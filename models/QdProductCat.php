<?php

class QdProductCat extends QdRoot
{
    static $table_name = 'mpd_product_cat';
    public static $TYPE_PRODUCTCAT = 'LOAISP';
    public static $TYPE_MANUFACTOR = 'HANGSX';
    //public static $TYPE_BIGSALE = 100;//Use in child class

    public static $PROPERTY_G2 = 'PG2';//loai, hang sx
    public static $PROPERTY_GDF = '';//loai, hang sx
    public static $PROPERTY_G3 = 'PG3';//loai, hang sx, size

    public static $LV1_DF = '';
    public static $LV1_DCN = 'DCN';
    public static $LV1_XE = 'XE';
    public static $LV1_DOHIEU = 'DOHIEU';
    public static $LV1_THIETBI = 'THIETBI';
    public static $LV1_OTHER = 'OTHER';

    public static $LV2_MANUFACTOR_DF = '';
    public static $LV2_MANUFACTOR_DIENTHOAI = 'DIENTHOAI';
    public static $LV2_MANUFACTOR_SUUTAP = 'SUUTAP';
    public static $LV2_MANUFACTOR_DODUNG = 'DODUNG';
    public static $LV2_MANUFACTOR_MTB = 'MTB';
    public static $LV2_MANUFACTOR_LAPTOP = 'LAPTOP';
    public static $LV2_MANUFACTOR_PHUKIEN = 'PHUKIEN';
    public static $LV2_MANUFACTOR_XEDAP = 'XEDAP';
    public static $LV2_MANUFACTOR_XEMAY = 'XEMAY';
    public static $LV2_MANUFACTOR_OTO = 'OTO';
    public static $LV2_MANUFACTOR_NUOCHOA = 'NUOCHOA';
    public static $LV2_MANUFACTOR_QUANAO = 'QUANAO';
    public static $LV2_MANUFACTOR_PKTT = 'PKTT';
    public static $LV2_MANUFACTOR_OTHER = 'OTHER';

    public static $LV4_DF = '';
    public static $LV4_QUANAO = 'QUANAO';
    public static $LV4_GIAYDEP = 'GIAYDEP';

    public static $PRICE_RANGE_DF = '';
    public static $PRICE_RANGE_1 = 'PR1';
    public static $PRICE_RANGE_2 = 'PR2';
    public static $PRICE_RANGE_3 = 'PR3';
    public static $PRICE_RANGE_4 = 'PR4';

    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_PRODUCTCAT, 'operator' => static::$OP_EQUAL)
        ));
    }

    /*
    static $has_many = array(
        array('product_list', 'class_name' => 'QdProduct', 'primary_key' => 'id', 'foreign_key' => 'product_cat_id')
    );*/
    public static function getInitObj()
    {
        $obj = new QdProductCat();
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->price_range_type = static::$PRICE_RANGE_1;
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
            'type' => array(
                'Caption' => array('vi-VN' => 'Phân loại'),
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
            '_product_count' => array(
                'Caption' => array('en-US' => 'SL SP', 'vi-VN' => 'SL SP'),
                'DataType' => 'Integer',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Count',
                    'Table' => 'QdProduct',
                    'Field' => 'id',
                    'TableFilter' => array(
                        'product_cat_id' => array(
                            'Field' => 'product_cat_id',
                            'Type' => 'FIELD',
                            'Value' => 'id'
                        ),
                        /*
                        array(
                            'Field' => 'active',
                            'Type' => 'FILTER',
                            'Value' => '=1',
                        )
                        */
                    )
                )
            ),
            'parent_id' => array(
                'Name' => 'parent_id',
                'Caption' => array('en-US' => 'Parent ID', 'vi-VN' => 'Mã LSP cha'),
                'DataType' => 'Code',
                'Description' => '',
                'Editable' => true,
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                    )
                )
            ),
            'struct_lv_3' => array(

            ),
            'struct_lv_2' => array(
                'Caption' => array('en-US' => 'Struct Lv2', 'vi-VN' => 'Struct Lv2'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$LV2_MANUFACTOR_DF => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
                    static::$LV2_MANUFACTOR_DIENTHOAI => array(
                        'Caption' => array('en-US' => 'Product Cat Phone', 'vi-VN' => 'LSP Điện thoại'),
                    ),
                    static::$LV2_MANUFACTOR_MTB => array(
                        'Caption' => array('en-US' => 'Product Cat Tablet', 'vi-VN' => 'LSP Máy tính bảng'),
                    ),
                    static::$LV2_MANUFACTOR_LAPTOP => array(
                        'Caption' => array('en-US' => 'Product Cat Laptop', 'vi-VN' => 'LSP Laptop'),
                    ),
                    static::$LV2_MANUFACTOR_PHUKIEN => array(
                        'Caption' => array('en-US' => 'Product Cat PK', 'vi-VN' => 'LSP Phụ kiện'),
                    ),
                    static::$LV2_MANUFACTOR_XEDAP => array(
                        'Caption' => array('en-US' => 'Product Cat Bicycle', 'vi-VN' => 'LSP Xe đạp'),
                    ),
                    static::$LV2_MANUFACTOR_XEMAY => array(
                        'Caption' => array('en-US' => 'Product Cat Moto', 'vi-VN' => 'LSP Xe máy'),
                    ),
                    static::$LV2_MANUFACTOR_OTO => array(
                        'Caption' => array('en-US' => 'Product Cat Car', 'vi-VN' => 'LSP Xe ôtô'),
                    ),
                    static::$LV2_MANUFACTOR_NUOCHOA => array(
                        'Caption' => array('en-US' => 'Product Cat NUOCHOA', 'vi-VN' => 'LSP Nước hoa'),
                    ),
                    static::$LV2_MANUFACTOR_QUANAO => array(
                        'Caption' => array('en-US' => 'Product Cat QUANAO', 'vi-VN' => 'LSP Quần áo'),
                    ),
                    static::$LV2_MANUFACTOR_PKTT => array(
                        'Caption' => array('en-US' => 'Accessories', 'vi-VN' => 'LSP Phụ kiện thời trang'),
                    ),
                    static::$LV2_MANUFACTOR_DODUNG => array(
                        'Caption' => array('en-US' => 'Product Cat Furniture', 'vi-VN' => 'LSP Đồ dùng'),
                    ),
                    static::$LV2_MANUFACTOR_SUUTAP => array(
                        'Caption' => array('en-US' => 'Product Cat Souvenir', 'vi-VN' => 'LSP Phong thủy - Sưu tập'),
                    ),
                    static::$LV2_MANUFACTOR_OTHER => array(
                        'Caption' => array('en-US' => 'Product Cat Other', 'vi-VN' => 'LSP Khác'),
                    ),
                    static::$LV2_MANUFACTOR_OTHER => array(
                        'Caption' => array('en-US' => 'Product Cat Other', 'vi-VN' => 'Loại SP Other'),
                    ),
                )
            ),
            'struct_lv_1' => array(
                'Caption' => array('en-US' => 'Struct Lv1', 'vi-VN' => 'Struct Lv1'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$LV1_DF => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
                    static::$LV1_DCN => array(
                        'Caption' => array('en-US' => 'Đồ công nghệ', 'vi-VN' => 'Đồ công nghệ'),
                    ),
                    static::$LV1_XE => array(
                        'Caption' => array('en-US' => 'Xe', 'vi-VN' => 'Xe'),
                    ),
                    static::$LV1_DOHIEU => array(
                        'Caption' => array('en-US' => 'Luxury', 'vi-VN' => 'Đồ hiệu'),
                    ),
                    static::$LV1_THIETBI => array(
                        'Caption' => array('en-US' => 'Device', 'vi-VN' => 'Thiết bị'),
                    )
                )
            ),
            'struct_lv_4' => array(
                'Caption' => array('en-US' => 'Struct Lv4', 'vi-VN' => 'Phân loại thời trang'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$LV4_DF => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định (không có)'),
                    ),
                    static::$LV4_QUANAO => array(
                        'Caption' => array('en-US' => 'Clothes', 'vi-VN' => 'Quần áo'),
                    ),
                    static::$LV4_GIAYDEP => array(
                        'Caption' => array('en-US' => 'Shoes', 'vi-VN' => 'Giày dép'),
                    ),
                ),
            ),
            'price_range_type' => array(
                'Caption' => array('en-US' => 'Price Group', 'vi-VN' => 'Mức giá'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$PRICE_RANGE_DF => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
                    static::$PRICE_RANGE_1 => array(
                        'Caption' => array('en-US' => 'Price range 1', 'vi-VN' => 'Mức 1 (500k)'),
                    ),
                    static::$PRICE_RANGE_2 => array(
                        'Caption' => array('en-US' => 'Price range 2', 'vi-VN' => 'Mức 2 (5tr)'),
                    ),
                    static::$PRICE_RANGE_3 => array(
                        'Caption' => array('en-US' => 'Price range 3', 'vi-VN' => 'Mức 3 (50tr)'),
                    ),
                    static::$PRICE_RANGE_4 => array(
                        'Caption' => array('en-US' => 'Price range 4', 'vi-VN' => 'Mức 4 (3 tỉ)'),
                    ),

                )
            ),
            'property_grp_type' => array(
                'Caption' => array('en-US' => 'Property Group', 'vi-VN' => 'Nhóm thuộc tính'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$PROPERTY_GDF => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
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
            '_permalink_search_page_struct_lv1' => array(
                'Name' => '_permalink_search_page_struct_lv1',
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
            ),
            '_permalink_search_page_struct_lv2' => array(
                'Name' => '_permalink_search_page_struct_lv2',
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
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
        $obj['id']['ReadOnly'] = false;
        $obj['__sys_link_manufactors_url'] = array(
            'FieldClass' => 'System',
            'Caption' => array('en-US' => 'Manufactor Links', 'vi-VN' => 'Hãng SX liên kết'),
            'TableRelation' => array(
                'Table' => 'QdProcat2ManuSel',
                'Field' => 'id',
                'TableFilter' => array(
                    array(
                        'Condition' => array(
                            'Field' => '',
                            'Type' => 'CONST',//'FIELD'
                            'Value' => ''
                        ),
                        'Field' => 'productcat_id',
                        'Type' => 'FIELD',
                        'Value' => 'id'
                    ),
                    array(
                        'Condition' => array(
                            'Field' => '',
                            'Type' => 'CONST',//'FIELD'
                            'Value' => ''
                        ),
                        'Field' => 'selection',
                        'Type' => 'CONST',
                        'Value' => true
                    )
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
        $p = $this;
        $tmp = array();
        while($p!=null){
            array_push($tmp, array('name' => $p->name, 'url' => $p->getPermalink()));
            $p = $p->getParentObj();
        }
        $tmp = array_reverse($tmp);
        $re = array_merge($re, $tmp);
        return $re;
    }

    protected function orderOnValidate($field_name)
    {
        if ($this->$field_name <= 0) {
            //$this->pushValidateError($field_name, 'Order phải lớn hơn 0');
        }
    }

    protected function parent_idOnValidate($field_name)
    {
        //check exit
        if ($this->$field_name != '') {
            $p = QdProductCat::GET($this->$field_name);
            if ( $p == null) {
                $this->pushValidateError($field_name, 'Product Cat không tồn tại!');
                if (!$this->is_new_record()) {
                    $this->$field_name = $this->xRec()->$field_name;
                }
                return false;
            }
            if($this->$field_name == $this->id) {
                $this->pushValidateError($field_name, 'Không thể chọn cha là chính nó!');
                return false;
            }
        }
        $this->level = $this->getDeepLevel();
        $this->levelOnValidate('level');
    }

    protected function levelOnValidate($field_name)
    {
        if($this->$field_name === 3){
            $this->struct_lv_3 = $this->id;
            $this->pushValidateError($field_name, 'Tự động gán struct_lv_3 = id!', 'info');
        }
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

    protected static function getPermalinkSearchPageStructLv1($struct_id)
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));
        $query = add_query_arg(array('product-cat-id' => $struct_id), $query);
        return $query;
    }

    protected static function getPermalinkSearchPageStructLv2($struct_id)
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));
        $query = add_query_arg(array('product-cat-id' => $struct_id), $query);
        return $query;
    }

    protected function CALCFIELDS($flowfield_name)
    {
        if ($flowfield_name == '_permalink') {
            $this->qd_cached_attr[$flowfield_name] = $this->getPermalink();
            //return
            return $this->qd_cached_attr[$flowfield_name];
        } else if ($flowfield_name == '_permalink_search_page_struct_lv1') {
            $this->qd_cached_attr[$flowfield_name] = static::getPermalinkSearchPageStructLv1($this->struct_lv_1);
            //return
            return $this->qd_cached_attr[$flowfield_name];
        } else if ($flowfield_name == '_permalink_search_page_struct_lv2') {
            $this->qd_cached_attr[$flowfield_name] = static::getPermalinkSearchPageStructLv2($this->struct_lv_2);
            //return
            return $this->qd_cached_attr[$flowfield_name];
        }

        return parent::CALCFIELDS($flowfield_name);
    }
    public function getCalPriceRanges(){
        if($this->price_range_type != static::$PRICE_RANGE_DF){
            return static::getPriceRanges($this->price_range_type);
        } else {
            $p = $this->getParentObj();
            $pr = array();
            while($p!=null){
                $pr = $p->getPriceRanges($p->price_range_type);
                if(count($pr) > 0){
                    break;
                }
                $p = $p->getParentObj();
            }
            return $pr;
        }
    }
    public static function getPriceRanges($range_id)
    {
        switch ($range_id) {
            case static::$PRICE_RANGE_1:
                return array(
                    array(
                        0, 100000
                    ),
                    array(
                        100000, 200000
                    ),
                    array(
                        200000, 300000
                    ),
                    array(
                        300000, 400000
                    ),
                    array(
                        400000, 500000
                    ),
                    array(
                        500000, -1
                    ),
                );
            case static::$PRICE_RANGE_2:
                return array(
                    array(
                        0, 1000000
                    ),
                    array(
                        1000000, 2000000
                    ),
                    array(
                        2000000, 3000000
                    ),
                    array(
                        3000000, 4000000
                    ),
                    array(
                        4000000, 5000000
                    ),
                    array(
                        5000000, -1
                    ),
                );
            case static::$PRICE_RANGE_3:
                return array(
                    array(
                        0, 10000000
                    ),
                    array(
                        10000000, 20000000
                    ),
                    array(
                        20000000, 30000000
                    ),
                    array(
                        30000000, 40000000
                    ),
                    array(
                        40000000, 50000000
                    ),
                    array(
                        50000000, -1
                    ),
                );
            case static::$PRICE_RANGE_4:
                return array(
                    array(
                        0, 500000000
                    ),
                    array(
                        500000000, 1000000000
                    ),
                    array(
                        1000000000, 2000000000
                    ),
                    array(
                        2000000000, 3000000000
                    ),
                    array(
                        3000000000, -1
                    ),
                );
            default:
                return array();
        }
    }

    public function GETRTABLES()
    {
        return array(
            'QdProduct' => array(
                'product_cat_id'
            )
        );
    }

    protected function TABLECAPTION()
    {
        return array(
            'vi-VN' => 'Loại SP',
            'en-US' => 'Product Cat'
        );
    }


    public function fn_genstructure($location, $params = array())
    {
        //$obj = new QdProductCat();
        //delete all
        //$obj->DELETEALL(false);
        //restruct

        //LV1
        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_1 = static::$LV1_DCN;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Đồ công nghệ';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_1 = static::$LV1_XE;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Xe';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_1 = static::$LV1_DOHIEU;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_GDF;
        $obj->name = 'Đồ hiệu';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_1 = static::$LV1_THIETBI;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Thiết bị';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        //LV2 - DCN
        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_DIENTHOAI;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DCN;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Điện thoại';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_MTB;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DCN;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Máy tính bảng';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_LAPTOP;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DCN;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Laptop';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_PHUKIEN;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DCN;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Phụ kiện';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();
        //END LV2 - DCN

        //LV2 - XE
        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_XEDAP;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_XE;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Xe đạp';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_XEMAY;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_XE;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Xe máy';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_OTO;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_XE;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Ô tô';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();
        //END LV2 - XE

        //LV2 - DOHIEU
        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_NUOCHOA;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DOHIEU;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Nước hoa';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_QUANAO;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DOHIEU;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G3;
        $obj->name = 'Quần áo';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_PKTT;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_DOHIEU;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_GDF;
        $obj->name = 'Phụ kiện thời trang';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        //END LV2 - DOHIEU

        //LV2 - THIETBI
        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_DODUNG;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_THIETBI;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Đồ dùng';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_SUUTAP;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_THIETBI;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Phong thủy - Sưu tập';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();

        $obj = new QdProductCat();
        $obj->id = $obj->struct_lv_2 = static::$LV2_MANUFACTOR_OTHER;
        $obj->parent_id = $obj->struct_lv_1 = static::$LV1_THIETBI;
        $obj->type = static::$TYPE_PRODUCTCAT;
        $obj->property_grp_type = static::$PROPERTY_G2;
        $obj->name = 'Sản phẩm khác';
        $obj->order = 10;
        $obj->active = true;
        $obj->save();
        //END LV2 - THIETBI
        return true;
    }

}