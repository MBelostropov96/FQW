<?php
include_once SITE_ROOT . "/app/database/db.php";

// Вывод списка продукции
$selectProducts = selectAll('products');
$selectContractProduct = selectAll('product_contract');
$selectAppProdForList = selectProductAndApp('app_product', 'users', 'products');
$name = '';
$description = '';
$img = '';
$quanity = '';

// Добавить новый продукт
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-prod'])) {

    if (!empty($_FILES['img']['name'])) {
        $imgName = $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $destination = ROOT_PATH . "\assets\images\prod\\" . $imgName;

        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            $errImgProd = "Ошибка загрузки изображения на сервер";
        }
    } else {
        $errImgProd = "Ошибка загрузки изображения";
    }

    $name = trim($_POST['name_prod']);
    $description = trim($_POST['description_prod']);
    $img = trim($_POST['img']);
    $quanity = trim($_POST['quanity']);

    if ($name === '') {
            $errMesMail = 'Пользователя с такой почтой не существует';
        } else {
            $product_ent = [
                'name' => $name,
                'description' => $description,
                'img' => $_POST['img'],
                'quantity' => $quanity
            ];
            $id = insert('products', $product_ent);

            header('location: ' . BASE_URL . 'admin/products_management.php');

        }
} else {
    $name = '';
    $description = '';
    $img = '';
    $quanity = '';
}

// Удалить продукт
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_prod_list_id'])) {
    $id = $_GET['del_prod_list_id'];
    deleteProduct('products', $id);
    header('location: ' . BASE_URL . 'admin/products_management.php');
}
// Редактировать продукт
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-pr-ed'])) {

    if (!empty($_FILES['img-prod']['name'])) {
        $imgName = $_FILES['img-prod']['name'];
        $fileTmpName = $_FILES['img-prod']['tmp_name'];
        $destination = ROOT_PATH . "\assets\images\prod\\" . $imgName;

        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            $errImgProd = "Ошибка загрузки изображения на сервер";
        }
        $img = $imgName;
    } else {
        $img = trim($_POST['img-prod-2']);
    }

    $name = trim($_POST['name-prod']);
    $description = trim($_POST['desc-prod']);
    $quantity = trim($_POST['qty-prod']);
    $id = $_POST['id-prod'];

    if ($name === '') {
        $errMesMail = 'Пользователя с такой почтой не существует';
    } else {
        $product_ent = [
            'name' => $name,
            'description' => $description,
            'img' => $img,
            'quantity' => $quantity
        ];

        updateProduct('products', $id, $product_ent);
        header('location: ' . BASE_URL . 'admin/products_management.php');
    }
} else {
    $name = '';
    $description = '';
    $img = '';
    $quantity = '';
}

// --------------------------------------- ЗАЯВКА ПРОДУКТА ----------------------------------------

