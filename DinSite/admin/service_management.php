<?php
include "../path.php";
include "../app/controllers/service.php";
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
                                <h3>Редактирование раздела услуг</h3>
                            </div>
                            <div class="col-5 p-0">
                                <button onclick="location.href = '<?php echo BASE_URL . 'admin/service_new.php'?>'" type="submit" class="btn btn-outline-secondary button-new-message btn-prod" name="btn-serv-new">Добавить услугу</button>
                            </div>
                        </div>
                        <div class="serv-list">
                            <div>
                                <h5 class="h5 pt-0 mb-2">
                                    АО «БАЛАКОВО-ЦЕНТРОЛИТ» ИМЕЕТ ВОЗМОЖНОСТЬ ПРЕДОСТАВЛЯТЬ СЛЕДУЮЩИЕ УСЛУГИ:
                                </h5>
                            </div>
                            <div class="row row-serv-list">
                                <?php foreach ($servListAll as $key => $value): ?>
                                <div class="col-11">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h3 class="accordion-header h3" id="panelsStayOpen-heading<?=$value['id_service']?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?=$value['id_service']?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?=$value['id_service']?>">
                                                    <?=$value['name_serv']?>
                                                </button>
                                            </h3>
                                            <div id="panelsStayOpen-collapse<?=$value['id_service']?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?=$value['id_service']?>">
                                                <div class="accordion-body">
                                                    <?php
                                                    echo '<pre>';
                                                    print_r($value['desc_serv']);
                                                    echo '</pre>';
                                                    ?>
                                                    <div class="w-100"></div>
                                                    <button type="button" class="btn btn-outline-secondary btn-serv-list" name="button-service-1">Подать заявку на получение услуги</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <a href="service_management.php?del_serv_list_id=<?=$value['id_service'];?>"><i class="fa-solid fa-xmark"></i></a>
                                </div>
                                <?php endforeach; ?>
                            </div>
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


