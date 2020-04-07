<?php

require_once 'dbconnect.php';
$secret = strtoupper(md5('2U8NKKz74xM6VZVOixdpKHlQa'));

$hash = $_POST['PAYMENT_ID'] . ':' .
    $_POST['PAYEE_ACCOUNT'] . ':' .
    $_POST['PAYMENT_AMOUNT'] . ':' .
    $_POST['PAYMENT_UNITS'] . ':' .
    $_POST['PAYMENT_BATCH_NUM'] . ':' .
    $_POST['PAYER_ACCOUNT'] . ':' .
    $secret . ':' .
    $_POST['TIMESTAMPGMT'];

file_put_contents('payment.log','Сумма: '.json_encode($_POST).' - Логин: '.$_POST['PAYMENT_ID'], FILE_APPEND);
$query = "INSERT INTO orders (user_id, recipe_id) VALUES ('" . json_encode($_POST) . "', '" . $_POST["RECIPE_ID"] . "')";
$result = mysqli_query($connect, $query);
if ($result) {
    file_put_contents('bdlog.log','Сумма: '.$hash.' - Логин: '.$_POST['PAYMENT_ID']);
} else echo 'No';


$hash = strtoupper(md5($hash));
if($hash != $_POST['V2_HASH']) exit('error');


file_put_contents('payment.log','Сумма: '.$_POST['PAYMENT_AMOUNT'].' - Логин: '.$_POST['PAYMENT_ID']);
$query = "INSERT INTO orders (user_id, recipe_id) VALUES ('" . $_POST["USER_ID"] . "', '" . $_POST["RECIPE_ID"] . "')";
$result = mysqli_query($connect, $query);
if ($result) {
    file_put_contents('bdlog.log','Сумма: '.$_POST['PAYMENT_AMOUNT'].' - Логин: '.$_POST['PAYMENT_ID']);
} else echo 'No';
header('Location: http://www.antivrecipes.com/index.php');
exit;
