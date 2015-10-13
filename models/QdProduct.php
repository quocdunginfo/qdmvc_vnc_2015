<?php

class QdProduct extends QdRoot
{
    static $table_name = 'mpd_product';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            //SAMPLE FIELD CONFIG
            '_seo_title_preview' => array(
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'Description' => array(
                    'vi-VN' => sprintf(Qdmvc_Message::getMsg('fd_seometa_field_title'), 'chi tiết SP')
                )
            ),
            '_seo_description_preview' => array(
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'Description' => array(
                    'vi-VN' => sprintf(Qdmvc_Message::getMsg('fd_seometa_field_description'), 'chi tiết SP')
                )
            ),
            //SAMPLE FIELD CONFIG
            '_product_cat_name' => array(
                'Name' => '_product_cat_name',
                'Caption' => array('en-US' => 'Product Cat Name', 'vi-VN' => 'Tên loại SP'),
                'Description' => array(//'vi-VN' => 'Tên loại SP ứng với mã SP'
                ),
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
                            'Value' => 'product_cat_id'
                        )
                    )
                )
            ),
            //SAMPLE FIELD CONFIG
            '_price_discount' => array(
                'Name' => '_price_discount',
                'DataType' => 'Decimal',
                'FieldClass' => 'FlowField',
                'Description' => array(
                    'vi-VN' => sprintf('Giá sau khi giảm - sửa Field \'discount_percent\' để thay đổi')
                ),
            ),
            'product_cat_id' => array(
                'Name' => 'product_cat_id',
                'Caption' => array('en-US' => 'Product Cat ID', 'vi-VN' => 'Mã loại SP'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => array(//'vi-VN' => sprintf('Mã SP')
                ),
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array(/*array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'order',
                            'Type' => 'FIELD',
                            'Value' => 10
                        )*/
                    )
                ),
                'DataPort' => 'product_cat_port'
            ),
            '_manufacturer_name' => array(
                'Name' => '_manufacturer_name',
                'Caption' => array('en-US' => 'Manufactor Name', 'vi-VN' => 'Tên Hãng SX'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdManufactor',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'manufacturer_id'
                        )
                    )
                )
            ),
            'size_id' => array(
                'Name' => 'size_id',
                'Caption' => array('en-US' => 'Size ID', 'vi-VN' => 'Mã Size'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => array(
                    'vi-VN' => 'Chỉ áp dụng đối với lại sản phẩm \'Quần áo\' và \'Giày dép\''
                ),
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdSize',
                    'Field' => 'id',
                    'TableFilter' => array(/*array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'order',
                            'Type' => 'FIELD',
                            'Value' => 10
                        )*/
                    )
                ),
                'DataPort' => 'size_port'
            ),
            'manufacturer_id' => array(
                'Name' => 'manufacturer_id',
                'Caption' => array('en-US' => 'Manufactor ID', 'vi-VN' => 'Mã Hãng SX'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdManufactor',
                    'Field' => 'id',
                    'TableFilter' => array(/*array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'order',
                            'Type' => 'FIELD',
                            'Value' => 10
                        )*/
                    )
                )
            ),
            'avatar' => array(
                'Caption' => array('en-US' => 'Avatar', 'vi-VN' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => array(
                    'vi-VN' => 'Hình đại diện hiển thị ở trang tìm kiếm SP hoặc những khu vực tương tự (hình đơn)<br>Muốn chọn nhiều hình cho trang chi tiết SP, dùng chức năng \'Hình ảnh\' để thêm hình'
                ),
            ),
            'active' => array(
                'Caption' => array('en-US' => 'Active', 'vi-VN' => 'Kích hoạt'),
                'DataType' => 'Boolean',
                'InitValue' => true,
                'Description' => array(
                    'vi-VN' => 'Có hiển thị ra ngoài Web hay không ?'
                ),
                'ReadOnly' => true
            ),
            'name' => array(
                'Caption' => array('vi-VN' => 'Tên SP'),
                //'DataType' => 'Color',
            ),
            'code' => array(
                'Caption' => array('vi-VN' => 'Mã SP'),
                'Description' => array(
                    'vi-VN' => 'Mã SP hiển thị trên trang chi tiết SP'
                ),
            ),
            'price' => array(
                'Caption' => array('vi-VN' => 'Giá'),
            ),
            'description' => array(
                'Caption' => array('vi-VN' => 'Mô tả'),
                'DataType' => 'WYSIWYG',
                'Description' => array(
                    'vi-VN' => 'Tab thông tin thứ 1 của trang chi tiết SP'
                ),
            ),
            'doitra_baohanh' => array(
                'Caption' => array('vi-VN' => 'Đổi trả/Bảo hành'),
                'DataType' => 'WYSIWYG',
                'Description' => array(
                    'vi-VN' => 'Tab thông tin thứ 2 của trang chi tiết SP'
                ),
            ),
            'giaohang_thanhtoan' => array(
                'Caption' => array('vi-VN' => 'Giao hàng/Thanh toán'),
                'DataType' => 'WYSIWYG',
                'Description' => array(
                    'vi-VN' => 'Tab thông tin thứ 3 của trang chi tiết SP'
                ),
            ),
            'temp_out_of_stock' => array(
                'Caption' => array('vi-VN' => 'Tạm hết hàng'),
                'DataType' => 'Boolean',
                'InitValue' => false,
                'Description' => array(
                    'vi-VN' => 'Đánh dấu SP tạm hết hàng, nhưng vẫn hiển thị trên Web'
                ),
            ),
            'discount_percent' => array(
                'DataType' => 'Decimal',
                'Description' => array(
                    'vi-VN' => '% giảm giá so với Field \'price\', nhập số thập phân vd: 0.56'
                ),
            ),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    QdManufactor::$TYPE2_MANUFACTOR_DEFAULT => array(
                        'Caption' => array('en-US' => 'Default', 'vi-VN' => 'Mặc định'),
                    ),
                    QdManufactor::$TYPE2_MANUFACTOR_QUANAO => array(
                        'Caption' => array('en-US' => 'Clothes', 'vi-VN' => 'Quần áo'),
                    ),
                    QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP => array(
                        'Caption' => array('en-US' => 'Shoes', 'vi-VN' => 'Giày dép'),
                    ),
                    QdManufactor::$TYPE2_MANUFACTOR_OTHER => array(
                        'Caption' => array('en-US' => 'Other', 'vi-VN' => 'Khác'),
                    ),
                )
            ),
            'type3' => array(

            ),
            'price_range_type' => array(

            ),
            'noseries' => array(),
            '_permalink' => array(
                'Name' => '_permalink',
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
            ),
            'property_grp_type' => array(
                /*'Caption' => array('en-US' => 'Property Group', 'vi-VN' => 'Nhóm thuộc tính'),
                'DataType' => 'Option',
                'Options' => array(
                    QdProductCat::$PROPERTY_G2 => array(
                        'Caption' => array('en-US' => '2 properties', 'vi-VN' => '2 thuộc tính'),
                    ),
                    QdProductCat::$PROPERTY_G3 => array(
                        'Caption' => array('en-US' => '3 properties', 'vi-VN' => '3 thuộc tính'),
                    ),
                ),
                'ReadOnly' => true
                */
            ),
        ));
        $obj['id']['Description'] = array(
            'vi-VN' => sprintf('Mã SP quản lý trong hệ thống, không hiển thị trên Web<br>Muốn hiển thị mã trên Web, dùng Field \'%s\'', $obj['code']['Caption']['vi-VN'])
        );
        $obj['__sys_lines_url']['Caption'] = array('en-US' => 'Related Products', 'vi-VN' => 'SP liên kết');
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPro2Pro',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'product_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );

        $obj['__sys_seometa_url'] = array(
            'FieldClass' => 'System',
            'Caption' => array('en-US' => 'SEO Meta', 'vi-VN' => 'SEO Meta'),
            'TableRelation' => array(
                'Table' => 'QdSEOMeta',
                'Field' => 'id',
                'TableFilter' => array(
                    array(
                        'Condition' => array(
                            'Field' => '',
                            'Type' => 'CONST',//'FIELD'
                            'Value' => ''
                        ),
                        'Field' => 'model_id',
                        'Type' => 'FIELD',
                        'Value' => 'id'
                    ),
                    array(
                        'Condition' => array(
                            'Field' => '',
                            'Type' => 'CONST',//'FIELD'
                            'Value' => ''
                        ),
                        'Field' => 'model',
                        'Type' => 'CONST',
                        'Value' => 'QdProduct'
                    )
                )
            ));
        $obj['id']['ReadOnly'] = false;
        /*
        $obj['__sys_lines_url'] = array(
            'FieldClass' => 'System',
            'Caption' => array('en-US' => 'UOM', 'vi-VN' => 'Đơn vị tính'),
            'TableRelation' => array(
                'Table' => 'QdProUOM',
                'Field' => 'id',
                'TableFilter' => array(
                    array(
                        'Condition' => array(
                            'Field' => '',
                            'Type' => 'CONST',//'FIELD'
                            'Value' => ''
                        ),
                        'Field' => 'product_id',
                        'Type' => 'FIELD',
                        'Value' => 'id'
                    )
                )
            )
        );*/
        return $obj;
    }

    static $alias_attribute = array(
        'model' => 'code'
    );
    static $belongs_to = array(
        array('product_cat_obj', 'class_name' => 'QdProductCat', 'foreign_key' => 'product_cat_id', 'primary_key' => 'id')
    );

    public function getProductCatObj()
    {
        return $this->product_cat_obj;
    }

    public function getPermalink()
    {
        /*$query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-detail.php'));
        $query = add_query_arg(array('id' => $this->id), $query);*/

        $query = site_url(sprintf('%s/%s.html', Qdmvc_Helper::sanitize_title_with_dashes($this->name), $this->id));
        return $query;
    }

    public function getBreadcrumbs()
    {
        if($this->getProductCatObj()!=null){
            $re = $this->getProductCatObj()->getBreadcrumbs();
            array_push($re, array('name' => $this->name, 'url' => $this->getPermalink()));
            return $re;
        }
        return array();
    }

    /*
     * Validation
     *
     */
    protected function nameOnValidate($field_name)
    {
        if ($this->$field_name == '') {
            $this->pushValidateError($field_name, 'Name bắt buộc');
        }
        /*
        if($this->active==1)
        {
            if($this->name!=$this->xRec()->name)
            {
                $this->pushValidateError($field_name, 'Không thể sửa Name khi Active=1');
            }
        }
        */
    }

    protected function activeOnValidate($field_name)
    {
        /*
        if($this->active ==0 && $this->active != $this->xRec()->active)
        {
            if($this->code != 1)
            {
                $this->pushValidateError($field_name, 'Code phải bằng 1 mới tắt được Active');
            }
        }
        */
    }

    protected function codeOnValidate($field_name)
    {
        if ($this->$field_name == '') {
            if ($this->name != null) {
                $this->pushValidateError($field_name, 'Code tự động in hoa và bằng ID', 'info');
                $this->$field_name = strtoupper($this->id);
            }
        }
    }

    protected function priceOnValidate($field_name)
    {
        if ($this->$field_name != '' && $this->$field_name <= 0) {
            $this->pushValidateError($field_name, 'Price phải lớn hơn 0', 'error');
        }
    }

    protected function product_cat_idOnValidate($field_name)
    {
        $format = "product_cat_lv%s_id";

        //check exit
        $pc = $this->getProductCatObj();
        if ($pc == null) {
            $this->pushValidateError($field_name, 'Product Cat không tồn tại!');
            if (!$this->is_new_record()) {
                $this->$field_name = $this->xRec()->$field_name;
            }
        } else {
            $struct_lv = sprintf($format, $pc->level);
            $this->{$struct_lv} = $pc->id;

            $pc2 = $pc->getParentObj();
            if ($pc2 != null) {
                $struct_lv = sprintf($format, $pc2->level);
                $this->{$struct_lv} = $pc2->id;

                $pc3 = $pc2->getParentObj();
                if ($pc3 != null) {
                    $struct_lv = sprintf($format, $pc3->level);
                    $this->{$struct_lv} = $pc3->id;
                }
            }

            //validate other mark field
            $this->property_grp_type = $pc->property_grp_type;
            $this->type3 = $pc->type3;
            $this->price_range_type = $pc->price_range_type;
        }
    }

    protected function avatarOnValidate($field_name)
    {
        if ($this->$field_name == '') {
            $pro_setup = QdSetupProduct::GET();
            $this->$field_name = $pro_setup->df_pro_avatar;
            $this->pushValidateError($field_name, 'Tự động gán Avatar mặc định cho Product', 'info');
        }
    }

    public static function getInitObj()
    {
        $obj = new QdProduct();
        $obj->description = Qdmvc_Config::getProductSetup()->df_product_desc_tpl;
        $obj->type = QdManufactor::$TYPE2_MANUFACTOR_DEFAULT;
        return $obj;
    }

    public function fn_active($location, $params)
    {
        //static::connection()->transaction();

        if (!$this->checkPermission(__FUNCTION__)) return false;

        $this->active = !$this->active;
        $this->save(true, $location . '|' . $this->getCalledClassName() . '|fn_active');
        $this->pushValidateError('active', 'Active thành công', 'info');

        //static::connection()->rollback();
        return array('subinfo' => 'Tiến trình hoàn tất!', 'subinfo2' => true);
    }

    public function getRProducts2()
    {
        $re = array();
        $record = new QdPro2Pro();
        $record->SETRANGE('product_id', $this->id);
        $tmp = $record->GETLIST();
        foreach ($tmp as $item) {
            $tmp2 = QdProduct::GET($item->r_product_id);
            if ($tmp2 != null) {
                array_push($re, $tmp2);
            }
        }
        return $re;
    }

    protected function CALCFIELDS($flowfield_name)
    {
        if ($flowfield_name == '_permalink') {
            $this->qd_cached_attr[$flowfield_name] = $this->getPermalink();
            //return
            return $this->qd_cached_attr[$flowfield_name];
        }
        if ($flowfield_name == '_price_discount') {

            $this->qd_cached_attr[$flowfield_name] = $this->price - ($this->price * $this->discount_percent);
            //return
            return $this->qd_cached_attr[$flowfield_name];
        } else if ($flowfield_name == '_seo_title_preview') {
            $seo = $this->getSEOMeta();
            foreach ($seo as $item) {
                if ($item->meta_name == QdSEOMeta::$META_NAME_TITLE) {
                    $this->qd_cached_attr[$flowfield_name] = $item->_meta_value_preview;
                    return $this->qd_cached_attr[$flowfield_name];
                }
            }
        } else if ($flowfield_name == '_seo_description_preview') {
            $seo = $this->getSEOMeta();
            foreach ($seo as $item) {
                if ($item->meta_name == QdSEOMeta::$META_NAME_DESCRIPTION) {
                    $this->qd_cached_attr[$flowfield_name] = $item->_meta_value_preview;
                    return $this->qd_cached_attr[$flowfield_name];
                }
            }
        }
        return parent::CALCFIELDS($flowfield_name);
    }

    public function fn_validate_all_struct_level($location, $params)
    {
        $tmp = new QdProduct();
        $re = $tmp->GETLIST();
        $count = 0;
        foreach ($re as $item) {
            if ($item->save()) {
                $count++;
            }
        }
        $this->pushValidateError('', 'Total items validated: ' . $count, 'info');
    }

    public function getSEOMeta()
    {
        $obj = parent::getSEOMeta(); // TODO: Change the autogenerated stub
        $title_found = false;
        $desc_found = false;
        foreach ($obj as $item) {
            if ($item->meta_name == QdSEOMeta::$META_NAME_TITLE) {
                $title_found = true;
            } else if ($item->meta_name == QdSEOMeta::$META_NAME_DESCRIPTION) {
                $desc_found = true;
            }
        }
        if (!$title_found) {
            $tmp = new QdSEOMeta();
            $tmp->active = true;
            $tmp->overwrite = false;
            $tmp->seo_tpl = 1;
            $tmp->meta_name = QdSEOMeta::$META_NAME_TITLE;
            $tmp->meta_value = $this->name;
            array_push($obj, $tmp);
        }
        if (!$desc_found) {
            $tmp = new QdSEOMeta();
            $tmp->active = true;
            $tmp->overwrite = true;
            $tmp->seo_tpl = 1;
            $tmp->meta_name = QdSEOMeta::$META_NAME_DESCRIPTION;

            $price = number_format($this->_price_discount, 0, '.', ',') . ' VND';
            if ($this->discount_percent > 0) {
                $price .= ' (' . ($this->discount_percent * 100) . '% OFF)';
            }
            $tmp->meta_value = substr(strip_tags($this->description), 0, 80) . '...' . $price;

            array_push($obj, $tmp);
        }
        return $obj;
    }

}