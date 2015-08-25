<?php

class QdShop extends QdContact
{
    public static $TYPE_SHOP = 30;

    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_SHOP, 'operator' => static::$OP_EQUAL)
        ));
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type']['Options'] = array(
            static::$TYPE_SHOP => array(
                'Caption' => array('en-US' => 'Shop', 'vi-VN' => 'Cửa hàng'),
            ),
        );
        $obj['__sys_lines_url']['Caption'] = array('en-US' => 'Shop Products', 'vi-VN' => 'SP trong Shop');
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPro2Shop',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'shop_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );

        return $obj;
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdShop();
        $obj->transferFieldsFrom($tmp);
        $obj->type = static::$TYPE_SHOP;

        return $obj;
    }

    public function getPermalink()
    {
        $query = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));
        $query = add_query_arg(array('shop-id' => $this->id), $query);
        return $query;
        /*
        $query =  get_site_url();
        $query .= sprintf('/loaisp/%s/%s', $this->id, Qdmvc_Helper::sanitize_title_with_dashes($this->name));
        return $query;*/
    }
}