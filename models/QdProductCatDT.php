<?php

class QdProductCatDT extends QdProductCatPG2DCN
{
    public static function getInitObj()
    {
        $tmp = parent::getInitObj();

        $obj = new QdProductCatDT();
        $obj->transferFieldsFrom($tmp);

        $obj->struct_lv_2 = static::$LV2_MANUFACTOR_DIENTHOAI;
        $obj->parent_id = static::$LV2_MANUFACTOR_DIENTHOAI;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['struct_lv_2']['Options'] = array(
            static::$LV2_MANUFACTOR_DIENTHOAI => $obj['struct_lv_2']['Options'][static::$LV2_MANUFACTOR_DIENTHOAI]
        );
        $obj['struct_lv_2']['ReadOnly'] = true;


        $obj['parent_id']['TableRelation']['Table'] = 'QdProductCat';

        $obj['__sys_lines_url']['TableRelation']['Table'] = 'QdProductDT';

        return $obj;
    }

    protected function idOnValidate($field_name)
    {
        parent::OnValidate($field_name);
        $this->struct_lv_3 = $this->$field_name;
    }

}