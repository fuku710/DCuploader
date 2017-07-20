<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "event";

$link = mysqli_connect($host,$user,$pass,$dbname);
if(!$link){ exit("データベース接続エラー"); }

$escaped_evname = mysqli_escape_string($link,$_SESSION['evname']);
$escaped_evdeadline = mysqli_escape_string($link,$_SESSION['evdeadline']);

$result = mysqli_query($link,"INSERT INTO $tbname(name,deadline) VALUE('$escaped_evname','$escaped_evdeadline')");
if(!$result){ exit("データベース登録エラー"); }

mysqli_close($link);

unset($_SESSION['evname']);
unset($_SESSION['evdeadlinedate']);
unset($_SESSION['evdeadlinetime']);
unset($_SESSION['evdeadline']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>登録完了</h1>
    </header>
    <main>
    <a href="event.php">イベント一覧へ戻る</a>
    </main>
    <footer>
    </footer>
</body>
</html>