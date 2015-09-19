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

    public function fn_makerequest($location, $params = array())
    {
        $tmp = new QdDgRequest();
        $tmp->SETRANGE('keyword', mb_strtolower($this->keyword));
        $tmp->SETRANGE('cat_id', $this->cat_id);
        $tmp->SETRANGE('status', QdDgRequest::$STATUS_CLOSE, 'NOT_EQUAL');
        $tmp = $tmp->FINDFIRST();
        if($tmp==null){
            $tmp = QdDgRequest::getInitObj();
            $tmp->keyword = $this->keyword;
            $tmp->cat_id = $this->cat_id;
            $tmp->suggest_price = $this->price;
            if($tmp->save()){
                if($tmp->fn_release($location))
                    $this->pushValidateError('', 'Tạo yêu cầu thành công, ID='.$tmp->id, 'info');
            }
        }else{
            $this->pushValidateError('', sprintf('Đã có sẵn yêu cầu (ID=%s) với keyword="%s" !', $tmp->id, $this->keyword), 'warning');
        }
    }
}