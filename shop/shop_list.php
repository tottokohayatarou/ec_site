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
        try {
            $pro_code = $_GET['procode'];
            
            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT code,name,gazou,typenumber FROM mst_product WHERE typenumber=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);
            $dbh = null;
            
            while(true) {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                if($rec !== false){
                $pro_gazou_name=$rec['gazou'];
                }
                if($pro_gazou_name=='') {
                    $disp_gazou='';
                } else {
                    $disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
                }
                if($rec==false) {
                    break;
                }
                print '<a href="shop_product.php?procode='.$rec['code'].'">';
                print $rec['name'];
                print '</a>';
                print $disp_gazou;
            }
            
        } catch (Exception $e) {
            echo '<span class="error">エラーがありました。</span><br>';
            echo $e->getMessage();
            exit();
        }
    ?>
    
</body>
</html>