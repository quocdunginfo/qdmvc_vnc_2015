<?php

class QdProductCatQA extends QdProductCat
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatQA();
        $obj->transferFieldsFrom($tmp);

        $obj->type2 = QdManufactorQA::$TYPE2_MANUFACTOR_THOITRANG;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['type2']['Options'] = array(
            QdManufactor::$TYPE2_MANUFACTOR_THOITRANG => array(
                'Caption' => array('en-US' => 'Product Cat QA', 'vi-VN' => 'Loại SP QA'),
            )
        );
        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCatQA';
        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductQA';

        return $obj;
    }
}