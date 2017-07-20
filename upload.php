<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイルアップロード</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <h1>ファイルアップロード</h1>
    </header>
    <main>
    <form action="upload_confirm.php" method="POST" enctype="multipart/form-data" onSubmit="return checkFileInfo();">
        <p id="error-message"></p>
        ファイル(zipのみ)<input type="file" id="file" name="production" value="" accept="application/zip">
        タイトル<input type="text" id="title" name="title" value="<?= $_SESSION['title'] ?>">
        作者<input type="text" id="author" name="author" value="<?= $_SESSION['author'] ?>">
        説明<textarea id="comment" name="comment" cols="30" rows="10"><?= $_SESSION['comment'] ?></textarea>
        <div class="form-buttons">
            <button class="form-button" type="button" onClick="location.href='index.php'">戻る</button>
            <button class="form-button" type="submit">確認</button>
        </div>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>