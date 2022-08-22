<?php
include SITE_ROOT . "/app/database/db.php";

$selectNews = selectAll('news');

// Добавить новость
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-news'])) {
//tt($_FILES);
    if (!empty($_FILES['img-new']['name'])) {
        $imgName = $_FILES['img-new']['name'];
        $fileTmpName = $_FILES['img-new']['tmp_name'];
        $destination = ROOT_PATH . "\assets\images\\news\\" . $imgName;

        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            $errImgProd = "Ошибка загрузки изображения на сервер";
        }
    } else {
        $errImgProd = "Ошибка загрузки изображения";
    }

    $head = trim($_POST['head']);
    $text_new = trim($_POST['text-new']);
    $img = trim($_POST['img']);

    if ($head === '') {
        $errMesMail = 'Пользователя с такой почтой не существует';
    } else {
        $news_ent = [
            'heading' => $head,
            'text' => $text_new,
            'img' => $img
        ];
        $id = insert('news', $news_ent);

        header('location: ' . BASE_URL . 'admin/admin_news_list.php');

    }
} else {
    $head = '';
    $text = '';
}

// Удалить новость
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_news_id'])) {
    $id = $_GET['del_news_id'];
    $key = "id_new";
    deleteAll('news', $id, $key);
    header('location: ' . BASE_URL . 'admin/admin_news_list.php');
}
