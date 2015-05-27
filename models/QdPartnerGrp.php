<?php

class QdPartnerGrp extends QdWidgetNavCat
{
    public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        $this->SETFILTERDEFAULT(array(
            array('field' => 'type', 'value' => static::$TYPE_PARTNER, 'exact' => true, 'operator' => '=')
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdPartnerGrp();//init_obj trên page card sẽ không áp đúng __sys_note_url nếu chọn parent::
        $obj->type = static::$TYPE_PARTNER;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        //change parent_id filter
        $obj['parent_id']['TableRelation']['Table'] = 'QdPartnerGrp';

        $obj['type']['Options']= array(
            static::$TYPE_PARTNER => array(
                'Caption' => array('en-US' => 'Partner Grp', 'vi-VN' => 'Partner Grp'),
            ),
        );


        $obj['__sys_lines_url']['TableRelation'] = array(
            'Table' => 'QdPartner',
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