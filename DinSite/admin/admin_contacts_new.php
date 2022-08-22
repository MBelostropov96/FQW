<?php
include "../path.php";
include "../app/controllers/contacts_code.php";
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
    <?php if ($_SESSION['admin'] == 1): ?>
        <div class="container body-admin">
            <div class="row">
                <!-- LEFT MENU -->
                <?php include "../app/include/admin_menu.php"; ?>
                <!-- RiGHT -->
                <div class="col-9 right-message">
                    <form method="post" action="admin_contacts_new.php">
                        <div class="container shell-message">
                            <div class="mb-4">
                                <h3>Новый контакт</h3>
                            </div>
                            <div class="row row-info-new mb-2">
                                <p class="w-100">Должность (отдел)</p>
                                <input name="head" type="text" class="form-control form-control-prod-1" id="formGroupExampleInput">
                            </div>
                            <div class="row row-info-new mb-2">
                                <p class="w-100">ФИО должностного лица</p>
                                <input name="fio" type="text" class="form-control form-control-prod-1" id="formGroupExampleInput">
                            </div>
                            <div class="row row-info-new mb-2">
                                <p class="w-100">E-mail</p>
                                <input name="email" type="text" class="form-control form-control-prod-1" id="formGroupExampleInput">
                            </div>
                            <div class="row row-info-new mb-4">
                                <p class="w-100">Телефон</p>
                                <input name="number" type="text" class="form-control form-control-prod-1" id="formGroupExampleInput">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-secondary col-md-4 button-new-message" name="button-new-contact">Добавить</button>
                            </div>
                        </div>
                    </form>
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


