<?php
session_start();

$_SESSION['evname'] = $_POST['evname'];
$_SESSION['evdeadlinedate'] = $_POST['evdeadlinedate'];
$_SESSION['evdeadlinetime'] = $_POST['evdeadlinetime'];

$datetime = $_SESSION['evdeadlinedate'].' '.$_SESSION['evdeadlinetime'];
$_SESSION['evdeadline'] = $datetime;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント登録確認</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>イベント登録確認</h1>
    </header>
    <main>
    <div class="confirm-contents">
        <h4>以下の内容で登録します</h4>
        <p>イベント名:<?= htmlspecialchars($_SESSION['evname']) ?></p>
        <p>締め切り日:<?= htmlspecialchars($datetime) ?></p>
    </div>
    <form action="event_regist_complete.php" method="POST">
        <div class="form-buttons">
            <button class="form-button" type="button" onClick="location.href='event_regist.php';">修正</button>
            <button class="form-button" type="submit">登録</button>
        </div>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>