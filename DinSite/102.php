<?php
    include "path.php";
    include "app/controllers/products_code.php";
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
<div class="container con-102">
    <div class="">
        <h2>Продукция</h2>
        <div>
            <?php foreach ($selectProducts as $key => $products): ?>
                <div class="row row-102-top">
                    <div class="col-4 col-img-102">
                        <img src="<?='assets/images/prod/' . $products['img']?>" class="img-102" alt="logo_bcl">
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
                        <button onclick="location.href = '<?=BASE_URL?>form_products.php?id_prod_order=<?=$products['id_prod']?>'" type="submit" class="btn btn-outline-secondary button-102" name="button-prod-102">Заказать</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
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