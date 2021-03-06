<?php

class QdProcat2ManuSel extends QdProcat2Manu
{
    static $table_name = 'mpd_procat2manu';

    public static function getInitObj()
    {
        $obj = new QdProcat2ManuSel();
        $obj->selection = true;
        return $obj;
    }

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            '_productcat_name' =>array(
                'Name' => '_productcat_name',
                'Caption' => array('en-US' => 'Product Cat Name', 'vi-VN' => 'Tên LSP'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdProductCat',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'productcat_id'
                        )
                    )
                )
            ),
            '_manufactor_name' =>array(
                'Name' => '_manufactor_name',
                'Caption' => array('en-US' => 'Manufactor Name', 'vi-VN' => 'Tên Hãng SX'),
                'DataType' => 'Text',
                'FieldClass' => 'FlowField',
                'FieldClass_FlowField' => array(
                    'Method' => 'Lookup',
                    'Table' => 'QdManufactor',
                    'Field' => 'name',
                    'TableFilter' => array(
                        0 => array(
                            'Field' => 'id',
                            'Type' => 'FIELD',
                            'Value' => 'manufactor_id'
                        )
                    )
                )
            )
        ));
    }
    protected function manufactor_idOnValidate($field_name)
    {
        $tmp = explode("|", $this->$field_name);
        if(count($tmp) > 1){
            foreach($tmp as $item){
                $obj = static::getInitObj();
                $obj->productcat_id = $this->productcat_id;
                $obj->manufactor_id = $item;
                $obj->save();
            }
        }
    }

    public function save($validate = true, $location = '')
    {
        $tmp = explode("|", $this->manufactor_id);
        if(count($tmp) > 1){
            $this->manufactor_idOnValidate('manufactor_id');
            return true;
        }else{
            return parent::save($validate, $location); // TODO: Change the autogenerated stub
        }
    }


}