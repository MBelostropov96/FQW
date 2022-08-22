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
                <div class="col-9 col-body-admin col-body-admin-2 ">
                    <div class="container right-container">
                        <div class="row user-list">
                            <div class="col-8">
                                <h3 class="mt-1">Cписок договоров на заказ продукции</h3>
                            </div>
                            <form class="col-4 row user-list-box" action="office_product_contract.php" method="post">
                                <div class="col-3">
                                    <h4>Поиск</h4>
                                </div>
                                <div class="col-9 pe-0">
                                    <input type="text" name="search-prod-con">
                                </div>
                            </form>
                        </div>
                        <div class="row row-right-1">
                            <div class="col-1">
                                Номер
                            </div>
                            <div class="col-1">
                                Заявка
                            </div>
                            <div class="col-2">
                                Организация
                            </div>
                            <div class="col-4">
                                Представитель
                            </div>
                            <div class="col-2 col-created">
                                Дата подачи
                            </div>
                            <div class="col-2">
                                Информация
                            </div>
                        </div>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-prod-con'])) {
                            $selectContractProduct = searchProdCon($_POST['search-prod-con'], 'product_contract');
                        }
                        $preserved_prod_cont = array_reverse($selectContractProduct, true);
                        foreach ($preserved_prod_cont as $key => $item):
                            ?>
                            <div class="row row-right-2">
                                <div class="col-1  col-id">
                                    № <?=$item['id_contract'] ?>
                                </div>
                                <div class="col-1  col-id">
                                    № <?=$item['id_app_prod']; ?>
                                </div>
                                <div class="col-2">
                                    <?= mb_strimwidth($item['org_name'],0,25,"...") ?>
                                </div>
                                <div class="col-4">
                                    <?php
                                    $namePred = $item['head_lname'] . " " . $item['head_fname'] . " " . $item['head_pname'];
                                    echo mb_strimwidth($namePred, 0, 34, "...")
                                    ?>
                                </div>
                                <div class="col-2 col-created">
                                    <?= mb_strimwidth($item['created_contract'],2,8) ?>
                                </div>
                                <div class="col-2 z-index_for_fa">
                                    <?php if ($item['status_contract'] == 0): ?>
                                        <i class="fa-regular fa-circle-question"></i>
                                    <?php elseif ($item['status_contract'] == 1):?>
                                        <i class="fa-regular fa-circle-xmark"></i>
                                    <?php elseif ($item['status_contract'] == 2):?>
                                        <i class="fa-regular fa-circle-question text-warning"></i>
                                    <?php elseif ($item['status_contract'] == 3):?>
                                        <i class="fa-regular fa-circle-check text-warning"></i>
                                    <?php else: ?>
                                        <i class="fa-regular fa-circle-check"></i>
                                    <?php endif; ?>
                                    <a href="contract_product_edit.php?cont_prod_id=<?=$item['id_contract'];?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="contract_product_edit.php?cont_prod_del_id=<?=$item['id_contract'];?>"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                                <?php if ($item['status_contract'] == 4): ?>
                                    <div class="row row-uncheck">
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
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
