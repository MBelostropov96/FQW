<?php
include "path.php";
include "app/controllers/message_code.php";
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
<div class="container body-message">
    <div class="row row-message">
        <!-- LEFT -->
        <?php include ("app/include/message_menu.php"); ?>
        <!-- RIGHT -->
        <div class="col-9 right-message">
            <div class="container shell-message">
                <div class="mes-check">
                    <div class="mb-4">
                        <h3>
                            <?php echo $theme;
                            $short = explode("2022", $theme);
                            $int = intval(preg_replace('/[^0-9]+/', '', $short['0']), 10);
                            $post_service = substr($int,0,4);
                            $post_contract = substr($int,0,4);
                            ?>
                        </h3>
                    </div>
                    <?php
                    $str = $text;
                    $find = "заказ продук";
// Заказ продукта
                    if (strpos($str, $find)):
                        $mystringp = $theme;
                        $findmep = "договор";
                        $pos = strpos($mystringp, $findmep);
                    if ($pos === false): ?>
                        <form action="form_product_contract.php" method="post">
                            <div class="mb-3">
                                <p>
                                    <strong>От кого: </strong><?=$first_name . " " . $last_name?><br>
                                    <strong>Дата: </strong><?=$created?><br>
                                    <strong>Сообщение: </strong><br>
                                <div class="mes-text"><?=$text?><br></div>
                                </p>
                            </div>
                            <input name="number_service" value="<?=$post_service?>" type="hidden">
                        </form>
                    <?php else: ?>
                        <form action="user_contract_check_prod.php" method="post">
                            <div class="mb-3">
                                <p>
                                    <strong>От кого: </strong><?=$first_name . " " . $last_name?><br>
                                    <strong>Дата: </strong><?=$created?><br>
                                    <strong>Сообщение: </strong><br>
                                <div class="mes-text"><?=$text?><br></div>
                                </p>
                            </div>
                            <input name="number_contract" value="<?=$post_contract?>" type="hidden">
                        </form>
                    <?php endif;
// Заказ услуги
                    else:
                    $mystring = $theme;
                    $findme = "договор";
                    $pos = strpos($mystring, $findme);
                    if ($pos === false): ?>
                        <form action="form_service_contract.php" method="post">
                            <div class="mb-3">
                                <p>
                                    <strong>От кого: </strong><?=$first_name . " " . $last_name?><br>
                                    <strong>Дата: </strong><?=$created?><br>
                                    <strong>Сообщение: </strong><br>
                                <div class="mes-text"><?=$text?><br></div>
                                </p>
                            </div>
                            <input name="number_service" value="<?=$post_service?>" type="hidden">
                        </form>
                    <?php else: ?>
                        <form action="user_contract_check.php" method="post">
                            <div class="mb-3">
                                <p>
                                    <strong>От кого: </strong><?=$first_name . " " . $last_name?><br>
                                    <strong>Дата: </strong><?=$created?><br>
                                    <strong>Сообщение: </strong><br>
                                <div class="mes-text"><?=$text?><br></div>
                                </p>
                            </div>
                            <input name="number_contract" value="<?=$post_contract?>" type="hidden">
                        </form>
                    <?php endif; endif;?>
                    <form action="message_new.php" method="post">
                    <div class="row row-edit">
                        <div>
                            <button name="but-mes-answer" type="submit" class="btn btn-success but-mes-answer">Ответить</button>
                        </div>
                        <div>
                            <input name="id" value="<?=$id_serv?>" type="hidden">
                            <input name="answer_theme"  value="<?=$theme?>" type="hidden">
                            <input name="answer_email"  value="<?=$email?>" type="hidden">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="mes-back">
                    <a href="<?php echo BASE_URL . 'message.php'?>"><i class="fa-solid fa-arrow-left"></i></i>&nbsp;Назад</a>
                </div>
            </div>
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

