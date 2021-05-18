<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
    <title></title>
  </head>
  <body class="shop_home">
<?php

require_once('../common/common.php');

$post=sanitize($_POST);

$onamae=$post['onamae'];
$email=$post['email'];
$postal1=$post['postal1'];
$postal2=$post['postal2'];
$address=$post['address'];
$tel=$post['tel'];
$chumon=$post['chumon'];
$pass=$post['pass'];
$pass2=$post['pass2'];
$danjo=$post['danjo'];
$birth=$post['birth'];

$okflg=true;

if($onamae=='')
{
	print 'お名前が入力されていません。<br /><br />';
	$okflg=false;
}
else
{
	print 'お名前<br />';
	print $onamae;
	print '<br /><br />';
}

if(preg_match('/^[\w\-\.]+\@[\w\-\.]+\.([a-z]+)$/',$email)==0)
{
	print 'メールアドレスを正確に入力してください。<br /><br />';
	$okflg=false;
}
else
{
	print 'メールアドレス<br />';
	print $email;
	print '<br /><br />';
}

if(preg_match('/^[0-9]+$/',$postal1)==0)
{
	print '郵便番号は半角数字で入力してください。<br /><br />';
	$okflg=false;
}
else
{
	print '郵便番号<br />';
	print $postal1;
	print '-';
	print $postal2;
	print '<br /><br />';
}

if(preg_match('/^[0-9]+$/',$postal2)==0)
{
	print '郵便番号は半角数字で入力してください。<br /><br />';
	$okflg=false;
}

if($address=='')
{
	print '住所が入力されていません。<br /><br />';
	$okflg=false;
}
else
{
	print '住所<br />';
	print $address;
	print '<br /><br />';
}

if(preg_match('/^\d{2,5}-?\d{2,5}-?\d{4,5}$/',$tel)==0)
{
	print '電話番号を正確に入力してください。<br /><br />';
	$okflg=false;
}
else
{
	print '電話番号<br />';
	print $tel;
	print '<br /><br />';
}

if($chumon=='chumontouroku')
{
	if($pass=='')
	{
		print 'パスワードが入力されていません。<br /><br />';
		$okflg=false;
	}

	if($pass!=$pass2)
	{
		print 'パスワードが一致しません。<br /><br />';
		$okflg=false;
	}

	print '性別<br />';
	if($danjo=='dan')
	{
		print '男性';
	}
	else
	{
		print '女性';
	}
	print '<br /><br />';

	print '生まれ年<br />';
	print $birth;
	print '年代';
	print '<br /><br />';

}

if($okflg==true)
{
	print '<form method="post" action="member_done.php">';
	print '<input type="hidden" name="onamae" value="'.$onamae.'">';
	print '<input type="hidden" name="email" value="'.$email.'">';
	print '<input type="hidden" name="postal1" value="'.$postal1.'">';
	print '<input type="hidden" name="postal2" value="'.$postal2.'">';
	print '<input type="hidden" name="address" value="'.$address.'">';
	print '<input type="hidden" name="tel" value="'.$tel.'">';
	print '<input type="hidden" name="chumon" value="'.$chumon.'">';
	print '<input type="hidden" name="pass" value="'.$pass.'">';
	print '<input type="hidden" name="danjo" value="'.$danjo.'">';
	print '<input type="hidden" name="birth" value="'.$birth.'">';
	print '<input type="button" class="btn-square" onclick="history.back()" value="戻る">';
	print '<input type="submit" class="btn-square" value="ＯＫ"><br />';
	print '</form>';
}
else
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>