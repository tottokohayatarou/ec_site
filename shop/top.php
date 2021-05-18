<?php 
	session_start();
	session_regenerate_id(true);
    $_SESSION['cart'] = 1;
    $cart=$_SESSION['cart'];
    $_SESSION['cart'] = $cart;
    unset($_SESSION['cart']);
    $_SESSION['kazu'] = 1;
    $kazu=$_SESSION['kazu'];
    $_SESSION['kazu'] = $kazu;
    unset($_SESSION['kazu']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <a href="menu.php">トップページに戻る</a>
</body>
</html>