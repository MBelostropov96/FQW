<?php
include_once SITE_ROOT . "/app/database/db.php";

$messageAndUsers = selectUserAndMessage('message', 'users');

// Создать сообщение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-message'])) {

    $id_sen = $_SESSION['id_users'];
    $email_rec = trim($_POST['email_rec']);
    $theme = trim($_POST['theme']);
    $text = trim($_POST['text']);
    $status = 0;

    $mesMailAll = selectAll('users');
    foreach ($mesMailAll as $key => $mes)

    if ($mes['email'] !== $email_rec) {
        $errMesMail = 'Пользователя с такой почтой не существует';
    } else {
        $id_rec = $mes['id_users'];

        $message_ent = [
            'id_user_sen' => $id_sen,
            'id_user_rec' => $id_rec,
            'theme' => $theme,
            'text' => $text,
            'status' => $status
        ];
        $id = insert('message', $message_ent);

        if ($_SESSION['admin'] == 1) {
            header('location: ' . BASE_URL . 'admin/admin_message.php');
        }
        elseif ($_SESSION['admin'] == 2) {
            header('location: ' . BASE_URL . 'admin/office_message.php');
        }
        else {
            header('location: ' . BASE_URL . 'message.php');
        }
    }
} else {
    $email_rec = '';
    $theme = '';
    $text = '';
}

// Прочесть сообщение
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $mes = selectOne('message', ['id_message' => $id]);
    $theme = $mes['theme'];
    $text = $mes['text'];
    $created = $mes['created'];
    $status = $mes['status'];

    $id_user_sen = $mes['id_user_sen'];
    $user_sen = selectOne('users', ['id_users' => $id_user_sen]);
    $first_name = $user_sen['first_name'];
    $last_name = $user_sen['last_name'];
    $organization = $user_sen['organization'];
    $email = $user_sen['email'];

    $st = [
        'status' => 1
    ];
    updateMessage('message',$id, $st);
}

// Удаление сообщения
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    deleteMessage('message', $id);
    header('location: ' . BASE_URL . 'admin/office_message.php');
}

// Ответить на сообщение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-mes-answer'])) {
    $theme = $_POST['answer_theme'];
    $email_rec = $_POST['answer_email'];
}
// ------------------------------------------------- КОНТРАКТ --------------------------------------------------
