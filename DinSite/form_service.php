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
<div class="container service">
    <div class="row reg">
        <form class="row justify-content-center" method="post" action="form_service.php">
            <h2>
                СОЗДАНИЕ ЗАЯВКИ НА ПОЛУЧЕНИЕ УСЛУГИ
            </h2>
            <p>
                Для создания заявки заполните поля. В скором времени наши сотрудники обработают заявку и свяжутся с Вами<br>
            </p>
            <div class="input-group element-form">
                <div>
                    <label for="formGroupExampleInput" class="form-label">Услуга</label>
                </div>
                <div class="w-100"></div>
                <select name="service" class="form-select" id="inputGroupSelect02">
                    <option selected value="Производство отливок (деталей) из черных и цветных металлов">Производство отливок (деталей) из черных и цветных металлов</option>
                    <option value="Дробеочистка отливок (деталей) на линии шагового типа">Дробеочистка отливок (деталей) на линии шагового типа</option>
                    <option value="Термическая обработка">Термическая обработка</option>
                    <option value="Механическая обработка">Механическая обработка</option>
                    <option value="Проведение неразрушающего контроля крупного вагонного литья, основного металла и сварных швов">Проведение неразрушающего контроля крупного вагонного литья, основного металла и сварных швов</option>
                    <option value="Лабораторные исследования">Лабораторные исследования</option>
                </select>
            </div>
<!-- TEXT -->
            <div class="element-form">
                <label for="exampleFormControlTextarea1" class="form-label">Описание услуги</label>
                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $text?></textarea>
            </div>
<!-- NUMBER -->
            <div class="col-12 element-form">
                <label for="formGroupExampleInput" class="form-label">Номер для связи</label>
                <input name="num" value="<?php echo $_SESSION['number']; ?>" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="w-100"></div>
<!-- EMAIL -->
            <div class="col-12 element-form">
                <label for="exampleInputEmail1" class="form-label">Почта для связи</label>
                <input name="mail" value="<?php echo $_SESSION['email']; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <div class="row">
                <button type="submit" class="btn btn-outline-secondary col-md-6" name="button-service">Отправить заявку</button>
            </div>
        </form>
    </div>
</div>
    <?php else: ?>
        <div class="container errAdm">
            <h4>Ошибка доступа!</h4>
            <h5>Для просмотра страницы Вы должны быть зарегистрированы!</h5>
            <h5><a href="#">Зарегистрироваться</a></h5>
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