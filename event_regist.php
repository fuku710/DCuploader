<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <h1>新規イベント登録</h1>
    </header>
    <main>
    <form action="event_regist_confirm.php" method="POST" onSubmit="return checkEventInfo();">
         <p id="error-message"></p>
        イベント名<input id="eventname" name="evname" value="<?= $_SESSION['evname'] ?>">
        締め切り日<input id="deadlinedate" type="date" name="evdeadlinedate" value="<?= $_SESSION['evdeadlinedate'] ?>">
        <input id="deadlinetime" type="time" name="evdeadlinetime" value="<?= $_SESSION['evdeadlinetime'] ?>">
        <div class="form-buttons">
            <button type="button" class="form-button" onClick="location.href='event.php'">戻る</button>
            <button type="submit" class="form-button">確認</button>
        </div>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>