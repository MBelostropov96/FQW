<?php
include "path.php";
include "app/controllers/message_code.php";
include "pdf.php";
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
<?php
    $post_contract = $_POST['number_contract'];
?>
<div class="container service service-contract">
    <div class="contract_check">
        <object data="<?=BASE_URL?>tcpdf/contracts_service/Dogovor_<?=$post_contract?>.pdf"
                type="application/pdf"
                width="100%" height="720">не удалось показать документ
        </object>
        <div class="accordion accordion_contract" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header ac-1" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Подписать договор
                    </button>
                </h2>
                <form method="post" action="pdf.php" enctype="multipart/form-data">
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body b-1">
                            <div class="row row-info-new">
                                <h4>Если Вы внимательно изучили договор и согласны со всеми пунктами, можете переходить на стадию заключения.
                                Для этого следуйте следующим пунткам:</h4>
                                <h5>1. Скачайте договор</h5>
                                <h6>Нажмите на стрелку в правом углу меню документа и выберете путь сохранения.</h6>
                                <h5>2. Поставьте электронную подпись</h5>
                                <h6>Используйте любое официальное приложение для добавления электронной подписи в документ формата PDF.<br>
                                Примечание: Редактировать пункты договора категорически запрещается.</h6>
                                <h5>3. Загрузите договор</h5>
                                <h6>Выбете договор и нажмите кнопку "отправить договор". С этого момента договор будет сохранен в базу и вступит в силу.</h6>
                                <input name="img" class="form-control input-img w-50" type="file" id="formFile">
                            </div>
                            <div class="w-100"></div>
                            <div>
                                <button name="button-sign-user" type="submit" class="btn btn-outline-secondary button-new-message mt-3">Отправить договор</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header ac-2" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Я не согласен
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body b-2">
                        <form method="post" action="user_contract_check.php" class="mb-1">
                            <h4>Если Вы не согласны с каким-либо пунктом или нашли ошибку, свяжитесь с нашими сотрудниками</h4>
                            <div class="pad-2">
                                <h5 class="contrh5">Можете воспользоваться почтой нашей системы. Это сократит время ответа сотрудника</h5>
                                <div class="mt-4">
                                    <input name="theme" value="<?=$post_contract?>" type="hidden">
                                    <input name="email_rec" value="ekat@mail.ru" type="hidden">
                                    <textarea name="text" class="form-control form-control-text" id="exampleFormControlTextarea1" rows="6" placeholder="Введите сообщение..."></textarea>
                                </div>
                                <div>
                                    <button name="button-n" type="submit" class="btn btn-outline-secondary button-new-message">Отправить сообщение</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="container errAdm">
        <h4>Вы должны быть зарегистрированы!</h4>
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
