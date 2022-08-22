<?php
    include "path.php";
    include "app/controllers/news_code.php";
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
<?php include "app/include/header.php"; ?>
<!-- CAROULES -->
<div class="index-caroules">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/44.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary bg-opacity-75">ЛИДЕР НА РЫНКЕ ПРОИЗВОДСТВА КРУПНОГО ВАГОННОГО ЛИТЬЯ</h5>
                    <p>Производственная мощность - 18000 тонн литья в год<br>
                    Печь 12 тонн и 8 плавок в сутки<br>
                    Комплектующие для 500 вагонокомплектов в месяц</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary bg-opacity-75">РАЗВИТАЯ ИНФРАСТРУКТУРА</h5>
                    <p>Современное высокотехнологичное оборудование<br>
                    Производственная площадь - 53000м2<br>
                    292 млн. руб. - средний ежегодный объем инвестиций</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary bg-opacity-75">ГАРАНТИЯ КАЧЕСТВА</h5>
                    <p>Полное соответствие российским и международным стандартам:<br>
                        ISO 9001: 2015; <br>
                        ISO/TS 22163:2017, etc</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/55.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary bg-opacity-75">ВЫСОКОКВАЛИФИЦИРОВАННЫЙ ПЕРСОНАЛ</h5>
                    <p>Свыше 1000 сотрудников<br>
                        2019 - выход на полную мощность<br>
                        2021 - освоение производства детали "автосцепки"</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary bg-opacity-75">ВЫСОКОЕ КАЧЕСТВО ПРОДУКЦИИ ОБЕСПЕЧИВАЮТ ЛАБОРАТОРИИ</h5>
                    <p>Контроль материалов на содержание углерода, серы на LECO CS230<br>
                        Металлографическое исследование отливок и сварных соединений<br>
                        Контроль материалов на спектрометре</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- CAROULES END -->
<div class="container con-102">
    <div class="">
        <h2>Новости</h2>
        <div>
            <?php
            $pres_news = array_reverse($selectNews, true);
            foreach ($pres_news as $key => $products):
                ?>
                <div class="row row-101-top">
                    <div class="col-4 col-img-101 p-0">
                        <?php
                        echo ROOT_PATH;
                        ?>
                        <img src="<?=BASE_URL . 'assets/images/news/' . $products['img']?>" class="img-101 img-fluid" alt="logo_bcl">
                    </div>
                    <div class="col-8 col101-description">
                        <h4><?= mb_strimwidth($products['heading'],0,55,"...")?></h4>
                        <p><?= mb_strimwidth($products['text'],0,900,"...") ?></p>
                        <div class="index-news">
                            <h6 class="align-bottom">Дата публикации: <?= mb_strimwidth($products['created'],0,10) ?></h6>
                        </div>
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