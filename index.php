<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

$host = "localhost";
$user = "root";
$pass = "dbpass";
$dbname = "uploader";
$tbname = "event";


$link = mysqli_connect($host,$user,$pass,$dbname);
if(!$link){ exit("データベース接続エラー"); }

$result = mysqli_query($link,"SELECT * FROM $tbname WHERE deadline > NOW() AND deadline < DATE_ADD(NOW(),INTERVAL 1 WEEK)");
if(!$result){ exit("データベース取得エラー"); }

mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC作品アップローダー</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <h1>DC作品アップローダー</h1>
    </header>
    <main>
    <div class="buttons">
        <a class="link-button1" href="upload.php">アップロード</a>
        <a class="link-button1" href="filelist.php">ファイル一覧</a>
        <a class="link-button1" href="event.php">イベント一覧・登録</a>
    </div>
    <div>
        <p>締め切りの近いイベント</p>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <table>
            <tr>
                <th>イベント名</th>
                <td><?= $row['name']?></td>
            </tr>
            <tr>
                <th>締め切り日</th>
                <td class="nearDeadline"><?= $row['deadline']?></td>
            </tr>
        </table>
        <?php endwhile;
        mysqli_free_result($result);
        ?>
    </div>
    </main>
    <footer>
        <a href="admin.php" class="footer-link">管理画面</a>
    </footer>
</body>
</html>