<?php

class QdContact extends QdRoot
{
    static $table_name = 'mpd_contact';
    public static $TYPE_VNC = 0;

    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_VNC, 'operator' => static::$OP_EQUAL)
        ));
    }

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'name' => array(),
            'description' => array(
                'DataType' => 'WYSIWYG'
            ),
            'email' => array(),
            'phone' => array(),
            'website' => array(),
            'address' => array(),
            'active' => array(
                'DataType' => 'Boolean'
            ),
            'order' => array(),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_VNC => array(
                        'Caption' => array('en-US' => 'VNC', 'vi-VN' => 'VNC'),
                    ),
                )
            ),
            'address_province_id' => array(
                'Name' => 'address_province_id',
                'Caption' => array('en-US' => 'Province ID', 'vi-VN' => 'Mã Tỉnh/TP'),
                'DataType' => 'Code',
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdVnProvince',
                    'Field' => 'id',
                    'TableFilter' => array()
                )
            ),
            'address_district_id' => array(
                'Name' => 'address_district_id',
                'Caption' => array('en-US' => 'District ID', 'vi-VN' => 'Mã Quận/Huyện'),
                'DataType' => 'Code',
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdVnDistrict',
                    'Field' => 'id',
                    'TableFilter' => array()
                )
            ),
            'address_ward_id' => array(
                'Name' => 'address_ward_id',
                'Caption' => array('en-US' => 'Ward ID', 'vi-VN' => 'Mã Phường/Xã'),
                'DataType' => 'Code',
                'Description' => '',
                'Editable' => true,
                'InitValue' => '0',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdVnWard',
                    'Field' => 'id',
                    'TableFilter' => array()
                )
            ),
            '_permalink' => array(
                'Name' => '_permalink',
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdSubscriber();
        $obj->type = static::$TYPE_VNC;
        $obj->active = true;
        return $obj;
    }

    protected function address_district_idOnValidate($field_name)
    {
        if ($this->address_province_id == '') {
            $tmp = QdVnDistrict::GET($this->$field_name);
            if ($tmp != null) {
                $this->address_province_id = $tmp->provinceid;
            }
        }
    }

    protected function address_ward_idOnValidate($field_name)
    {
        if ($this->address_district_id == '') {
            $tmp = QdVnWard::GET($this->$field_name);
            if ($tmp != null) {
                $this->address_district_id = $tmp->districtid;
                $this->address_district_idOnValidate('address_district_id');
            }
        }
    }

    public function getPermalink()
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/contact.php'));
        return $query;
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