
<?php

/**
 *
 * Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
 *
 * @access    public
 * @param    string
 * @return    string
 */

use Illuminate\Support\Facades\Auth;

if (!function_exists('currency_format')) {

    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, '.', '.') . "{$suffix}";
        }
    }
}
if(!function_exists('get_user')) {
    function get_user($type, $field = 'id') {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : "";
    }
}
?>
