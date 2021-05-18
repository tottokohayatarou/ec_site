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
	print 'ようこそ　';
	print $_SESSION['member_name'];
	print ' 様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ショップ</title>
</head>
<body>

<?php

try
{

    $dsn='mysql:dbname=shop;host=db-mysql.cghwza3ap5uf.us-east-1.rds.amazonaws.com;charset=utf8';
    $user='admin';
    $password='adminpass';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,typenumber FROM mst_number WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '商品一覧<br /><br />';

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<table>';
	print '<tr>';
	print '<td>';
	print '<a href="shop_list.php?procode='.$rec['code'].'">';
	print $rec['name'];

	print '</a>';
	print '</td>';
	print '</td>';
	print '</table>';
	print '<br />';
}

print '<br />';
print '<a href="shop_cartlook.php">カートを見る</a><br />';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>