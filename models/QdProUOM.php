<?php

class QdProUOM extends QdRoot
{
    static $table_name = 'mpd_product_uom';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'product_id' => array(
                'TableRelation' => array(
                    'Table' => 'QdProduct',
                    'Field' => 'id',
                    'TableFilter' => array(
                    )
                ),
                'DataPort' => 'product_port'
            ),
            'uom_id' => array(
                'TableRelation' => array(
                    'Table' => 'QdUnitOfMeasure',
                    'Field' => 'id',
                    'TableFilter' => array(
                    )
                ),
                'DataPort' => 'unit_of_measure_port'
            ),
            'conversion_qty' => array(
                'DataType' => 'Integer'
            )
        ));
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdProUOM();
        return $obj;
    }
}