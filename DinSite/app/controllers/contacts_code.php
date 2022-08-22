<?php
include SITE_ROOT . "/app/database/db.php";

$selectContacts = selectAll('contacts');

// Добавить контакт
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-contact'])) {

    $head = trim($_POST['head']);
    $fio = trim($_POST['fio']);
    $email = trim($_POST['email']);
    $num = trim($_POST['number']);

    if ($head === '') {
        $errMesMail = 'Пользователя с такой почтой не существует';
    } else {
        $contact_ent = [
            'head' => $head,
            'fio' => $fio,
            'email' => $email,
            'number' => $num
        ];
        $id = insert('contacts', $contact_ent);

        header('location: ' . BASE_URL . 'admin/admin_contacts_list.php');
    }
} else {
    $head = '';
    $fio = '';
    $email = '';
    $num = '';
}

// Удалить контакт
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_contact_id'])) {
    $id = $_GET['del_contact_id'];
    $key = "id_contact";
    deleteAll('contacts', $id, $key);
    header('location: ' . BASE_URL . 'admin/admin_contacts_list.php');
}