<?php
require_once("login.php");
login();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ページ</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>管理者ページ</h1>
    </header>
    <main>
        <a class="link-button1" href="admin_filedelete.php">ファイル削除</a>
        <a class="link-button1" href="admin_eventdelete.php">イベント削除</a>
        <a class="link-button1" href="index.php">トップへ戻る</a>
    </main>
    <footer>

    </footer>
</body>
</html>