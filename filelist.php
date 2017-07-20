<?php
header("Content-Type: text/html; charset=UTF-8");
$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "production";

$link = mysqli_connect($host,$user,$pass,$dbname);
if(!$link){ exit("データベース接続エラー"); }

$result = mysqli_query($link,"SELECT * FROM $tbname");
if(!$result){ exit("データベース取得エラー"); }
    
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイル一覧</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>ファイル一覧</h1>
    </header>
<main>
<div id="file-list">
<?php while($row = mysqli_fetch_assoc($result)):?>
    <table>
        <tr>
            <th>タイトル</th>
            <td><?= $row['title'] ?></td>
        </tr>
        <tr>
            <th>作者</th>
            <td><?= $row['author']  ?></td>
        </tr>
        <tr>
            <th>DL</th>
            <td><a href="download.php?fpath=files/<?= $row['id'] ?>&fname=<?= $row['filename'] ?>"><?= $row['filename'] ?></a></td>
        </tr>
        <tr>
            <th>説明</th>
            <td><?= $row['comment'] ?></td>
        </tr>
    </table>
<?php endwhile;
mysqli_free_result($result);
?>
</div>
</main>
<a class="link-button1" href="index.php">戻る</a>
<footer>
</footer>
<script>
    /*
    var tb = document.querySelectorAll('table');
    if(tb.length % 2 != 0){
        document.getElementById("file-list").appendChild(document.createElement('table'));
    }
    */
</script>
</body>
</html>