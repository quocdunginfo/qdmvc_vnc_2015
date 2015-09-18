<?php

class QdDgInStock extends QdRoot
{
    static $table_name = 'mpd_dg_instock';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'keyword' => array(
                'ReadOnly' => true
            ),

            'suggest_price' => array(
                'DataType' => 'Decimal',
                'ReadOnly' => true
            ),
            'cat_id' => array(
                'DataType' => 'Option',
                'Options' => array(
                    QdDgRequest::$CAT_DOCU => array(
                        'Caption' => array('en-US' => 'Đồ cũ', 'vi-VN' => 'Đồ cũ'),
                    ),
                    QdDgRequest::$CAT_DOMOI => array(
                        'Caption' => array('en-US' => 'Đồ mới', 'vi-VN' => 'Đồ mới'),
                    ),
                ),
                'ReadOnly' => true
            ),
            'price' => array(
                'DataType' => 'Decimal',
                'ReadOnly' => true
            ),
            'req_id' => array(
                'DataType' => 'Code',
                'ReadOnly' => true
            ),
            'seq_no' => array(
                'DataType' => 'Integer',
                'ReadOnly' => true
            ),
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdDgInStock();
        return $obj;
    }
    public function makeHistory(){
        $tmp = new QdDgHistory();
        $tmp->transferFieldsFrom($this);
        $tmp->id = 0;
        $tmp->save();
    }

}