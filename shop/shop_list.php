<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
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
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
</head>
<body>
    <?php
        // $user = 'root';
        // $password = 'root';
        // $dbName = 'shop';
        // $host = 'localhost';
        // $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
        try {
            // $pdo = new PDO($dsn, $user, $password);
            // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql='SELECT code,name,typenumber FROM mst_number WHERE 1';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
            $dbh=null;

            foreach ($result as $row) {
                if(!$row['typenumber']){
                    print '<a href="">';
                    print $row['name'];
                    print '</a>';
                }
            }

            } catch (Exception $e) {
                echo '<span class="エラーがありました。</span><br>';
                echo $e->getMessage();
                exit();
            }
            
    ?>
    
</body>
</html>