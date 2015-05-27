<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 27/05/2015
 * Time: 10:20 PM
 */
class Qdmvc_Message {
    private static $msg = array(
        'msg_update_ok' => 'Cập nhật thành công, ID = %s',
        'msg_delete_ok' => 'Xóa thành công, ID = %s',
        'msg_insert_ok' => 'Thêm mới thành công, ID = %s'
    );
    private static $msg2 = array(
        'msg_update_ok' => 'Update OK, ID = %s',
        'msg_delete_ok' => 'Delete OK, ID = %s',
        'msg_insert_ok' => 'Insert OK, ID = %s'
    );
    public static function getMsg($key)
    {
        if(Qdmvc_Config::getLanguage()=='vi-VN')
        {
            return static::$msg[$key];
        }
        else
        {
            return static::$msg2[$key];
        }
    }
}