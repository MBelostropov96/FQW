<?php
include "../path.php";
include "../app/controllers/service.php";
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
<?php include "../app/include/header_admin.php"; ?>
<!-- BODY_ADMIN -->
<?php if (isset($_SESSION['id_users'])): ?>
    <?php if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2): ?>
        <div class="container body-admin">
            <div class="row">
<!-- LEFT MENU -->
<?php include "../app/include/office_menu.php"; ?>
<!-- RIGHT -->
                <div class="col-9 col-body-admin col-body-admin-2 ">
                    <div class="container right-container">
                        <div class="form-message-refactor">
                        <form action="service_edit.php" method="post" class="p-3">
                            <div class="edit-service">
                                <div class="mb-4">
                                    <h3>
                                        Информация о заявке №<?=$id_serv?>
                                    </h3>
                                </div>
                                <div class="mb-3">
                                    <h5>
                                        <strong>Организация: </strong><?=$organization?><br>
                                        <strong>Представитель: </strong><?=$first_name . " " . $last_name?><br>
                                        <strong>Категория: </strong><?=$category?><br>
                                        <strong>Описание: </strong><?=$descrip?><br>
                                        <strong>Номер для связи: </strong><?=$number?><br>
                                        <strong>Почта для связи: </strong><?=$email?><br>
                                        <strong>Дата подачи: </strong><?=$created?><br>
                                    </h5>
                                </div>
                                <input name="id" value="<?=$id_serv?>" type="hidden">
                                <div class="row row-edit">
                                <?php if ($status == 0): ?>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-primary edit-y" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Одобрить
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-primary edit-n" data-bs-toggle="modal" data-bs-target="#exampleModal-2">
                                            Отклонить
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <div class="col-3">
                                        <button name="but-serv-edit-y" type="submit" class="btn btn-success edit-y" disabled>Одобрить</button>
                                    </div>
                                    <div class="col-3">
                                        <button name="but-serv-edit-n" type="submit" class="btn btn-success edit-n" disabled>Отклонить</button>
                                    </div>
                                <?php endif; ?>
<!-- MODAL -->
                                    <!-- ОДОБРЕНИЕ -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mdl-my">
                                            <div class="modal-content mdl-block">
                                                <div class="modal-header mdl-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Пользователь <strong><?=$email?></strong> получит сообщение об одобрении</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12 element-form">
                                                        <label for="formGroupExampleInput" class="form-label">Тема</label>
                                                        <input name="theme_modal" value="Принято решение по Вашей заявке №<?=$id_serv?> от <?=$created?>" type="text" class="form-control" id="formGroupExampleInput">
                                                    </div>
<?php
$text_1 = $first_name . ' ' . $last_name . ', заявка по категории "' . $category . '" была одобрена.
Для заключения договора нажмите на соответствующую кнопку и заполните форму договора

';?>
                                                    <div class="element-form">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Сообщение</label>
                                                        <textarea name="text_modal" class="form-control" id="exampleFormControlTextarea1" rows="4">
<?=$text_1?>
Appeal: С уважением, Екатерина Заводовна, сотрудник отдел сбыта АО "Балаково-Центролит".</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-3">
                                                        <button name="but-serv-edit-y" type="submit" class="btn btn-success edit-y">Подтвердить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<!-- ОТКАЗ -->
                                    <div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mdl-my">
                                            <div class="modal-content mdl-block">
                                                <div class="modal-header mdl-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Пользователь <strong><?=$email?></strong> получит сообщение об отказе</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12 element-form">
                                                        <label for="formGroupExampleInput" class="form-label">Тема</label>
                                                        <input name="theme_modal" value="Принято решение по Вашей заявке №<?=$id_serv?> от <?=$created?>" type="text" class="form-control" id="formGroupExampleInput">
                                                    </div>
<?php
$text_2 = $first_name . ' ' . $last_name . ', заявка по категории "' . $category . '" отклонена.
По следующим причинам: ...

';?>
                                                    <div class="element-form">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Сообщение</label>
                                                        <textarea name="text_modal_2" class="form-control" id="exampleFormControlTextarea1" rows="4">
<?=$text_2?>
Appeal: С уважением, Екатерина Заводовна, сотрудник отдел сбыта АО "Балаково-Центролит".</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-3">
                                                        <button name="but-serv-edit-n" type="submit" class="btn btn-success edit-n">Подтвердить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- Скрытые импуты -->
                                    <div>
                                        <input name="id_sen_y" value="<?=$_SESSION['id_users']?>" type="hidden">
                                        <input name="theme_y"  value="<?=$category?>" type="hidden">
                                        <input name="id_rec_y"  value="<?=$id_user?>" type="hidden">
                                        <input name="f_name_y" value="<?=$first_name?>" type="hidden">
                                        <input name="l_name_y" value="<?=$last_name?>" type="hidden">
                                        <input name="created_y" value="<?=$created?>" type="hidden">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mes-back">
                            <a href="<?php echo BASE_URL . 'admin/office.php'?>"><i class="fa-solid fa-arrow-left"></i></i>&nbsp;Назад</a>
                        </div>
                    </div>
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
<?php include "../app/include/footer.php"; ?>
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
