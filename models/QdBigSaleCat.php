<?php

class QdBigSaleCat extends QdProductCat
{
    public static function getInitObj()
    {
        $obj = new QdBigSaleCat();
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
            'TableFilter' => array(
                /*array(
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
        return $obj;
    }
}