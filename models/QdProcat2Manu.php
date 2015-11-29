<?php

class QdProcat2Manu extends QdRoot
{
    static $table_name = 'mpd_procat2manu';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'productcat_id' => array(
                'Name' => 'productcat_id',
                'Caption' => array('en-US' => 'Product Cat ID', 'vi-VN' => 'Mã LSP'),
                'DataType' => 'Code',
                'Editable' => true,
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdProductCat',
                    'Field' => 'id',
                    'TableFilter' => array(
                        array(
                            'Condition' => array(
                                'Field' => '',
                                'Type' => 'CONST',//'FIELD'
                                'Value' => ''
                            ),
                            'Field' => 'level',
                            'Type' => 'CONST',
                            'Value' => 2
                        ),
                    )
                ),
            ),
            'manufactor_id' => array(
                'Name' => 'manufacturer_id',
                'Caption' => array('en-US' => 'Manufactor ID', 'vi-VN' => 'Mã Hãng SX'),
                'DataType' => 'Code',
                'Editable' => true,
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdManufactor',
                    'Field' => 'id',
                    'TableFilter' => array(

                    )
                )
            ),
            'order' => array(
                'DataType' => 'Integer'
            ),
            'struct_level' => array(
                'DataType' => 'Integer'
            ),
            'struct_lv_1' => array(
            ),
            'struct_lv_2' => array(
            ),
            'struct_lv_3' => array(
            ),
            'struct_lv_4' => array(
            ),
            'selection' => array(
                'DataType' => 'Boolean'
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdProcat2Manu();
        $obj->selection = false;
        return $obj;
    }

    protected function productcat_idOnValidate($field_name)
    {
        $pc = QdProductCat::GET($this->$field_name);
        if($pc != null){
            $this->struct_lv_1 = $pc->struct_lv_1;
            $this->struct_lv_2 = $pc->struct_lv_2;
            $this->struct_lv_3 = $pc->struct_lv_3;
            $this->struct_lv_4 = $pc->struct_lv_4;
        }
    }
}