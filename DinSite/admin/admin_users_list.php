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
                    <div class="container shell-message">
                        <div class="row user-list">
                            <div class="col-8">
                                <h3>Список пользователей</h3>
                            </div>
                            <form class="col-4 row user-list-box" action="admin_users_list.php" method="post">
                                <div class="col-3">
                                    <h4>Поиск</h4>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="search-user">
                                </div>
                            </form>
                        </div>
                        <div class="row row-theme">
                            <div class="col-1">
                                ID
                            </div>
                            <div class="col-4">
                                Имя пользователя
                            </div>
                            <div class="col-3">
                                Почта
                            </div>
                            <div class="col-2">
                                Дата рег.
                            </div>
                        </div>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-user'])) {
                            $checkUser = searchUser($_POST['search-user'], 'users');
                        }
                        foreach ($checkUser as $key => $list) :
                            $name = $list['last_name'] . " " . $list['first_name'];
                            if ($list['admin'] == 0):
                                ?>
                                <div class="row row-mes">
                                    <div class="col-1">
                                        <?= $list['id_users'] ?>
                                    </div>
                                    <div class="col-4">
                                        <?= mb_strimwidth($name,0,20, '...') ?>
                                    </div>
                                    <div class="col-3">
                                        <?= mb_strimwidth($list['email'],0,20, '...') ?>
                                    </div>
                                    <div class="col-2">
                                        <?= mb_strimwidth($list['created'],0,10) ?>
                                    </div>
                                    <div class="col-2 for-link">
                                        <button onclick="location.href = '<?php echo BASE_URL . 'admin/admin_users_check.php?id=' . $list['id_users']?>';" name="but-users-check" type="submit" class="btn btn-success but-check">Побробнее</button>
                                    </div>
                                </div>
                            <?php endif; endforeach; ?>
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
