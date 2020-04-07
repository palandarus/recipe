<?
echo 'error';
header('Location: http://www.antivrecipes.com/');
exit;


/*file_put_contents('payment.log', 'Сумма: ' . $_POST['PAYMENT_AMOUNT'] . ' - Логин: ' . $_POST['PAYMENT_ID']);
$query = "INSERT INTO orders (user_id, recipe_id) VALUES ('" . $_POST["USER_ID"] . "', '" . $_POST["RECIPE_ID"] . "')";
$result = mysqli_query($connect, $query);
if ($result) {
    file_put_contents('bdlog.log', 'Сумма: ' . $_POST['PAYMENT_AMOUNT'] . ' - Логин: ' . $_POST['PAYMENT_ID']);
} else echo 'No';*/