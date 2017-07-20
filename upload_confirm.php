<?php
session_start();

$_SESSION['tmpfile'] = $_FILES['production']['tmp_name'];
$_SESSION['filename'] = $_FILES['production']['name'];
$_SESSION['title'] = $_POST['title'];
$_SESSION['author'] = $_POST['author'];
$_SESSION['comment'] = $_POST['comment'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アップロード確認</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

$errorHtml = <<<EOM
<h1>エラー</h1>
<p>やり直してください</p>
<a href="index.php">トップページへ戻る</a>
EOM;

if(!is_uploaded_file($_FILES['production']['tmp_name'])){
    echo $errorHtml;
    exit;
}
else{
    if(!file_exists(dirname(__FILE__)."/usertmp")){
        mkdir(dirname(__FILE__)."/usertmp",0777);
    }
    if(!move_uploaded_file($_FILES['production']['tmp_name'],dirname(__FILE__)."/usertmp/".$_FILES['production']['name'])){
        echo $errorHtml;
        exit;
    }
}
?>
    <header>
        <h1>アップロード確認</h1>
    </header>
    <main>
    <div class="confirm-contents">
        <p>以下の内容でアップロードします</p>
        <p>ファイル名:<?= htmlspecialchars($_SESSION['filename']) ?></p>
        <p>タイトル:<?= htmlspecialchars($_SESSION['title']) ?></p>
        <p>作者:<?= htmlspecialchars($_SESSION['author']) ?></p>
        <p>コメント:<?= htmlspecialchars($_SESSION['comment']) ?></p>
    </div>
    <form action="upload_complete.php" method="POST">
        <div class="form-buttons">
            <button class="form-button" type="button" onClick="location.href='upload.php';">修正</button>
            <button class="form-button" type="submit">アップロード</button>
        </div>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>