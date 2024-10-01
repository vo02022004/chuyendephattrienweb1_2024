<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();
function decrypt_id($encrypted_id)
{
    $key = "secret_key";
    $decoded = base64_decode($encrypted_id);
    return str_replace($key, '', $decoded);
}
$id = decrypt_id($_GET['id']);
echo $_SESSION['id'];
echo "<br>";
echo $id;
// Kiểm tra xem người dùng đã đăng nhập và có vai trò admin hay chưa
if (isset($_SESSION['id']) && $_SESSION['id'] == $id) {
    if (!empty($_GET['id'])) {

        $userModel->deleteUserById($id); // Xóa người dùng
        $_SESSION['message'] = 'Người dùng đã xóa thành công';
    } else {
        $_SESSION['message'] = 'Không có ID người dùng nào được cung cấp để xóa';
    }
} else {
    $_SESSION['message'] = 'Bạn không có quyền xóa người dùng.';
    echo "null";
}

// Chuyển hướng về danh sách người dùng
header('location: list_users.php');
exit();
?>