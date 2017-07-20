<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("login.php");
login();
$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "event";

$deleteID = $_POST['deleteID'];

$link = mysqli_connect($host,$user,$pass,$dbname);
if(!$link){ exit("データベース接続エラー"); }

$result = mysqli_query($link,"DELETE FROM $tbname WHERE id = $deleteID");
if(!$result){ exit("データベース削除エラー"); }

mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>削除完了</h1>
    </header>
    <main>
    <a href="admin.php">管理画面へ戻る</a>
    </main>
    <footer>
    </footer>
</body>
</html>