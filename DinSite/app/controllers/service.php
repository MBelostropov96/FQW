<?php
include SITE_ROOT . "/app/database/db.php";

$errFormServ = '';

$servListAll = selectAll('service_list');
$serviceAll = selectAll('service');
$serviceAndUsers = selectUserAndService('service', 'users');
$serviceAndContract = selectServiceAndContract('service', 'service_contract');

// Создание заявки
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-service'])) {
    $service = trim($_POST['service']);
    $text = trim($_POST['text']);
    $num = trim($_POST['num']);
    $mail = trim($_POST['mail']);
    $status = 0;
    $id_user = $_SESSION['id_users'];

    if ($text === '') {
        $errFormServ = 'хуй';
    } else {
        $service_ent = [
            'id_user' => $id_user,
            'category' => $service,
            'description' => $text,
            'number' => $num,
            'email' => $mail,
            'status' => $status
        ];
        $id = insert('service', $service_ent);
        header('location: ' . BASE_URL . '103.php');
    }
} else {
    $text = '';
}
// Редактирование статуса услуги
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $serv = selectOne('service', ['id_service' => $id]);
    $id_serv = $serv['id_service'];
    $category = $serv['category'];
    $descrip = $serv['description'];
    $number = $serv['number'];
    $email = $serv['email'];
    $created = $serv['created'];
    $status = $serv['status'];

    $id_user = $serv['id_user'];
    $use = selectOne('users', ['id_users' => $id_user]);
    $first_name = $use['first_name'];
    $last_name = $use['last_name'];
    $organization = $use['organization'];


}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-serv-edit-y'])) {
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
    $text_2 = '<br><button type="submit" class="btn btn-outline-secondary btn-link" name="btn-link">Форма для заполнения договора</button><br>
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

    update('service',$id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office.php');
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-serv-edit-n'])) {
    $id_edit = $_POST['id'];
    $stat = [
        'status' => 2
    ];

// Отправка сообщения при отказе
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal'];
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
    update('service',$id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office.php');
}

// Удаление заявки
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('service', $id);
    header('location: ' . BASE_URL . 'admin/office.php');
}

// ---------------------------------------------------------- CONTRACT ------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-service-contract'])) {
    $id_service = trim($_POST['number_service']);
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
        $service_contract_ent = [
            'id_service' => $id_service,
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
        $id = insert('service_contract', $service_contract_ent);
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
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cont_serv_id'])) {

    $id = $_GET['cont_serv_id'];
    $cont = selectOne('service_contract', ['id_contract' => $id]);
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

    $id_serv = $cont['id_service'];
    $serv = selectOne('service', ['id_service' => $id_serv]);
    $id_user = $serv['id_user'];
    $category = $serv['category'];
    $description = $serv['description'];
    $number = $serv['number'];
    $email = $serv['email'];
    $created = $serv['created'];
    $status = $serv['status'];

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-serv-cont-edit-y'])) {
    $id_edit = $_POST['id_contract'];
    $stat = [
        'status_contract' => 3
    ];
// Отправка сообщения при одобрении
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal'];
    $text_1 = $_POST['text_modal'];
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
    updateContractService('service_contract',$id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office_service_contract.php');
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but-serv-cont-edit-n'])) {
    $id_edit = $_POST['id_contract'];
    $stat = [
        'status_contract' => 5
    ];


// Отправка сообщения при отказе
    $id_sen = $_SESSION['id_users'];
    $id_rec = $_POST['id_rec_y'];
    $theme = $_POST['theme_modal-n'];
    $text_1 = $_POST['text_modal-n'];
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
    updateContractService('service_contract',$id_edit, $stat);
    header('location: ' . BASE_URL . 'admin/office_service_contract.php');
}

// Удаление договора
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cont_serv_del_id'])) {
    $id = $_GET['cont_serv_del_id'];
    deleteServiceContract('service_contract', $id);
    header('location: ' . BASE_URL . 'admin/office_service_contract.php');
}

// ---------------------------------------- УПРАВЛЕНИЕ УСЛУГАМИ --------------------------------------------
// Добавить услугу
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-serv-list'])) {

    $name = trim($_POST['name_serv']);
    $desc = trim($_POST['desc_serv']);

    if ($name === '') {
        $errMesMail = 'Пользователя с такой почтой не существует';
    } else {
        $serv_ent = [
            'name_serv' => $name,
            'desc_serv' => $desc
        ];
        $id = insert('service_list', $serv_ent);
        header('location: ' . BASE_URL . 'admin/service_management.php');
    }
} else {
    $name = '';
    $description = '';
}
// Удалить услугу
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_serv_list_id'])) {
    $id = $_GET['del_serv_list_id'];
    deleteServiceList('service_list', $id);
    header('location: ' . BASE_URL . 'admin/service_management.php');
}
