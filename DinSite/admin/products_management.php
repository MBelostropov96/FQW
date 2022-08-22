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
                <div class="col-9 right-message">
                    <div class="container shell-message">
                        <div class="row user-list">
                            <div class="col-7">
                                <h3>Редактирование раздела продукции</h3>
                            </div>
                            <div class="col-5 p-0">
                                <button onclick="location.href = '<?php echo BASE_URL . 'admin/products_new.php'?>'" type="submit" class="btn btn-outline-secondary button-new-message btn-prod" name="btn-prod-new">Добавить продукт</button>
                            </div>
                        </div>
                        <div class="row prod-list">
                            <?php foreach ($selectProducts as $key => $products): ?>
                            <div class="col-11">
                                <div class="row row-102-top">
                                    <div class="col-4 col-img-102">
                                        <img src="<?='../assets/images/prod/' . $products['img']?>" class="img-102" alt="logo_bcl">
                                    </div>
                                    <div class="col-8 col-description">
                                        <h4><?= mb_strimwidth($products['name'],0,55,"...")?></h4>
                                        <p><?= mb_strimwidth($products['description'],0,220,"...") ?></p>
                                    </div>
                                </div>
                                <div class="row row-102-bot mb-3">
                                    <div class="col-7 quantity-102">
                                        <p>Наличие на складе в количестве: <?= $products['quantity'] ?>  шт.</p>
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-secondary button-102">Заказать</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <a href="product_man_edit.php?edit_prod_list_id=<?=$products['id_prod'];?>"><i class="fa-solid fa-pencil"></i></a>

                                <button type="button" class="btn btn-outline-secondary btn-pr" data-bs-toggle="modal" data-bs-target="#exampleModalToggle<?=$products['id_prod'];?>"><i class="fa-solid fa-xmark mt-0"></i></button>

                                <div class="modal fade" id="exampleModalToggle<?=$products['id_prod'];?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content mdl-block">
                                            <div class="modal-body">
                                                <p class="text-center fs-5 mt-3">Вы действительно хотите удалить продукт?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-0 border-0" data-bs-dismiss="modal">Отмена</button>

                                                <button onclick="location.href = '<?=BASE_URL?>/admin/products_management.php?del_prod_list_id=<?=$products['id_prod'];?>'" style="background:#8b0000" class="btn btn-primary rounded-0 border-0" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Подтвердить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                <a href="products_management.php?del_prod_list_id=--><?//=$products['id_prod'];?><!--"><i class="fa-solid fa-xmark"></i></a>-->
                            </div>
                            <?php endforeach; ?>
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

