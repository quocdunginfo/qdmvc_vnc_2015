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
        return 'http://127.0.0.1:52242/viewer/frameset?__report=%2FUsers%2Fmac%2FDocuments%2Fworkspace%2Fqdmvc%2Fnew_report.rptdesign&__format=html&__svg=true&__locale=en_US&__timezone=VST&__masterpage=true&__rtl=false&__cubememsize=10&__resourceFolder=%2FUsers%2Fmac%2FDocuments%2Fworkspace%2Fqdmvc&1638172103&ID='.$this->keyword.'&token=jnshy637dhyue872hsb';
    }

}