<?php

class QdTRootSetup extends QdRootSetup
{
    static $table_name = 'mpd_setup_theme_root';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'topleft_tuvan' => array(
                'DataType' => 'WYSIWYG',
            ),
            'topcenter_promotion' => array(
                'DataType' => 'WYSIWYG',
            ),
            'topright_navs' => array(
                'DataType' => 'WYSIWYG',
            ),
            'bottomleft_footer_note' => array(
                'DataType' => 'WYSIWYG',
            ),
        ));
    }

}