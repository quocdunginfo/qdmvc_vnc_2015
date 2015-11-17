<?php

class QdPBHanh extends QdRoot
{
    static $table_name = 'mpd_pbhanh';
    static $STATUS_OPEN = 'OPEN';
    static $STATUS_PRINTED = 'PRINTED';
    static $STATUS_SHIPPED = 'SHIPPED';
    static $STATUS_CANCEL = 'CANCEL';
    static $STATUS_CLOSE = 'CLOSE';
    static $STATUS_BACK = 'BACK';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'data_no' => array(),
            'product_name' => array(
                'Caption' => array(
                    'vi-VN' => 'Tên SP'
                )
            ),
            'product_no' => array(
                'Caption' => array(
                    'vi-VN' => 'Mã SP'
                )
            ),
            'model' => array(
                'Caption' => array(
                    'vi-VN' => 'Model'
                )
            ),
            'serial_no' => array(),
            'stock_out_date' => array(
                'DataType' => 'Date',
            ),
            'cust_name' => array(
                'Caption' => array(
                    'vi-VN' => 'Tên KH'
                ),
                'Require' => true
            ),
            'cust_addr' => array(
                'Caption' => array(
                    'vi-VN' => 'Địa chỉ KH'
                ),
                'Require' => true
            ),
            'cust_phone' => array(
                'Caption' => array(
                    'vi-VN' => 'SĐT KH'
                ),
                'Require' => true
            ),
            'cust_email' => array(
                'Caption' => array(
                    'vi-VN' => 'Email KH'
                ),
                'Require' => true
            ),
            'purchase_date' => array(
                'DataType' => 'Date',
                'Caption' => array(
                    'vi-VN' => 'Ngày mua'
                )
            ),
            'guarantee_exp_date' => array(
                'DataType' => 'Date',
                'Caption' => array(
                    'vi-VN' => 'Bảo hành đến'
                )
            ),
            'dealer_id' => array(
                'FieldClass' => 'Normal',
                'Caption' => array(
                    'vi-VN' => 'Mã SHOP'
                ),
                'TableRelation' => array(
                    'Table' => 'QdShop',
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
                'Description' => array(
                    'vi-VN' => 'Nhập mã SHOP > Lưu: Để tự validate \'Tên SHOP\' và \'Địa chỉ SHOP\'.<br>Bỏ trống Field này nếu muốn tự gõ 2 thuộc tính trên.<br>Đổi mã sẽ tự động validate lại (cần chú ý!!!).'
                )
            ),
            'dealer_name' => array(
                'Caption' => array(
                    'vi-VN' => 'Tên SHOP'
                )
            ),
            'dealer_addr' => array(
                'Caption' => array(
                    'vi-VN' => 'Địa chỉ SHOP'
                )
            ),
            'type' => array(),
            'status' => array(
                'DataType' => 'Option',
                'Options' => array(
                    static::$STATUS_OPEN => array(
                        'Caption' => array('en-US' => 'Open', 'vi-VN' => 'Mở'),
                    ),
                    static::$STATUS_PRINTED => array(
                        'Caption' => array('en-US' => 'Printed', 'vi-VN' => 'Đã in'),
                    ),
                    static::$STATUS_SHIPPED => array(
                        'Caption' => array('en-US' => 'Shipped', 'vi-VN' => 'Đã giao'),
                    ),
                ),
                'Caption' => array(
                    'vi-VN' => 'Trạng thái phiếu'
                ),
                'ReadOnly' => true
            ),
            'description' => array(
                'DataType' => 'WYSIWYG',
                'Caption' => array(
                    'vi-VN' => 'Mô tả'
                )
            ),
            'days_of_warranty' => array(
                'DataType' => 'Text',
                'Caption' => array('en-US' => 'Days of warranty', 'vi-VN' => 'Số ngày BH'),
                'Description' => array(
                    'vi-VN' => 'Xóa trắng > Lưu: Để validate lại dựa theo công thức<br> \'X Ngày\' = \'Bảo hành đến\' - \'Ngày mua\''
                )
            ),
            'guarantee_address' => array(
                'Caption' => array(
                    'vi-VN' => 'Địa chỉ BH'
                ),
                'Description' => array(
                    'vi-VN' => 'Xóa trắng > Lưu: Để validate lại theo \'Địa chỉ SHOP\''
                )
            ),
            'free_days_exchange' => array(
                'Caption' => array(
                    'vi-VN' => 'Chính sách đổi trả'
                )
            ),
            '_days_of_warranty_integer' => array(
                'Name' => '_days_of_warranty',
                'DataType' => 'Integer',
                'FieldClass' => 'FlowField',
            )
        ));
        $obj['id']['ReadOnly'] = false;
        $obj['id']['Description'] = array(
            'vi-VN' => 'Mã tự gõ hoặc nhảy theo No Series (Vào No Series để cài đặt)'
        );
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPBHanh();
        $obj->status = static::$STATUS_OPEN;
        $obj->purchase_date = new DateTime();
        $obj->stock_out_date = $obj->purchase_date;
        //$obj->cust_email = '@';
        //$obj->cust_phone = '(+84)';
        return $obj;
    }

    protected function dealer_idOnValidate($field_name)
    {
        if ($this->xRec() != null) {
            if ($this->xRec()->dealer_id != $this->dealer_id && $this->dealer_id > 0) {
                $tmp = QdShop::GET($this->dealer_id);
                if ($tmp != null) {
                    $this->dealer_name = $tmp->name;
                    $this->dealer_addr = $tmp->address;

                    $this->pushValidateError('', 'Tự động gán Dealer Name, Address từ QdShop', 'info');
                }
            }
        }
    }

    public function fn_get_print_doc($location, $params = array())
    {
        //get from setup other
        $tmp = QdSetupOther::GET();
        if ($tmp != null) {
            $tpl = $tmp->pbhanh_tpl;
            if (trim($tpl) === '') {
                $this->pushValidateError('', 'Please setup pbhanh_tpl in SetupOther first', 'error');
            } else {
                //mapping field
                $tpl = str_replace('{id}', $this->id, $tpl);
                $tpl = str_replace('{cust_fullname}', $this->cust_name, $tpl);
                $tpl = str_replace('{cust_address}', $this->cust_addr, $tpl);
                $tpl = str_replace('{cust_phone}', $this->cust_phone, $tpl);
                $tpl = str_replace('{cust_email}', $this->cust_email, $tpl);
                $tpl = str_replace('{product_name}', $this->product_name, $tpl);
                $tpl = str_replace('{product_model}', $this->model, $tpl);
                $tpl = str_replace('{product_no}', $this->product_no, $tpl);
                $tpl = str_replace('{warranty_policy}', $this->free_days_exchange, $tpl);
                $tpl = str_replace('{warranty_time_span}', $this->days_of_warranty, $tpl);


                if ($this->purchase_date) {
                    $tpl = str_replace('{date_of_purchase}', date_format($this->purchase_date, "d/m/Y"), $tpl);
                } else {
                    $tpl = str_replace('{date_of_purchase}', '', $tpl);
                }

                if ($this->date_created) {
                    $tpl = str_replace('{date_created}', date_format($this->purchase_date, "d/m/Y"), $tpl);
                } else {
                    $tpl = str_replace('{date_created}', '', $tpl);
                }

                if ($this->guarantee_exp_date) {
                    $tpl = str_replace('{guarantee_exp}', date_format($this->guarantee_exp_date, "d/m/Y"), $tpl);
                } else {
                    $tpl = str_replace('{guarantee_exp}', '', $tpl);
                }

                $tpl = str_replace('{shop_name}', $this->dealer_name, $tpl);
                $tpl = str_replace('{shop_address}', $this->dealer_addr, $tpl);
                $tpl = str_replace('{guarantee_address}', $this->guarantee_address, $tpl);

                if ($this->status === static::$STATUS_OPEN) {
                    $this->status = static::$STATUS_PRINTED;
                    if ($this->save())
                        return $tpl;
                    else {
                        $this->pushValidateError('', 'Could not Save!', 'error');
                    }
                }
                return $tpl;
            }
        } else {
            $this->pushValidateError('', 'Could not get QdSetupOther!', 'error');
        }
    }

    protected function guarantee_addressOnValidate($field_name)
    {
        if ($this->{$field_name} === '') {
            $this->{$field_name} = $this->dealer_addr;
            $this->pushValidateError('', 'Tự động gán \'Địa chỉ BH\' theo \'Địa chỉ SHOP\'', 'info');
        }
    }

    public function fn_ship($location, $params = array())
    {
        if ($this->status !== static::$STATUS_PRINTED) {
            $this->pushValidateError('', 'Trạng thái phải là \'Đã In\' thì mới giao được', 'error');
            return false;
        } else {
            $this->status = static::$STATUS_SHIPPED;
            return $this->save();
        }
    }
    public function fn_reopen($location, $params = array())
    {
        if ($this->status == static::$STATUS_OPEN) {
            $this->pushValidateError('', 'Trạng thái phải khác \'Mở\'', 'error');
            return false;
        } else {
            $this->status = static::$STATUS_OPEN;
            return $this->save();
        }
    }

    public function delete($location = '')
    {
        if ($this->status != static::$STATUS_OPEN) {
            $this->pushValidateError('', 'Trạng thái phải là \'Mở\'', 'error');
            return false;
        } else {
            return parent::delete($location); // TODO: Change the autogenerated stub
        }
    }

    protected function CALCFIELDS($flowfield_name)
    {
        if ($flowfield_name == '_days_of_warranty_integer') {
            if ($this->guarantee_exp_date != null && $this->purchase_date != null) {
                $date1 = date_create($this->guarantee_exp_date);
                $date2 = date_create($this->purchase_date);
                $tmp = date_diff($date2, $date1);

                $this->qd_cached_attr[$flowfield_name] = $tmp->days;
            } else {
                $this->qd_cached_attr[$flowfield_name] = 0;
            }

            //return
            return $this->qd_cached_attr[$flowfield_name];
        }
        return parent::CALCFIELDS($flowfield_name);
    }

    protected function purchase_dateOnValidate($field_name)
    {
        if($this->$field_name != null && $this->guarantee_exp_date!=null && $this->days_of_warranty==''){
            $this->days_of_warranty = $this->_days_of_warranty_integer . ' ngày';
        }
    }
}