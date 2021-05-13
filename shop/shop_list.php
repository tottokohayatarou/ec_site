<?php session_start(); ?>
<?php
    //データベース接続
    $user = 'phpuser2';
    $password = '1234';
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
    ?>
        <a href="shop_list_type.php?id=<?= $row['code']?>">
    <?php
            echo "{$row['name']}";
    ?>
        </a>
    <?php
        }
    }
    ?>
    </main>
</body>
</html>