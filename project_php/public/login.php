<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {

        $error = "Username dan Password wajib diisi!";

    } 
    elseif ($username == "admin" && $password == "12345") {

        $_SESSION['login'] = true;
        $_SESSION['username'] = "admin";
        $_SESSION['role'] = "admin";

        header("Location: index.php");
        exit;

    }
    elseif ($username == "owner" && $password == "67890") {

        $_SESSION['login'] = true;
        $_SESSION['username'] = "owner";
        $_SESSION['role'] = "owner";

        header("Location: index.php");
        exit;

    } 
    else {

        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Toko ATK Ummu</title>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

<style>
body{
    margin:0;
    padding:0;
    font-family:'Poppins';
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(to right, #fff8f9, #faf9ee);
    overflow:hidden;
    position:relative;
}

body::before{
    content:"";
    position:absolute;
    width:300px;
    height:300px;
    background:#ffd0d6;
    border-radius:50%;
    top:-100px;
    left:-100px;
    opacity:0.4;
}

body::after{
    content:"";
    position:absolute;
    width:350px;
    height:350px;
    background:#b8e3ec;
    border-radius:50%;
    bottom:-120px;
    right:-120px;
    opacity:0.4;
}

.login-box{
    width:360px;
    background:rgba(255,255,255,0.9);
    backdrop-filter:blur(8px);
    padding:35px;
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    animation:fadeIn 0.6s ease;
}

h2{
    text-align:center;
    color:#343f21;
    margin-bottom:30px;
}

.input-box{
    margin-bottom:20px;
}

.input-box label{
    display:block;
    margin-bottom:8px;
    color:#343f21;
    font-size:14px;
}

.input-box input{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:12px;
    outline:none;
    font-family:'Poppins';
    transition:0.3s;
}

.input-box input:focus{
    border-color:#207487;
    box-shadow:0 0 8px rgba(32,116,135,0.2);
}

.btn-login{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:#207487;
    color:white;
    font-size:15px;
    font-weight:500;
    cursor:pointer;
    transition:0.3s;
    font-family:'Poppins';
}

.btn-login:hover{
    background:#145563;
    transform:translateY(-2px);
}

.error{
    background:#ffd6d6;
    color:#a10000;
    padding:10px;
    border-radius:10px;
    margin-bottom:18px;
    text-align:center;
    font-size:14px;
}

.decor1,
.decor2,
.decor3{
    position:absolute;
    font-size:28px;
    opacity:0.4;
}

.decor1{
    top:120px;
    right:220px;
}

.decor2{
    bottom:140px;
    left:160px;
}

.decor3{
    top:280px;
    left:120px;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(15px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}
</style>
</head>

<body>

<div class="decor1">✦</div>
<div class="decor2">♡</div>
<div class="decor3">✿</div>

<div class="login-box">

    <h2>Login</h2>

    <?php if($error != "") : ?>
        <div class="error">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="input-box">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button type="submit" name="login" class="btn-login">
            Login
        </button>

    </form>

</div>

</body>
</html>