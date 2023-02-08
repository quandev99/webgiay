<?php
require '../../global.php';
require "../../Dao/user.php";

extract($_REQUEST);
$VIEW_NAME = "account/dangnhap-ui.php";
if (exist_param("btn_login")) {
    $user = user_select_by_id($ma_kh);

    if ($user && $user['mat_khau'] == $mat_khau && $user['ma_kh'] == $ma_kh) {

        if (exist_param('ghi_nho')) {
            add_cookie("ma_kh", $ma_kh, 30);
            add_cookie("mat_khau", $mat_khau, 30);
        } else {
            delete_cookie("ma_kh");
            delete_cookie("mat_khau");
        }
        $_SESSION["user"] = $user;

        $ten_vai_tro =  $user['vaitro'] == 0 ? "Nhân viên" : "Quản trị ";
        echo "<script>
                     alert('Đăng nhập tài khoản " . $ten_vai_tro . " thành công!'); 
                     location.href='http://localhost" . $ROOT_URL . "/';
                </script>";
    } elseif ($user) {
        if ($user['ma_kh'] !== $ma_kh) {
            if (!isset($user['ma_kh'])) {
                $MESSAGE = " Sai tên đăng nhập";
            }
        } else {
            $MESSAGE = "Sai mật khẩu";
        }
    } else {
        $MESSAGE = "Sai mật khẩu hoặc Sai tên đăng nhập";
    }
} else {

    if (exist_param("btn_logout")) {
        unset($_SESSION['user']);
        $_SESSION['name_page'] = 'trang_chu';
    }
    $ma_kh = get_cookie("ma_kh");
    $mat_khau = get_cookie("mat_khau");
}
require "../layout.php";