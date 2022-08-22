<?php
include "path.php";
include "app/controllers/contacts_code.php";
?>

<html lang="en">
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
<div class="container con-106">
    <div class="w-75 head-div">
        <div class="contact-1">
            <h4 class="text-center text-black fw-bolder">Генеральный директор<br>
            Грузд Борис Дмитриевич<br><br>
            Приемная:<br>
            тел: +7 (8453) 36-00-77<br>
            факс: +7 (8453) 36-00-76<br>
            e-mail: balcl@mail.ru</h4>
        </div>
        <?php foreach ($selectContacts as $value): ?>
            <div class="w-75 contact-2 head-div col-11">
                <div class="mb-1">
                    <h4 class="text-center text-black fw-bolder mb-0"><?=$value['head']?></h4>
                </div>
                <?php if (!empty($value['fio'])): ?>
                    <div>
                        <h5 class="text-center text-black fw-bolder mb-0"><?=$value['fio']?></h5>
                    </div>
                <?php endif; ?>
                <?php if (!empty($value['email'])): ?>
                    <div>
                        <h5 class="text-center text-black fw-bolder mb-0">E-mail: <?=$value['email']?></h5>
                    </div>
                <?php endif; ?>
                <?php if (!empty($value['number'])): ?>
                    <div>
                        <h5 class="text-center text-black fw-bolder mb-0">Телефон: <?=$value['number']?></h5>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div class="contact-3">
            <div>
                <h4 class="text-center text-black fw-bolder pt-2">Реквизиты</h4>
            </div>
            <div>
                <h5 class="text-center text-black fw-bolder mb-0">
                Акционерное общество «Балаково-Центролит» (АО «БЦЛ»)<br>
                Юридический адрес: 413841 Саратовская область, г.Балаково,<br> Саратовское шоссе, д.10<br>
                ИНН/КПП 6439076046 / 643901001<br>
                ОГРН 1116439001480
                </h5>
            </div>
        </div>
    </div>
    <div class="head-div mb-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5719.359015604244!2d47.78612268999786!3d51.982271446107546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x416b88ca4a27a985%3A0xa21f7ee630495e49!2z0JHQsNC70LDQutC-0LLQvi3QptC10L3RgtGA0L7Qu9C40YI!5e0!3m2!1sru!2sru!4v1654713706775!5m2!1sru!2sru" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
