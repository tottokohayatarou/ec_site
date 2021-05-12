<?php session_start(); ?>
<?php
    //データベース接続
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メニュー</title>
</head>
<body>
    <header>
        <h1>メニュー</h1>

        <?php
        if (!(isset($_SESSION['dat_member']))) {
        ?>
        <a href="member_login.html">ログイン</a>
        <a href="shop_cartlook.php">カート</a>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['dat_member'])) {
        ?>
        <a href="member_logout.php">ログアウト</a>
        <a href="shop_cartlook.php">カート</a>
        <?php
        }
        ?>
    </header>
    <main>
    <?php
    $sql = 'SELECT * FROM dat_sales_product';
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        if(!$row['code']){
            echo "{$row['name']}";
        }
    }
    ?>
    </main>
</body>
</html>