<?php session_start(); ?>
<?php
    unset($_SESSION['dat_member']);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログアウト</title>
</head>

<body>
	<?php
		echo 'ログアウトしました。';
	?>
    <br>
    <a href="shop_list.php">ホームへ</a>
</body>

</html>