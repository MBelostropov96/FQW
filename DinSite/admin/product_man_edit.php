<?php
include "../path.php";
include "../app/controllers/products_code.php";
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
                <!-- RiGHT -->
                <?php
                $selectProdEdit = selectOne('products', ['id_prod' => $_GET['edit_prod_list_id']]);
                ?>
                <div class="col-9 right-message">
                    <div class="container shell-message">
                        <div class="row user-list">
                            <div class="col-12">
                                <h3>Редактирование продукта №<?=$selectProdEdit['id_prod']?></h3>
                            </div>
                        </div>
                        <form class="row prod-list" method="post" action="product_man_edit.php" enctype="multipart/form-data">
                            <div class="col-11">
                                <div class="row row-102-top">
                                    <div class="col-4 col-img-102">
                                        <div>
                                            <img src="<?='../assets/images/prod/' . $selectProdEdit['img']?>" class="img-prod img-fluid" alt="logo_bcl">
                                        </div>
                                        <div class="mb-3">
                                            <input name="img-prod" class="form-control form-control-sm form-control-prod-edit file-prod" id="formFileSm" type="file">
                                        </div>
                                    </div>
                                    <div class="col-8 col-description">
                                        <input name="name-prod" value="<?=$selectProdEdit['name']?>" type="text" class="form-control form-control-prod-edit mb-2" id="formGroupExampleInput">
                                        <textarea name="desc-prod" class="form-control form-control-prod-edit" id="exampleFormControlTextarea1" rows="6"><?=$selectProdEdit['description']?></textarea>
                                    </div>
                                </div>
                                <div class="row row-102-bot mb-3">
                                    <div class="col-6 quantity-102 pe-0">
                                        <p>Наличие на складе в количестве:</p>
                                    </div>
                                    <div class="col-2">
                                        <input name="qty-prod" value="<?=$selectProdEdit['quantity']?>" type="text" class="form-control form-control-prod-edit col-prod-edit" id="formGroupExampleInput">
                                        <input name="id-prod" value="<?=$selectProdEdit['id_prod']?>" type="hidden">
                                        <input name="img-prod-2" value="<?=$selectProdEdit['img']?>" type="hidden">
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-outline-secondary button-102"">Заказать</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <button name="btn-pr-ed" type="submit" class="btn btn-outline-secondary btn-pr"><i class="fa-solid fa-check"></i></button>
                                <a href="products_management.php?del_prod_list_id=<?=$selectProdEdit['id_prod'];?>"><i class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="mes-back">
                                <a href="<?php echo BASE_URL . 'admin/products_management.php'?>"><i class="fa-solid fa-arrow-left"></i></i>&nbsp;Назад</a>
                            </div>
                        </form>
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


