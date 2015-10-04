<?php

class QdSetupOther extends QdRootSetup
{
    static $table_name = 'mpd_setup_other';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'pbhanh_tpl' => array(
                'DataType' => 'WYSIWYG',
                'Description' => array(
                    'vi-VN' => 'Định nghĩa mẫu HTML cho bản in A5 của Phiếu Bảo Hành',
                ),
            ),
        ));
    }
}