<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
if(!file_exists(dirname(__FILE__)."/files")){
    mkdir(dirname(__FILE__)."/files",0777);
}

$title = $_SESSION['title'];
$author = $_SESSION['author'];
$filename = $_SESSION['filename'];
$comment = $_SESSION['comment'];

$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "production";

if(rename(dirname(__FILE__)."/usertmp/".$_SESSION['filename'],dirname(__FILE__)."/files/".$_SESSION['filename'])){
    $resultMsg =  "アップロード完了";
    //ここにDB登録処理
    $link = mysqli_connect($host,$user,$pass,$dbname);
    if(!$link){ exit("データベース接続エラー"); }

    $result = mysqli_query($link,"INSERT INTO $tbname(title,author,filename,comment) VALUE('$title','$author','$filename','$comment')");
    if(!$result){ exit("データベース登録エラー"); }
    $ID = mysqli_insert_id($link);

    mysqli_close($link);
    //ここまで
    
    rename(dirname(__FILE__)."/files/".$_SESSION['filename'],dirname(__FILE__)."/files/".$ID);
    unset($_SESSION['title']);
    unset($_SESSION['author']);
    unset($_SESSION['comment']);
    
}
else{
    $resultMsg = "アップロード失敗";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $resultMsg ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1><?= $resultMsg ?></h1>
    </header>
    <main>
        <a href="index.php">トップページへ戻る</a>
    </main>
    <footer>
    </footer>
</body>
</html>