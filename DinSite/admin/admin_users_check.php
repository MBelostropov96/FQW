<?php
include "../path.php";
include "../app/controllers/users.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d60f6d9b1b.js" crossorigin="anonymous"></script>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../assets/css/style_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
    <title>Балаково-Центролит (Разработка)></title>
</head>
<body>
<!-- HEADER -->
<?php include "../app/include/header_admin.php";
$selectOneUser = selectOne('users', ['id_users' => $_GET['id']]);
$name = $selectOneUser['last_name'] . " " . $selectOneUser['first_name'];
if ($selectOneUser['admin'] == 0) {
    $stat = "Пользователь";
}
elseif ($selectOneUser['admin'] == 1) {
    $stat = "Администратор";
}
else {
    $stat = "Сотрудник";
}
?>
<!-- BODY_ADMIN -->
<?php if (isset($_SESSION['id_users'])): ?>
    <?php if ($_SESSION['admin'] == 1): ?>
        <div class="container body-admin">
            <div class="row">
                <!-- LEFT MENU -->
                <?php include "../app/include/admin_menu.php"; ?>
                <!-- RiGHT -->
                <div class="col-9 right-message">
                    <div class="container shell-message">
                        <div class="mes-check">
                            <div class="mb-4">
                                <h3>
                                    Пользователь: <?=$name?>
                                </h3>
                            </div>
                            <div class="mb-3">
                                <p>
                                    <strong>Электронна почта: </strong><?=$selectOneUser['email']?><br>
                                    <strong>Организация: </strong><?=$selectOneUser['organization']?><br>
                                    <strong>Дата регистрации: </strong><?=$selectOneUser['created']?><br>
                                    <strong>Статус: </strong><?=$stat?><br></strong><br>
                                </p>
                            </div>
                            <div class="row row-edit">
                                <form class="col-3 form-edit-user" method="post" action="admin_message_new.php">
                                    <input name="answer_theme"  value="" type="hidden">
                                    <input name="answer_email"  value="<?=$selectOneUser['email']?>" type="hidden">
                                    <button name="but-mes-answer" type="submit" class="btn btn-success but-edit-user-2">Написать сообщение</button>
                                </form>
                                <?php if ($selectOneUser['admin'] == 2): ?>
                                <div class="col-6">
                                    <button type="button" class="btn btn-success edit-n w-50" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Уволить</button>
                                </div>
                                <?php else: ?>
                                <div class="col-6">
                                    <button type="button" class="btn btn-success but-edit-user" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Назначить сотрудником</button>
                                </div>
                                <?php endif; ?>
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content mdl-block">
                                            <div class="modal-body">
                                                <p class="text-center fs-5 mt-2">Вы действительно хотите назначить пользователя <strong><?=$selectOneUser['email']?></strong> сотрудником?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-0 border-0" data-bs-dismiss="modal">Отмена</button>

                                                <button onclick="location.href = '<?=BASE_URL?>admin/admin_users_check.php?user_edit_id=<?=$_GET['id']?>'" type="submit" style="background:#198754" class="btn btn-primary rounded-0 border-0">Подтвердить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a href="admin_users_check.php?user_del_id=<?=$_GET['id']?>">Удалить пользователя</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mes-back">
                        <a href="<?php echo BASE_URL . 'admin/admin_users_list.php'?>"><i class="fa-solid fa-arrow-left"></i></i>&nbsp;Назад</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container errAdm">
            <h4>Ошибка доступа!</h4>
        </div>
    <?php endif; endif; ?>
<!-- FOOTER -->
<?php include ("../app/include/footer.php"); ?>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>

