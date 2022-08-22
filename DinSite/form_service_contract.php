<?php
include "path.php";
include "app/controllers/service.php";
?>

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
    <title>Балаково-Центролит (Разработка)></title>
</head>
<body>
<!-- HEADER -->
<?php include ("app/include/header.php"); ?>
<!-- SERVICE -->
<?php if (isset($_SESSION['id_users'])): ?>

<?php
$post_service = $_POST['number_service'];
?>
<div class="container service service-contract">
    <div class="row contract">
        <form class="row contract-block" method="post" action="form_service_contract.php">
            <input name="number_service" value="<?=$post_service?>" type="hidden">
            <h2>
                ДАННЫЕ ДЛЯ ЗАКЛЮЧЕНИЯ ДОГОВОРА
            </h2>
            <p>
                Обратите внимание на правильность введенных данных. Информация пойдет в договор <br>
            </p>
            <!-- Организация -->
            <h5>Организация</h5>
            <div class="row block-form">
                <div class="col-5 element-form">
                    <label for="formGroupExampleInput" class="form-label">Наименование</label>
                    <input name="org_name" value="<?=htmlspecialchars($_SESSION['organization'])?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-3 element-form">
                    <label for="formGroupExampleInput" class="form-label">Страна</label>
                    <input name="org_country" value="<?=$org_country?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-4 element-form">
                    <label for="formGroupExampleInput" class="form-label">Город</label>
                    <input name="org_city" value="<?=$org_city?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-6 element-form">
                    <label for="formGroupExampleInput" class="form-label">Улица</label>
                    <input name="org_street" value="<?=$org_street?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-2 element-form">
                    <label for="formGroupExampleInput" class="form-label">Дом</label>
                    <input name="org_home" value="<?=$org_home?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-4 element-form">
                    <label for="formGroupExampleInput" class="form-label">Индекс</label>
                    <input name="org_index" value="<?=$org_index?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
            </div>
            <!-- ФИО -->
            <h5>Представитель</h5>
            <div class="row block-form">
                <div class="col-4 element-form">
                    <label for="formGroupExampleInput" class="form-label">Фамилия</label>
                    <input name="head_lname" value="<?=$_SESSION['last_name']?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-4 element-form">
                    <label for="formGroupExampleInput" class="form-label">Имя</label>
                    <input name="head_fname" value="<?=$_SESSION['first_name']?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-4 element-form">
                    <label for="formGroupExampleInput" class="form-label">Отчество</label>
                    <input name="head_pname" value="<?=$head_pname?>" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="w-100"></div>
                <div class="col-2 element-form">
                    <label for="formGroupExampleInput" class="form-label">Паспорт</label>
                    <input name="head_pass_1" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="tire">–</div>
                <div class="col-2 element-form">
                    <label for="formGroupExampleInput" class="form-label">&ensp;</label>
                    <input name="head_pass_2" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-8 element-form">
                    <label for="formGroupExampleInput" class="form-label">Кем и когда выдан</label>
                    <input name="head_pass_3" type="text" class="form-control" id="formGroupExampleInput">
                </div>
            </div>
            <!-- TEXT -->
            <h5>Реквизиты</h5>
            <div class="row block-form">
                <div class="col-6 element-form">
                    <label for="formGroupExampleInput" class="form-label">ИНН</label>
                    <input name="req_inn" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-6 element-form">
                    <label for="formGroupExampleInput" class="form-label">БИК</label>
                    <input name="req_bik" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-6 element-form">
                    <label for="formGroupExampleInput" class="form-label">Расчетный счет</label>
                    <input name="req_racc" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="col-6 element-form">
                    <label for="formGroupExampleInput" class="form-label">Корпоративный счет</label>
                    <input name="req_cacc" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="element-form">
                    <label for="exampleFormControlTextarea1" class="form-label">Дополнительная информация</label>
                    <textarea name="info" value="<?=$info?>" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-outline-secondary col-md-6" name="button-service-contract">Отправить данные</button>
            </div>
        </form>
    </div>
</div>
<?php else: ?>
    <div class="container errAdm">
        <h4>Вы должны быть зарегистрированы!</h4>
    </div>
<?php endif;?>
<!-- FOOTER -->
<?php include ("app/include/footer.php"); ?>
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
