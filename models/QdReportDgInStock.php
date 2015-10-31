<?php

class QdReportDgInStock extends QdRootReport
{
    static $table_name = 'mpd_report_dg_instock';
    public static function getInitObj()
    {
        $obj = new QdReportDgInStock();
        return $obj;
    }

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'keyword' => array(
                'DataType' => 'Text',
                'Description' => array(
                    'vi-VN' => 'Chọn keyword để lọc các entry định giá. LIKE Search',
                ),
            ),
        ));
    }

    protected function getReportURL()
    {
        return 'https://www.google.com/?gws_rd=ssl#safe=off&q='.$this->keyword;
    }

}