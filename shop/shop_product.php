<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	print 'ようこそゲスト様　';
	print '<a href="member_login.html">会員ログイン</a><br />';
	print '<br />';
}
else
{
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

try
{

$pro_code=$_GET['procode'];

$dsn='mysql:dbname=shop;host=db-mysql.cghwza3ap5uf.us-east-1.rds.amazonaws.com;charset=utf8';
$user='admin';
$password='adminpass';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name,price,gazou,com,gazou2,gazou3 FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_price=$rec['price'];
$pro_com=$rec['com'];
$pro_gazou_name=$rec['gazou'];
$pro_gazou2_name=$rec['gazou2'];
$pro_gazou3_name=$rec['gazou3'];

$dbh=null;

if($pro_gazou_name=='')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
}
if($pro_gazou2_name=='')
{
	$disp_gazou2='';
}
else
{
	$disp_gazou2='<img src="../product/gazou/'.$pro_gazou2_name.'">';
}
if($pro_gazou3_name=='')
{
	$disp_gazou3='';
}
else
{
	$disp_gazou3='<img src="../product/gazou/'.$pro_gazou3_name.'">';
}

print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br /><br />';

}

catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

商品情報参照<br />
<br />
商品名<br />
<?php print $pro_name; ?>
<br />
価格<br />
<?php print $pro_price; ?>円
<br />
<?php print $disp_gazou; ?>
<?php print $disp_gazou2; ?>
<?php print $disp_gazou3; ?>
<br />
<br />
詳細<br>
<?php print $pro_com; ?>
<br />
<br />
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>