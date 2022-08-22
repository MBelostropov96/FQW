<?php
session_start();
require 'connect.php';

function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

// Проверка выполнения запроса к БД
function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
}

// Запрос на получение данный с одной таблицы
function selectAll($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// ЗАПРОС tt(selectAll('users', $params));
// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
//tt(selectOne ('users', ['id_users' => 3]));
// Запись в таблицу БД
function insert($table, $params) {
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . $key;
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}
// ЗАПРОС insert('users', $arrDATE);
// Редактирование таблицы УСЛУГИ
function update($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_service = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
// ЗАПРОС update('users', 3, $param);
// Удаление строки в таблице
function delete($table, $id) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_service = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// ЗАПРОС delete('users', 3);



// ВЫВОД УСЛУГ: Объединение таблицы ЮЗЕР и УСЛУГИ
function selectUserAndService ($table1, $table2) {
    global $pdo;
    $sql = "
    SELECT 
        t1.id_service,
        t1.category,
        t1.description,
        t1.number,
        t1.email,
        t1.created,
        t1.status,
        t2.first_name,
        t2.last_name,
        t2.organization           
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id_users";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// ВЫВОД СООБЩЕНИЙ: Объединение таблицы ЮЗЕР и СООБЩЕНИЙ
function selectUserAndMessage ($table1, $table2) {
    global $pdo;
    $sql = "
    SELECT
        t1.id_message,
        t1.id_user_rec,
        t1.id_user_sen,
        t1.theme,
        t1.text,
        t1.status,
        t1.created,
        t2.email,
        t2.first_name,
        t2.last_name,
        t2.organization
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user_sen = t2.id_users";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Редактирование таблицы СООБЩЕНИЯ
function updateMessage($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_message = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
// Удаление строки в таблице СООБЩЕНИЯ
function deleteMessage($table, $id) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_message = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// Удаление строки в таблице ЛИСТ УСОУН
function deleteServiceList($table, $id) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_service = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// Редактирование таблицы ПРОДУКТЫ
function updateProduct($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_prod = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
// Удаление строки в таблице ПРОДУКТЫ
function deleteProduct($table, $id) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_prod = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Создать сообщение ОБРАТНАЯ СВЯЗЬ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-feedback'])) {

    $email_feedback = trim($_POST['email']);
    $text_feedback = trim($_POST['message']);
    $id_sen = 27;
    $id_rec = 0;
    $theme = 'none';
    $status = 0;

        if ($email_feedback === '' && $text_feedback === '') {
            $errFeedback = 'Пользователя с такой почтой не существует';
        } else {

            $message_feedback = [
                'id_user_sen' => $id_sen,
                'id_user_rec' => $id_rec,
                'theme' => $email_feedback,
                'text' => $text_feedback,
                'status' => $status
            ];
            $id = insert('message', $message_feedback);

        }
} else {
    $email_feedback = '';
    $text_feedback = '';
}
// ВЫВОД КОНТРАКТОВ: Объединение таблицы ЮЗЕР, СЕРВИС И КОНТРАКТ
function selectServiceAndContract ($table1, $table2) {
    global $pdo;
    $sql = "
    SELECT
        t1.id_service, t1.id_user, t1.category, t1.description, t1.number, t1.email, t1.status, t1.created,
        t2.id_contract,
        t2.org_name, t2.org_country, t2.org_city, t2.org_street, t2.org_home, t2.org_index,
        t2.head_lname, t2.head_fname, t2.head_pname, t2.head_pass,
        t2.req_inn, t2.req_bik, t2.req_racc, t2.req_cacc,
        t2.info, t2.pdf, t2.status_contract, t2.created_contract
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_service = t2.id_service";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Редактирование таблицы ПРОДУКТЫ
function updateServiceContract($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_contract = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
// Удаление строки в таблице ПРОДУКТЫ
function deleteServiceContract($table, $id) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_contract = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// Редактирование таблицы КОНТРАКТ УСЛУГ
function updateContractService($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_contract = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
// Редактирование форма заявки продукта
function updateAppProduct($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_app_prod = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// ВЫВОД СПИСКА ЗАЯВОК ПРОДУКТ: Объединение таблицы ЮЗЕР, ПРОДУКТЫ И ЗАЯВКИ
function selectProductAndApp ($table1, $table2, $table3) {
    global $pdo;
    $sql = "
    SELECT
        t1.id_app_prod, t1.id_prod, t1.quantity, t1.number, t1.email, t1.status, t1.created, t1.description,
        t2.last_name, t2.first_name, t2.organization, 
        t3.name        
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id_users
    JOIN $table3 AS t3 ON t1.id_prod = t3.id_prod";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Редактирование таблицы ЗАЯВКИ ПРОДУКТОВ
function updateAppProd($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_app_prod = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// ------------------------------------------------ УПРАВЛЕНИЕ СОТРУДНИКАМИ ---------------------------------------------

// Удаление строки в таблице СООБЩЕНИЯ
function deleteUser($table, $id) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_users = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// Редактирование таблицы USER
function updateUsers($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_users = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// Поиск пользователя
function searchUser($text, $table) {
    $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT * FROM $table AS t
    WHERE t.first_name LIKE '%$text%' OR t.last_name LIKE '%$text%' OR t.email LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Поиск заявки
function searchProd($text, $table) {
    $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT * FROM $table AS t
    WHERE t.id_app_prod LIKE '%$text%' OR t.email LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Поиск договора продукта
function searchProdCon($text, $table) {
    $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT * FROM $table AS t
    WHERE t.id_contract LIKE '%$text%' OR t.org_name LIKE '%$text%' OR t.head_lname LIKE '%$text%' OR t.head_fname LIKE '%$text%' OR t.head_pname LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Удаление строки в таблице СООБЩЕНИЯ
function deleteAll($table, $id, $key) {
    global $pdo;

    $sql = "DELETE FROM $table WHERE $key = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}