<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 27/05/2015
 * Time: 10:20 PM
 */
class Qdmvc_Message
{
    private static $msg = array(
        'msg_update_ok' => 'Cập nhật thành công, ID = %s',
        'msg_delete_ok' => 'Xóa thành công, ID = %s',
        'msg_insert_ok' => 'Thêm mới thành công, ID = %s',
        'msg_confirm' => 'Bạn có chắc ?',
        'msg_logout' => 'Đăng xuất',
        'msg_confirm_deletion' => 'Xác nhận xóa',
        'msg_confirm_callfn' => 'Xác nhận thực thi cho',
        'msg_fk_constrain' => '%s mã %s đã được gán cho %s mã %s',
        'msg_field_mandatory' => 'ID: %s, %s bắt buộc phải có giá trị',

        /*Layout card*/
        'btn_viewreport' => 'Xem báo cáo',
        'btn_addtosel' => 'Đánh dấu chọn',
        'btn_save' => 'Lưu',
        'btn_delete' => 'Xóa',
        'btn_new' => 'Tạo mới',
        'btn_clone' => 'Sao chép',
        'btn_wpeditordone' => 'Hoàn tất',
        'btn_choose' => 'Chọn',
        'btn_gotopagenavigate' => 'Bật chế độ chỉnh sửa',
        'btn_log' => 'Nhật ký',
        'btn_note' => 'Ghi chú',
        'btn_image' => 'Hình ảnh',
        'btn_function' => 'Chức năng',
        'btn_reloadcard' => 'Tải lại',
        'btn_print' => 'In',
        'btn_exportexcel' => 'Xuất Excel',
        'btn_showall' => 'Xem tất cả',
        'btn_active' => 'Kích hoạt',
        'btn_deactive' => 'Ngưng kích hoạt',
        'btn_multiselection' => 'Bật chọn nhiều',
        'btn_multiselection_guide' => 'Dùng kết hợp các phím Ctrl, Shift, Lên, Xuống: để chọn nhiều dòng',
        'btn_singleselection' => 'Tắt chọn nhiều',
        'btn_selectallrows' => 'Chọn tất cả',
        /*END Layout card*/

        /*Layout List*/
        'btn_clearfilter' => 'Gỡ bộ lọc',
        'btn_scancode' => 'Quét mã QR',
        /*END Layout List*/

        /*Field Description*/
        'fd_seometa_field_title' => 'Tiêu đề Web hiển thị thực tế khi người dùng mở trang %s<br>Dùng chức năng SEO Meta để thay đổi',
        'fd_seometa_field_description' => 'Mô tả Web hiển thị thực tế khi người dùng mở trang %s<br>Dùng chức năng SEO Meta để thay đổi'
        /*END Field Description*/
    );
    private static $msg2 = array(
        'msg_update_ok' => 'Update OK, ID = %s',
        'msg_delete_ok' => 'Delete OK, ID = %s',
        'msg_insert_ok' => 'Insert OK, ID = %s',
        'msg_confirm' => 'Are you sure ?',
        'msg_logout' => 'Logout',
        'msg_confirm_deletion' => 'Confirm deletion',
        'msg_confirm_callfn' => 'Confirm execution for',
        'msg_fk_constrain' => '%s with ID %s was assigned to %s with ID %s',
        'msg_field_mandatory' => 'ID: %s, %s must have a value',

        /*Layout card*/
        'btn_viewreport' => 'View report',
        'btn_addtosel' => 'Mark selection',
        'btn_save' => 'Save',
        'btn_delete' => 'Delete',
        'btn_new' => 'New',
        'btn_clone' => 'Clone',
        'btn_wpeditordone' => 'Done',
        'btn_choose' => 'Choose',
        'btn_gotopagenavigate' => 'Open editor',
        'btn_log' => 'Logs',
        'btn_note' => 'Notes',
        'btn_image' => 'Images',
        'btn_function' => 'Functions',
        'btn_reloadcard' => 'Reload',
        'btn_print' => 'Print',
        'btn_exportexcel' => 'Export Excel',
        'btn_showall' => 'Show All',
        'btn_active' => 'Active',
        'btn_deactive' => 'Deactive',
        'btn_multiselection' => 'Turn on multi-select',
        'btn_multiselection_guide' => 'Use Ctrl, Shift, Up, Down keys in combination to implement multi rows selection',
        'btn_singleselection' => 'Turn off multi-select',
        'btn_selectallrows' => 'Select all',
        /*END Layout card*/

        /*Layout List*/
        'btn_clearfilter' => 'Clear filter',
        'btn_scancode' => 'Scan QR code'
        /*END Layout List*/
    );

    public static function getMsg($key)
    {
        if (Qdmvc_Config::getLanguage() == 'vi-VN') {
            return isset(static::$msg[$key]) ? static::$msg[$key] : '@' . $key;
        } else {
            return isset(static::$msg2[$key]) ? static::$msg2[$key] : '@' . $key;
        }
    }
}