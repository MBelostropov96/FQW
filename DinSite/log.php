<?php
    include "path.php";
    include "app/controllers/users.php";
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
    <title>Балаково-Центролит (Разработка)></title>
</head>
<body>
<!-- HEADER -->
<?php include ("app/include/header.php"); ?>
<!-- LOGIN -->
<div class="container registration">
    <div class="row reg">
        <form class="row justify-content-center-2" method="post" action="log.php">
            <h2>
                ВХОД
            </h2>
            <p>
                Для входа используйте почту, указанную при регистрации
            </p>
            <!-- EMAIL -->
            <div class="col-12 element-form">
                <label for="exampleInputEmail1" class="form-label">Введите логин</label>
                <input name="mail" value="<?=$mail?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                <div class="form-text">
                    <?=$errLogLog?>
                </div>
            </div>
            <div class="w-100"></div>
            <!-- PASSWORD -->
            <div class="col-12 form-check element-form">
                <label for="inputPassword1" class="form-label">Введите пароль</label>
                <input name="password" type="password" id="inputPassword1" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password">
                <div class="form-text">
                    <?=$errLogPass?>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="row">
                <button name="button-log" type="submit" class="btn btn-outline-secondary col-md-6">Войти</button>
                <div class="reg-log col-md-6">
                    <a href="<?php echo BASE_URL . 'reg.php'?>">Зарегистрироваться</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- LOGIN END -->
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