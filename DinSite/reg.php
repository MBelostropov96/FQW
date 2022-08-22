<?php
    include "path.php";
    include "app/controllers/users.php";
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
<!-- REGISTRATION -->
<div class="container registration">
    <div class="row reg">
        <form class="row justify-content-center" method="post" action="reg.php">
            <h2>
                РЕГИСТРАЦИЯ
            </h2>
            <p>
                Пожалуйста, вводите достоверные данные
            </p>
<!-- NAME -->
            <div class="col-12 element-form">
                <label for="formGroupExampleInput" class="form-label">Введите имя</label>
                <input name="f_name" value="<?=$f_name?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Имя">
                <div class="form-text">
                    <?=$errRegFName?>
                </div>
            </div>
            <div class="w-100"></div>
<!-- LASTNAME -->
            <div class="col-12 element-form">
                <label for="formGroupExampleInput" class="form-label">Введите фамилию</label>
                <input name="l_name" value="<?=$l_name?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Фамилия">
                <div class="form-text">
                    <?=$errRegLName?>
                </div>
            </div>
            <div class="w-100"></div>
<!-- NUMBER -->
            <div class="col-12 element-form">
                <label for="formGroupExampleInput" class="form-label">Введите номер телефона</label>
                <input name="num" type="number" class="form-control" id="formGroupExampleInput" value=<?=$num?>>
                <div class="form-text">
                    <?=$errRegNum?>
                </div>
            </div>
            <div class="w-100"></div>
<!-- ORGANIZATION -->
            <div>
                <label for="formGroupExampleInput" class="form-label">Организация</label>
            </div>
            <div class="input-group element-form">
                <select name="org_1" class="form-select" id="inputGroupSelect02">
                    <option selected value="ОАО">ОАО</option>
                    <option value="ООО">АО</option>
                    <option value="ООО">ООО</option>
                    <option value="ЗАО">ЗАО</option>
                    <option value="ИП">ИП</option>
                </select>
                <input name="org_2" value="<?=$org2?>" type="text" class="form-control organ" aria-label="Text input with dropdown button" placeholder="Наименование организации">
            </div>
            <div class="form-text">
                <?=$errRegOrg?>
            </div>
            <div class="w-100"></div>
<!-- EMAIL -->
            <div class="col-12 element-form">
                <label for="exampleInputEmail1" class="form-label">Введите почту</label>
                <input name="mail" value="<?=$mail?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                <div class="form-text">
                    <?=$errRegMail?>
                </div>
            </div>
            <div class="w-100"></div>
<!-- PASSWORD -->
            <div class="col-12 form-check element-form">
                <label for="inputPassword1" class="form-label">Задайте пароль</label>
                <input name="pass_1" type="password" id="inputPassword1" class="form-control" aria-describedby="passwordHelpBlock">
                <div class="form-text">
                    <?=$errRegPass1?>
                </div>
            </div>
            <div class="w-100"></div>
<!-- PASSWORD 2 -->
            <div class="col-12 form-check element-form">
                <label for="inputPassword2" class="form-label">Повторите пароль</label>
                <input name="pass_2" type="password" id="inputPassword2" class="form-control" aria-describedby="passwordHelpBlock">
                <div class="form-text">
                    <?=$errRegPass2?>
                </div>
                <div class="col-12 element-form">
                    <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1" value="No">
                    <label class="form-check-label" for="exampleCheck1">Я даю согласие на обработку моих персональных данных</label>
                    <div class="form-text">
                        <?=$errRegCheck?>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="row">
                <button type="submit" class="btn btn-outline-secondary col-md-6" name="button-reg">Создать личный кабинет</button>
                <div class="reg-log col-md-6">
                    <a href="<?php echo BASE_URL . 'log.php'?>">Я уже зарегистрирован</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- REGISTRATION END -->
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