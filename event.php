<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "event";

unset($_SESSION['evname']);
unset($_SESSION['evdeadlinedate']);
unset($_SESSION['evdeadlinetime']);

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
    <title>イベント一覧</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>イベント一覧</h1>
    </header>
    <main>
    <a class="link-button1" href="event_regist.php">新規イベント登録</a>
    <div id="event-list">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <table>
            <tr>
                <th>イベント名</th>
                <td><?= $row['name']?></td>
            </tr>
            <tr>
                <th>締め切り日</th>
                <td><?= $row['deadline']?></td>
            </tr>
        </table>
        <?php endwhile;
        mysqli_free_result($result);
        ?>
    </div>
    <a class="link-button1" href="index.php">戻る</a>
    </main>
    <footer>
    </footer>
</body>
</html>