// Вывод корзины
if (!empty($_SESSION)) {
    $selectAppProd = selectOne('app_product', ['id_user' => $_SESSION['id_users']]);
}
// Добавить продукт в корзину
if (($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-shop-new']))) {

        $id_prod = $_POST['id_prod'];
        $quantity = trim($_POST['quantity']);
        $id_user = $_SESSION['id_users'];

        $selectProdForCart = selectOne('products', ['id_prod' => $id_prod]);
        $nameProd = $selectProdForCart['name'];

        if (!empty($_SESSION['cart'][$id_prod])) {

            $_SESSION['cart'][$id_prod] = [
                'id_prod' => $id_prod,
                'qty' => $_SESSION['cart'][$id_prod]['qty'] + $quantity,
                'name_prod' => $nameProd
            ];
        } else {
            $_SESSION['cart'][$id_prod] = [
                'id_prod' => $id_prod,
                'qty' => $quantity,
                'name_prod' => $nameProd
            ];
        }
}

// Удалить продукт из корзины
if (($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_cart_id']))) {
    $id = $_GET['del_cart_id'];
    unset($_SESSION['cart'][$id]);
    header('location: ' . BASE_URL . 'form_products.php');
}

// Отправить заявку
if (($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-app']))) {

    if ($_POST['id_prod'] == "") {
        $errAppProd = "Error";
    }
    else {
        $id_prod = $_POST['id_prod'];
        $qty_prod = $_POST['qty_prod'];
        $id_user = $_SESSION['id_users'];
        $info = $_POST['info'];
        $num = $_POST['num'];
        $mail = $_POST['mail'];
        $status = 0;

        $appProdNew = [
            'id_prod' => $id_prod,
            'quantity' => $qty_prod,
            'id_user' => $id_user,
            'description' => $info,
            'number' => $num,
            'email' => $mail,
            'status' => $status
        ];
        insert('app_product', $appProdNew);
        unset($_SESSION['cart']);
        header('location: ' . BASE_URL . '102.php');
    }
}

// ------------------------------------------- ОБРАБОТКА ЗАЯВОК -----------------------------------
// Редактирование заявки
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_prod_edit'])) {

    $id = $_GET['id_prod_edit'];
    $app_prod = selectOne('app_product', ['id_app_prod' => $id]);
    $id_app_prod = $app_prod['id_app_prod'];
    $id_prod = $app_prod['id_prod'];
    $quan = $app_prod['quantity'];
    $numb = $app_prod['number'];
    $mail = $app_prod['email'];
    $desc = $app_prod['description'];
    $created = $app_prod['created'];
    $status = $app_prod['status'];

    $id_user = $app_prod['id_user'];
    $use = selectOne('users', ['id_users' => $id_user]);
    $first_name = $use['first_name'];
    $last_name = $use['last_name'];
    $organization = $use['organization'];

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-prod-edit-y'])) {
    $id_edit = $_POST['id'];
    $stat = [
        'status' => 1
    ];

// Отправка сообщения при одобрении
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal'];
    $text_0 = explode("Appeal: ", $_POST['text_modal']);
    $text_1 = $text_0['0'];
    $text_2 = '<br><button type="submit" class="btn btn-outline-secondary btn-link" name="btn-link">Перейти в форму заполнения</button><br>
            С уважением, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ', сотрудник отдел сбыта АО "Балаково-Центролит".';
    $status = 0;
    $message_service_ent = [
        'id_user_sen' => $id_sen,
        'id_user_rec' => $id_rec,
        'theme' => $theme,
        'text' => $text_1 . $text_2,
        'status' => $status
    ];
    insert('message', $message_service_ent);

    updateAppProd('app_product',$id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office_product.php');
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-prod-edit-n'])) {
    $id_edit = $_POST['id'];
    $stat = [
        'status' => 2
    ];

// Отправка сообщения при отказе
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal_2'];
    $text_0 = explode("Appeal: ", $_POST['text_modal_2']);
    $text_1 = $text_0['0'];
    $text_2 = '<br>С уважением, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ', сотрудник отдел сбыта АО "Балаково-Центролит".';
    $status = 0;
    $message_service_ent = [
        'id_user_sen' => $id_sen,
        'id_user_rec' => $id_rec,
        'theme' => $theme,
        'text' => $text_1 . $text_2,
        'status' => $status
    ];
    insert('message', $message_service_ent);
    updateAppProd('app_product', $id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office_product.php');
}
// -------------------------------------------- КОНТРАКТ ------------------------------------------------
// Первая запись договора
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-product-contract'])) {
    $id_app_prod_cont = trim($_POST['number_app_prod']);
    $org_name = trim($_POST['org_name']);
    $org_country = trim($_POST['org_country']);
    $org_city = trim($_POST['org_city']);
    $org_street = trim($_POST['org_street']);
    $org_home = trim($_POST['org_home']);
    $org_index = trim($_POST['org_index']);
    $head_lname = trim($_POST['head_lname']);
    $head_fname = trim($_POST['head_fname']);
    $head_pname = trim($_POST['head_pname']);
    $head_pass = trim($_POST['head_pass_1']) . '-' . trim($_POST['head_pass_2']) . ' ' . trim($_POST['head_pass_3']);
    $req_inn = trim($_POST['req_inn']);
    $req_bik = trim($_POST['req_bik']);
    $req_racc = trim($_POST['req_racc']);
    $req_cacc = trim($_POST['req_cacc']);
    $info = trim($_POST['info']);
    $status = 0;

    if ($org_name === '') {
        $errFormServ = 'хуй';
    } else {
        $prod_contract_ent = [
            'id_app_prod' => $id_app_prod_cont,
            'org_name' => $org_name,
            'org_country' => $org_country,
            'org_city' => $org_city,
            'org_street' => $org_street,
            'org_home' => $org_home,
            'org_index' => $org_index,
            'head_lname' => $head_lname,
            'head_fname' => $head_fname,
            'head_pname' => $head_pname,
            'head_pass' => $head_pass,
            'req_inn' => $req_inn,
            'req_bik' => $req_bik,
            'req_racc' => $req_racc,
            'req_cacc' => $req_cacc,
            'info' => $info,
            'status_contract' => $status,
        ];
        $id = insert('product_contract', $prod_contract_ent);
        header('location: ' . BASE_URL);
    }
} else {
    $org_country = '';
    $org_city = '';
    $org_street = '';
    $org_home = '';
    $org_index = '';
    $head_pname = '';
    $info = '';
}
// Редактирование ДОГОВОРА
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cont_prod_id'])) {

    $id = $_GET['cont_prod_id'];
    $cont = selectOne('product_contract', ['id_contract' => $id]);
    $id_contract = $cont['id_contract'];
    $org_name = $cont['org_name'];
    $org_country = $cont['org_country'];
    $org_city = $cont['org_city'];
    $org_street = $cont['org_street'];
    $org_home = $cont['org_home'];
    $org_index = $cont['org_index'];
    $head_lname = $cont['head_lname'];
    $head_fname = $cont['head_fname'];
    $head_pname = $cont['head_pname'];
    $head_pass = $cont['head_pass'];
    $req_inn = $cont['req_inn'];
    $req_bik = $cont['req_bik'];
    $req_racc = $cont['req_racc'];
    $req_cacc = $cont['req_cacc'];
    $info = $cont['info'];
    $pdf = $cont['pdf'];
    $status_contract = $cont['status_contract'];
    $created_contract = $cont['created_contract'];

    $id_app = $cont['id_app_prod'];
    $id_app = selectOne('app_product', ['id_app_prod' => $id_app]);
    $id_user = $id_app['id_user'];
    $id_prods = $id_app['id_prod'];
    $qty_prods = $id_app['quantity'];
    $number = $id_app['number'];
    $email = $id_app['email'];
    $created = $id_app['created'];
    $status = $id_app['status'];

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-prod-cont-edit-y'])) {
    $id_edit = $_POST['id_contract'];
    $stat = [
        'status_contract' => 3
    ];
// Отправка сообщения при одобрении
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal'];
    $text_0 = explode("Appeal: ", $_POST['text_modal']);
    $text_1 = $text_0['0'];
    $text_2 = '<br><button type="submit" class="btn btn-outline-secondary btn-link" name="btn-link-cont-serv">Читать договор</button><br>
            С уважением, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ', сотрудник отдел сбыта АО "Балаково-Центролит".';

    $status = 0;
    $message_service_ent = [
        'id_user_sen' => $id_sen,
        'id_user_rec' => $id_rec,
        'theme' => $theme,
        'text' => $text_1 . $text_2,
        'status' => $status
    ];
    insert('message', $message_service_ent);
    updateContractService('product_contract', $id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office_product_contract.php');
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-prod-cont-edit-n'])) {
    $id_edit = $_POST['id_contract'];
    $stat = [
        'status_contract' => 1
    ];

// Отправка сообщения при отказе
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal-n'];
    $text_0 = explode("Appeal: ", $_POST['text_modal_n']);
    $text_1 = $text_0['0'];
    $text_2 = '<br>С уважением, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ', сотрудник отдел сбыта АО "Балаково-Центролит".';

    $status = 0;
    $message_service_ent = [
        'id_user_sen' => $id_sen,
        'id_user_rec' => $id_rec,
        'theme' => $theme,
        'text' => $text_1 . $text_2,
        'status' => $status
    ];
    insert('message', $message_service_ent);
    updateContractService('product_contract', $id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office_product_contract.php');
}

// Удаление договора
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cont_serv_del_id'])) {
    $id = $_GET['cont_serv_del_id'];
    deleteServiceContract('service_contract', $id);
    header('location: ' . BASE_URL . 'admin/office_service_contract.php');
}

// Прочесть договор
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contract-check'])) {

    $id = $_POST['id_contract'];
    $contCheck = selectOne('product_contract', ['id_contract' => $id]);
    $link = $contCheck['id_contract'];
    header('location: ' . BASE_URL . 'admin/contract_check.php');
}

// Вставить подписанный договор
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-contract'])) {
//    tt($_POST);
    if (!empty($_FILES['cont']['name'])) {
        $contName = "Update_" . $_FILES['cont']['name'];
        $fileTmpName = $_FILES['cont']['tmp_name'];
        $fileType = $_FILES['cont']['type'];
        $destination = ROOT_PATH . "\\tcpdf\contracts_product\\" . $contName;


        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result) {
            $_POST['cont'] = $contName;
        } else {
            $errImgProd = "Ошибка загрузки документа на сервер";
        }
    } else {
        $errImgProd = "Ошибка загрузки документа";
    }
    $id_cont = $_POST['id_cont'];
    $cont_prod_ent = [
        'status_contract' => 4,
        'pdf' => $_POST['cont']
    ];
    updateContractService('product_contract', $id_cont, $cont_prod_ent);
    header('location: ' . BASE_URL);
}

