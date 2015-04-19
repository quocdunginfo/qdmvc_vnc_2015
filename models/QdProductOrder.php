<?php

class QdProductOrder extends QdRoot
{
    static $table_name = 'mpd_product_order';

    static $belongs_to = array(
        array('product_obj', 'class_name' => 'QdProduct', 'foreign_key' => 'product_id', 'primary_key' => 'id')
    );

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'product_id' => array(
                'Name' => 'product_id',
                'Caption' => array('en' => 'Product ID', 'vn' => 'Mã SP'),
                'DataType' => 'Code',
                'Numeric' => true,
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProduct',
                    'Field' => 'id',
                    'TableFilter' => array(
                    )
                )
            ),
            //SAMPLE FIELD CONFIG
            '_product_name' => array(
                'Name' => '_product_name',
                'Caption' => array('en' => 'Product Name', 'vn' => 'Tên SP'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdProduct',
                    'Field' => 'name',
                    'TableFilter' =>  array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'product_id'
                        )
                    )
                )
            ),
            'customer_name' => array(
                'Caption' => array('en' => 'Customer Name', 'vn' => 'Tên KH')
            ),
            'customer_email' => array(
                'Caption' => array('vn' => 'Email KH'),
            ),
            'customer_address' => array(
                'Caption' => array('vn' => 'Địa chỉ KH'),
            ),
            'customer_phone' => array(
                'Caption' => array('vn' => 'SĐT KH'),
            ),
            'count' => array(
                'Caption' => array('en' => 'Quantity', 'vn' => 'SL đặt')
            ),
            'done' => array(
                'DataType' => 'Boolean',
                'Caption' => array('vn' => 'Hoàn tất'),
            ),
            'mota' => array(
                'Caption' => array('vn' => 'Mô tả'),
            ),
        )); // TODO: Change the autogenerated stub
    }

    public function getProduct()
    {
        return $this->product_obj;
    }

    public function save($validate = true, $location='')
    {
        if(!$this->is_new_record())
        {
            if($this->done) {
                if ($this->xRec()->done) {
                    $this->pushValidateError('', 'Không thể sửa khi Done = true');
                    return false;
                }
            }
        }
        return parent::save($validate, $location);
    }
    protected function countOnValidate($field_name)
    {
        if($this->count<=0)
        {
            $this->pushValidateError($field_name, 'Quantity phải lớn hơn 0', 'error', 'count');
        }
    }
    protected function customer_emailOnValidate($field_name)
    {
        if($this->$field_name!='')
        {
            if (!filter_var($this->$field_name, FILTER_VALIDATE_EMAIL)) {
                $this->pushValidateError($field_name, 'Email không đúng định dạng', 'warning', $field_name);
            }
        }
    }

    protected function product_idOnValidate($field_name)
    {
        //check exit
        if($this->$field_name>0)
        {
            if(QdProduct::GET($this->$field_name)==null)
            {
                $this->pushValidateError($field_name, 'Product không tồn tại!');
                if(!$this->is_new_record())
                {
                    $this->$field_name = $this->xRec()->$field_name;
                }
            }
        }
    }

    protected function motaOnValidate($field_name)
    {
        if($this->$field_name=='')
        {
            $this->$field_name = $this->customer_name;
            $this->pushValidateError($field_name, 'Mota tự động bằng Customer Name', 'info');
        }
    }
    public function delete($location='')
    {
        if($this->done)
        {
            $this->pushValidateError('', 'Không thể xóa khi Done = true');
            return false;
        }
        return parent::delete($location);
    }

}