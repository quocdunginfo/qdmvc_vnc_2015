<?php

class QdSize extends QdRoot
{
    static $table_name = 'mpd_size';
    public static $TYPE_QUANAO = 'QUANAO';
    public static $TYPE_GIAYDEP = 'GIAYDEP';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'code' => array(),
            'name' => array(),
            'description' => array(
                'DataType' => 'WYSIWYG'
            ),
            'type' => array(
                'Caption' => array('en-US' => 'Type', 'vi-VN' => 'Phân loại'),
                'DataType' => 'Option',
                'Options' => array(
                    static::$TYPE_QUANAO => array(
                        'Caption' => array('en-US' => 'Quần áo', 'vi-VN' => 'Quần áo'),
                    ),
                    static::$TYPE_GIAYDEP => array(
                        'Caption' => array('en-US' => 'Giày dép', 'vi-VN' => 'Giày dép'),
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
                    'Field' => 'size_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );
        $obj['__sys_lines_url']['Caption'] = array(
            'vi-VN' => 'Sản phẩm',
            'en-US' => 'Products'
        );
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdSize();
        $obj->struct_lv_2 = QdProductCat::$LV2_MANUFACTOR_QUANAO;
        return $obj;
    }

    protected function codeOnValidate($field_name)
    {
        if ($this->$field_name != strtoupper($this->$field_name)) {
            $this->$field_name = strtoupper($this->$field_name);
            $this->pushValidateError($field_name, 'Code tự động in hoa', 'info');
        }
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

    public function getPermalink()
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));
        $query = add_query_arg(array('size-id' => $this->id), $query);
        return $query;
        /*
        $query =  get_site_url();
        $query .= sprintf('/loaisp/%s/%s', $this->id, Qdmvc_Helper::sanitize_title_with_dashes($this->name));
        return $query;*/
    }

}