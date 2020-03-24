<?php
$secret = strtoupper(md5('2U8NKKz74xM6VZVOixdpKHlQa'));

$hash = $_POST['PAYMENT_ID'] . ':' .
    $_POST['PAYEE_ACCOUNT'] . ':' .
    $_POST['PAYMENT_AMOUNT'] . ':' .
    $_POST['PAYMENT_UNITS'] . ':' .
    $_POST['PAYMENT_BATCH_NUM'] . ':' .
    $_POST['PAYER_ACCOUNT'] . ':' .
    $_POST['TIMESTAMPGMT'];

$hash = strtoupper(md5($hash));
if($hash != $_POST['V2_HASH']) exit('error');
file_put_contents('payment.log','Сумма: '.$_POST['PAYMENT_AMOUNT'].' - Логин: '.$_POST['PAYMENT_ID']);
