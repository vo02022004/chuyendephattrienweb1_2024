<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;
$errors = [];
if (!empty($_GET['id'])) {
    $_id = decrypt_id($_GET['id']);
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Kiểm tra tên người dùng
    if (empty($username)) {
        $errors['username'] = "Tên người dùng không được để trống!";
    } elseif (strlen($username) < 5 || strlen($username) > 15) {
        $errors['username'] = "Tên người dùng phải từ 5 đến 15 ký tự!";
    } elseif (!ctype_alnum($username)) {
        $errors['username'] = "Tên người dùng chỉ được chứa các ký tự chữ và số!";
    }
    // Kiểm tra mật khẩu
    if (empty($password)) {
        $errors['password'] = "Mật khẩu không được để trống!";
    } else {
        if (strlen($password) < 5 || strlen($password) > 10) {
            $errors['password'] = "Mật khẩu phải từ 5 đến 10 ký tự!";
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất 1 chữ cái thường (a-z)!";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất 1 chữ cái hoa (A-Z)!";
        }
        if (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất 1 chữ số (0-9)!";
        }
        if (!preg_match('/[-@!#$%]/', $password)) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt (-@!#$%)!";
        }
    }
    // Nếu không có lỗi, thực hiện cập nhật
    if (empty($errors)) {
        // Code cập nhật vào database...
        if (!empty($_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
        echo "Cập nhật thành công!";
    }
}
// if (!empty($_POST['submit'])) {

//     if (!empty($_id)) {
//         $userModel->updateUser($_POST);
//     } else {
//         $userModel->insertUser($_POST);
//     }
//     header('location: list_users.php');
// }
// function encrypt_id($id)
// {
//     $key = "secret_key";  // Khóa bảo mật
//     return base64_encode($id . $key);
// }

// Function để giải mã ID
function decrypt_id($encrypted_id)
{
    $key = "secret_key";
    $decoded = base64_decode($encrypted_id);
    return str_replace($key, '', $decoded);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name']))
                        echo $user[0]['name'] ?>'>
                    </div>
                <?php if (isset($errors['username'])): ?>
                    <span style="color: red;"><?php echo $errors['username']; ?></span>
                <?php endif; ?>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <?php if (isset($errors['password'])): ?>
                    <span style="color: red;"><?php echo $errors['password']; ?></span>
                <?php endif; ?>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>