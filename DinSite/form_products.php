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
<!-- SERVICE -->
<?php if (isset($_SESSION['id_users'])): ?>
    <div class="container service prod-order">
        <div class="row reg app-prod">
            <div class="row justify-content-center">
                <h2>
                    СОЗДАНИЕ ЗАЯВКИ НА ПРИОБРЕТЕНИЕ ПРОДУКТА
                </h2>
<!-- ВЫВОД КОРЗИНЫ -->
                <div class="shop">
                    <h4>Корзина</h4>




<!-- ----------------------------------------------------------------------------------------------------------------- -->

<?php
//tt($_SESSION);
// ----------- 1 ВОПРОС ------------

//$id = explode(", ", $selectAppProd['id_prod']);
//$qty = explode(", ", $selectAppProd['quantity']);

// В результате записи получаются следующие массивы
$id = array(10, 11, 12);
$qty = array(100, 200, 300);

// Необходимо объединить полученные массивы
foreach ($id as $key => $value)
    $tId[] = [
        'id' => $value
    ];
foreach ($qty as $k => $v)
    $tQty[] = [
        'qty' => $v
    ];
$i = 0;
foreach ($tId as $v2) {
    $shop[] = array_merge($v2, array($tQty[$i]['qty']));
    $i++;
}

// ----------- 2 ВОПРОС ------------
// Получить массив 'cart' из массива '$_SESSION' array_column

$shop = array_slice($_SESSION, 7);
    if (empty($_SESSION['cart'])) { ?>
    <p class="ms-4 pt-1">Корзина пуста</p>
    <?php } else { foreach ($shop as $index => $element) {
        foreach ($element as $key => $value):
    ?>
    <div class="row row-shop">
        <div class="col-8">
            <?=$value['name_prod']?>
        </div>
        <div class="col-2 text-right">
            <?=$value['qty']?> шт.
        </div>
        <div class="col-2 for-link">
            <button onclick="location.href = '<?php echo BASE_URL . 'form_products.php?del_cart_id=' . $value['id_prod']?>';" name="del_cart_id" type="submit" class="btn-outline-secondary button-shop-del">Удалить</button>
        </div>
    </div>
    <? endforeach; }} ?>
</div>

<!-- ----------------------------------------------------------------------------------------------------------------- -->







<!-- ДОБАВИТЬ ПРОДУКТ В КОРЗИНУ -->
                    <form class="shop" method="post" action="form_products.php">
                        <h4>Добавить продукт в корзину</h4>
                        <div class="row form-app-prod">
                            <div class="col-10">
                                <label for="formGroupExampleInput" class="form-label">Продукт</label>
                                <div class="w-100"></div>
                                <select name="id_prod" class="form-select" id="inputGroupSelect02">
                                    <?php foreach ($selectProducts as $key => $products):?>
                                    <option value="<?=$products['id_prod']?>"><?=$products['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <div class="input-group element-form">
                                    <label for="formGroupExampleInput" class="form-label">Количество</label>
                                    <div class="w-100"></div>
                                    <input name="quantity" class="form-control" type="text" aria-label="default input example">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-outline-secondary button-shop-new" name="button-shop-new">Добавить продукт</button>
                    </form>
<!-- ЗАПИСЬ В БД -->
                <?php
                $nameEnd = "";
                $qtyEnd = "";
                $i = 0;
                foreach ($shop as $ks => $vs) {
                    foreach ($vs as $ki => $elem) {
                        if ($i === 0) {
                            $nameEnd = $ki;
                            $qtyEnd = $elem['qty'];
                        } else {
                            $nameEnd = $nameEnd . ", " . $ki;
                            $qtyEnd = $qtyEnd . ", " . $elem['qty'];
                        }
                        $i++;
                    }
                }
                ?>
                <form class="shop" method="post" action="form_products.php">
                    <h4>Дополнительная информация</h4>
                    <div class="element-form">
                        <label for="exampleFormControlTextarea1" class="form-label">Сообщение для сотрудника</label>
                        <textarea name="info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-12 element-form">
                        <label for="formGroupExampleInput" class="form-label">Номер для связи</label>
                        <input name="num" value="<?php echo $_SESSION['number']; ?>" type="text" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12 element-form">
                        <label for="exampleInputEmail1" class="form-label">Почта для связи</label>
                        <input name="mail" value="<?php echo $_SESSION['email']; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="w-100"></div>
                    <input name="id_prod" value="<?=$nameEnd?>" type="hidden">
                    <input name="qty_prod" value="<?=$qtyEnd?>" type="hidden">
                    <div class="row mb-0">
                        <button type="submit" class="btn btn-outline-secondary col-md-6 mb-0" name="button-new-app">Отправить заявку</button>
                    </div>
                </form>
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
