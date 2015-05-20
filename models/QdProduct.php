<?php

class QdProduct extends QdRoot
{
    static $table_name = 'mpd_product';
    public static $TYPE_DEFAULT = '';
    public static $TYPE_QUANAO = 'QA';
    public static $TYPE_GIAYDEP = 'GD';
    public static $TYPE_OTHER = 'OT';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            //SAMPLE FIELD CONFIG
            '_product_cat_name' => array(
                'Name' => 'product_cat_name',
                'Caption' => array('en' => 'Product Cat Name', 'vn' => 'Tên loại SP'),
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
            'product_cat_id' => array(
                'Name' => 'product_cat_id',
                'Caption' => array('en' => 'Product Cat ID', 'vn' => 'Mã loại SP'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                        /*array(
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
            '_manufacturer_name' => array(
                'Name' => '_manufacturer_name',
                'Caption' => array('en' => 'Manufactor Name', 'vn' => 'Tên Hãng SX'),
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
	            'Caption' => array('en' => 'Size ID', 'vn' => 'Mã Size'),
	            'DataType' => 'Code',
	            'Numeric' => true,
	            'Description' => '',
	            'Editable' => true,
	            'InitValue' => '0',
	            'FieldClass' => 'Normal',//'FlowField'
	            'TableRelation' => array(
		            'Table' => 'QdSize',
		            'Field' => 'id',
		            'TableFilter' => array(
			            /*array(
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
            'manufacturer_id' => array(
                'Name' => 'manufacturer_id',
                'Caption' => array('en' => 'Manufactor ID', 'vn' => 'Mã Hãng SX'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdManufactor',
                    'Field' => 'id',
                    'TableFilter' => array(
                        /*array(
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
                'Caption' => array('en' => 'Avatar', 'vn' => 'Hình đại diện'),
                'DataType' => 'Image',
                'Description' => 'Hình đại diện',
            ),
            'active' => array(
                'Caption' => array('en' => 'Active', 'vn' => 'Kích hoạt'),
                'DataType' => 'Boolean',
                'InitValue' => true,
            ),
            'name' => array(
                'Caption' => array('vn' => 'Tên SP'),
                //'DataType' => 'Color',
            ),
            'code' => array(
                'Caption' => array('vn' => 'Mã SP'),
            ),
            'price' => array(
                'Caption' => array('vn' => 'Giá'),
            ),
            'description' => array(
                'Caption' => array('vn' => 'Mô tả'),
                'DataType' => 'WYSIWYG',
            ),
            'doitra_baohanh' => array(
                'Caption' => array('vn' => 'Đổi trả/Bảo hành'),
                'DataType' => 'WYSIWYG',
            ),
            'giaohang_thanhtoan' => array(
                'Caption' => array('vn' => 'Giao hàng/Thanh toán'),
                'DataType' => 'WYSIWYG',
            ),
            'temp_out_of_stock' => array(
                'Caption' => array('vn' => 'Tạm hết hàng'),
                'DataType' => 'Boolean',
                'InitValue' => false,
            ),
            'type' => array(
                'Caption' => array('en' => 'Type', 'vn' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_DEFAULT => array(
                        'Caption' => array('en' => 'Default', 'vn' => 'Mặc định'),
                    ),
                    static::$TYPE_QUANAO => array(
                        'Caption' => array('en' => 'Clothes', 'vn' => 'Quần áo'),
                    ),
                    static::$TYPE_GIAYDEP => array(
                        'Caption' => array('en' => 'Shoes', 'vn' => 'Gìay dép'),
                    ),
                    static::$TYPE_OTHER => array(
                        'Caption' => array('en' => 'Other', 'vn' => 'Khác'),
                    ),
                )
            ),
            'date_modified' => array(
                'Caption' => array('vn' => 'Ngày cập nhật'),
                'DataType' => 'Date',
            ),
        ));
        $obj['__sys_lines_url']['Caption'] = array('en' => 'Related Products', 'vn' => 'SP liên kết');
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
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-detail.php'));
        $query = add_query_arg(array('id' => $this->id/*, 'title' => $this->name*/), $query);
        return $query;
    }

    public function getBreadcrumbs()
    {
        $re = $this->getProductCatObj()->getBreadcrumbs();
        array_push($re, array('name' => $this->name, 'url' => $this->getPermalink()));
        return $re;
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
                $this->pushValidateError($field_name, 'Code tự động in hoa và bằng Name', 'info');
                $this->$field_name = strtoupper($this->name);
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
        //check exit
        if ($this->getProductCatObj() == null) {
            $this->pushValidateError($field_name, 'Product Cat không tồn tại!');
            if (!$this->is_new_record()) {
                $this->$field_name = $this->xRec()->$field_name;
            }
        }
    }

    protected function avatarOnValidate($field_name)
    {
        if ($this->$field_name == '') {
            $pro_setup = QdProductSetup::GET();
            $this->$field_name = $pro_setup->df_pro_avatar;
            $this->pushValidateError($field_name, 'Tự động gán Avatar mặc định cho Product', 'info');
        }
    }

    public static function getInitObj()
    {
        $obj = new QdProduct();
        $obj->description = Qdmvc_Config::getProductSetup()->df_product_desc_tpl;
        $obj->type = static::$TYPE_DEFAULT;
        return $obj;
    }
    public function fn_active($location, $params=array())
    {
        $this->active = true;
        $this->code .= 'e';
        $this->save(true, $location . '|'.$this->getCalledClassName() . '|fn_active');
        $this->pushValidateError('active', 'Active thành công', 'info');
    }
}