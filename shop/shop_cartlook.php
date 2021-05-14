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
    <title>カート</title>
</head>
<body>
<?php
    $user = 'root';
    $password = '';
    $dbName = 'shop';
    $host = 'localhost';
    $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo '<span class="エラーがありました。</span><br>';
        echo $e->getMessage();
        exit();
    }
?>

    <?php
    if(!empty($_SESSION['mst_product'])) {
    ?>
    <table>
        <th>商品</th>
        <th>価格</th>
        <?php
        foreach ($_SESSION['mst_product'] as $code => $product){
        ?>
        <td></td>
        <td></td>
        <?php
        }
        ?>
    </table>
    <?php
    }
    ?>
</body>
</html>