<?php
$passlist = array('admin' => 'password');

function login(){
    session_start();
    global $passlist;

    if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
    }
    elseif(!isset($_POST['user'])){
        echo_auth_page();
        exit;
    }
    else{
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    }

    if((!isset($passlist[$user])) || $passlist[$user] != $pass){
        echo_auth_page('パスワードが違います');
        exit;
    }

    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
}

function echo_auth_page($msg = ''){
    echo <<<EOM
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <h1>ログイン</h1>
</header>
<main>
    <form action="" method="POST">
        ID<input name="user">
        パスワード<input type="password" name="pass">
        <p id="login-msg">{$msg}</p>
        <div class="form-buttons">
            <button type="button" class="form-button" onClick="location.href='index.php'">戻る</button>
            <button type="submit" class="form-button">ログイン</button>
        </div>
    </form>
</main>
<footer>
</footer>
</body>
</html>
EOM;
}

?>