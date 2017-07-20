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
        <p>以下のイベントを削除しますか?</p>
        <p>イベント名:<?= htmlspecialchars($_POST['name']) ?></p>
        <p>締切日:<?= htmlspecialchars($_POST['deadline']) ?></p>
    </div>
    <form action="admin_eventdelete_complete.php" method="POST">
        <div class="form-buttons">
            <input type="hidden" name="deleteID" value="<?=$_POST['deleteID']?>">
            <button class="form-button" type="button" onClick="location.href='admin_eventdelete.php';">戻る</button>
            <button class="form-button" type="submit">削除</button>
        </div>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>