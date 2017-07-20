<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("login.php");
login();
$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "production";

$deleteID = $_POST['deleteID'];



if(unlink(dirname(__FILE__)."/files/".$deleteID)){
    $resultMsg =  "削除完了";
   
    $link = mysqli_connect($host,$user,$pass,$dbname);
    if(!$link){ exit("データベース接続エラー"); }

    $result = mysqli_query($link,"DELETE FROM $tbname WHERE id = $deleteID");
    if(!$result){ exit("データベース削除エラー"); }

    mysqli_close($link);

}
else{
    $resultMsg = "削除失敗";
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
        <a href="admin.php">管理画面へ戻る</a>
    </main>
    <footer>
    </footer>
</body>
</html>