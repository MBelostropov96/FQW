<?php
session_start();

include "path.php";

unset($_SESSION['id_users']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['admin']);
unset($_SESSION['number']);
unset($_SESSION['organization']);
unset($_SESSION['email']);
unset($_SESSION['cart']);

header('location: ' . BASE_URL);