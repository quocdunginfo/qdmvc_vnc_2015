<?php

class QdProductCatGD extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatGD();
        $obj->type = $tmp->type;
        $obj->active = $tmp->active;

        $obj->type2 = QdManufactorGD::$TYPE2_MANUFACTOR_GIAYDEP;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP => array(
                'Caption' => array('en' => 'Product Cat GD', 'vn' => 'Loại SP GD'),
            )
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatGD';

        return $obj;
    }
}