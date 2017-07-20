<?php
require_once("login.php");
login();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除確認</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>削除確認</h1>
    </header>
    <main>
        <div class="confirm-contents">
        <p>以下のファイルを削除しますか?</p>
        <p>タイトル:<?= htmlspecialchars($_POST['title']) ?></p>
        <p>作者:<?= htmlspecialchars($_POST['author']) ?></p>
        <p>コメント:<?= htmlspecialchars($_POST['comment']) ?></p>
    </div>
    <form action="admin_filedelete_complete.php" method="POST">
        <div class="form-buttons">
            <input type="hidden" name="deleteID" value="<?=$_POST['deleteID']?>">
            <button class="form-button" type="button" onClick="location.href='admin_filedelete.php';">戻る</button>
            <button class="form-button" type="submit">削除</button>
        </div>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>