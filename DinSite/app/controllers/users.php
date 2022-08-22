<?php
include SITE_ROOT . "/app/database/db.php";

$test = selectUserAndMessage('message', 'users');

// КОД РЕГИСТРАЦИИ
$errRegFName = '';
$errRegLName = '';
$errRegNum = '';
$errRegOrg = '';
$errRegMail = '';
$errRegPass1 = '';
$errRegPass2 = '';
$errRegCheck = '';
$checkUser = selectAll('users');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $admin = 0;
    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $num = trim($_POST['num']);
    $org = $_POST['org_1'] . " \"" . trim($_POST['org_2']) . "\"";
    $org2 = trim($_POST['org_2']);
    $mail = trim($_POST['mail']);
    $pass1 = trim($_POST['pass_1']);
    $pass2 = trim($_POST['pass_2']);

    if ($f_name === '') {
        $errRegFName = "Поле должно быть заполенено!";
    }
    elseif (mb_strlen($f_name, 'UTF-8') < 2) {
        $errRegFName = "Имя должно быть длиннее двух символов!";
    }
    if ($l_name === '') {
        $errRegLName = "Поле должно быть заполенено!";
    }
    elseif (mb_strlen($l_name, 'UTF-8') < 2) {
        $errRegLName = "Фамилия должна быть длиннее двух символов!";
    }
    if ($num === '') {
        $errRegNum = "Поле должно быть заполенено!";
    }
    if ($org === '') {
        $errRegOrg = "Поле должно быть заполенено!";
    }
    if ($mail === '') {
        $errRegMail = "Поле должно быть заполенено!";
    }
    if (mb_strlen($num, 'UTF-8') > 12) {
        $errRegNum = "Номер не может быть длиннее 12 символов!";
    }
    foreach ($checkUser as $key => $value)
        if ($value['number'] == $num) {
            $errRegNum = "Пользователь с таким номером уже зарегистрирован!";
        }
        elseif ($value['email'] === $mail) {
            $errRegMail = "Пользователь с такой почтой уже существует";
        }
    if ($pass1 === '') {
        $errRegPass1 = "Поле должно быть заполенено!";
    }
    elseif (mb_strlen($pass1, 'UTF-8') < 4) {
        $errRegPass1 = "Пароль не может быть короче 4 символов!";
    }
    elseif (!preg_match("/^([a-zA-Z\d_\-+$!?%#&])+$/i", $pass1)) {
        $errRegPass1 = "Только заглавные и строчные латинские буквы, цифры и символы: $ ! ? % # & + - _";
    }
    if (empty($errRegPass1) && $pass2 !== $pass1) {
        $errRegPass2 = "Пароли должны совпадать!";
    }
    if (!isset($_POST['check'])) {
        $errRegCheck = "Вы должны принять условия";
    }
 if (!empty($errRegLName || !empty($errRegFName) || !empty($errRegNum) || !empty($errRegOrg) || !empty($errRegMail) || !empty($errRegPass1) || !empty($errRegPass2) || !empty($errRegCheck))) {
     $err = "Ошибка регистрации";
 }
 else {
    $pass = password_hash($pass2, PASSWORD_DEFAULT);
    $post = [
        'admin' => $admin,
        'first_name' => $f_name,
        'last_name' => $l_name,
        'number' => $num,
        'organization' => $org,
        'email' => $mail,
        'password' => $pass
    ];
        $id = insert('users', $post);
        $user = selectOne('users', ['id_users' => $id]);

        $_SESSION['id_users'] = $user['id_users'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['number'] = $user['number'];
        $_SESSION['organization'] = $user['organization'];
        $_SESSION['email'] = $user['email'];

        if ($_SESSION['admin'] === 1) {
            header('location: ' . BASE_URL . 'admin/admin.php');
        }
        elseif ($_SESSION['admin'] === 2) {
            header('location: ' . BASE_URL . 'admin/office.php');
        } else {
        header('location: ' . BASE_URL);
        }
    }
} else {
    $f_name = '';
    $l_name = '';
    $num = '';
    $org2 = '';
    $mail = '';
}

// КОД АВТОРИЗАЦИИ

$errLogLog = '';
$errLogPass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $mail = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if ($mail === '') {
        $errLogLog = "Поле должно быть заполнено!";
    }
    if ($pass === '') {
        $errLogPass = "Поле должно быть заполнено!";
    }
    if (!empty($errLogLog) || !empty($errLogPass)) {
        $err = "Ошибка аутентификации!";
    }
    else {
        $existence = selectOne('users', ['email' => $mail]);
        if ($existence && password_verify($pass, $existence['password'])) {
            $errLogLog = '';
            $errLogPass = '';

            $_SESSION['id_users'] = $existence['id_users'];
            $_SESSION['first_name'] = $existence['first_name'];
            $_SESSION['last_name'] = $existence['last_name'];
            $_SESSION['admin'] = $existence['admin'];
            $_SESSION['number'] = $existence['number'];
            $_SESSION['organization'] = $existence['organization'];
            $_SESSION['email'] = $existence['email'];

            if ($_SESSION['admin'] == 1) {
                header('location: ' . BASE_URL . 'admin/admin.php');
            }
            elseif ($_SESSION['admin'] == 2) {
                header('location: ' . BASE_URL . 'admin/office.php');
            } else {
                header('location: ' . BASE_URL);
            }
        }
        elseif (!$existence) {
            $errLogLog = "Пользователя с такой почтой не существует!";
        }
        elseif (!password_verify($pass, $existence['password']))
        {
            $errLogPass = "Неверный пароль!";
        }
    }
} else {
    $mail = '';
}
// Назначит пользователя сотрудником
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_edit_id'])) {
    $id = $_GET['user_edit_id'];
    $status = [
        'admin' => 2
    ];
    updateUsers('users', $id, $status);
    header('location: ' . BASE_URL . 'admin/admin_users_list.php');
}
// Удалить сотрудников
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_del_id'])) {
    $id = $_GET['user_del_id'];
    deleteUser('users', $id);
    header('location: ' . BASE_URL . 'admin/admin_users_list.php');
}


