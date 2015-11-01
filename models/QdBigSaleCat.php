<?php

class QdBigSaleCat extends QdProductCat
{
    public static $TYPE_BIGSALE = 100;

    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_BIGSALE, 'operator' => static::$OP_EQUAL)
        ));
    }

    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdBigSaleCat();
        $obj->transferFieldsFrom($tmp);
        $obj->type = static::$TYPE_BIGSALE;

        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig(); // TODO: Change the autogenerated stub
        //change parent_id filter
        $obj['parent_id']['TableRelation'] = array(
            'Table' => 'QdBigSaleCat',
            'Field' => 'id',
            'TableFilter' => array(/*array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'type',
                    'Type' => 'FIELD',
                    'Value' => static::$TYPE_BIGSALE
                )*/
            )
        );
        $obj['type']['Options'] = array(
            static::$TYPE_BIGSALE => array(
                'Caption' => array('en-US' => 'Big Sale', 'vi-VN' => 'Bán chạy'),
            ),
        );
        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdProBigSale',
            'Field' => 'id',
            'TableFilter' => array(
                array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'group_id',
                    'Type' => 'FIELD',
                    'Value' => 'id'
                )
            )
        );
        return $obj;
    }
}