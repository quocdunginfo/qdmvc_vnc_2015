<?php

class QdManufactorQA extends QdManufactor
{
	public function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
	{
		parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);

		$this->ADDFILTERDEFAULT(array(
			array('field' => 'type2', 'value' => static::$TYPE2_MANUFACTOR_QUANAO, 'exact' => true, 'operator' => '=')
		));

	}
	public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdManufactorQA();
        $obj->type= $tmp->type;
        $obj->type2 = static::$TYPE2_MANUFACTOR_QUANAO;
        $obj->active = $tmp->active;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig(); // TODO: Change the autogenerated stub
        //change parent_id filter
        $obj['parent_id']['TableRelation'] = array(
            'Table' => 'QdManufactorQA',
            'Field' => 'id',
            'TableFilter' => array(
                /*array(
                    'Condition' => array(
                        'Field' => '',
                        'Type' => 'CONST',//'FIELD'
                        'Value' => ''
                    ),
                    'Field' => 'type',
                    'Type' => 'FIELD',
                    'Value' => static::$TYPE_MANUFACTOR_QUANAO
                )*/
            )
        );
        $obj['type2']['Options'] = array(
            static::$TYPE2_MANUFACTOR_QUANAO => array(
                'Caption' => array('en-US' => 'Manufactor QA', 'vi-VN' => 'Hãng SX QA'),
            )
        );
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductQA';
        return $obj;
    }
}