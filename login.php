<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "finalproj";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if($data === false){
    die("connection error");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE id = '".$id."' AND password = '".$password."'";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if($row["id"] == "admin"){
        $_SESSION["id"] = $id;
        header("location:reservation_admin.php");
    }
    elseif($row["id"] != "admin"){
        $_SESSION["id"] = $id;
        header("location:reservation_client.php");
    }
    else{
        echo '<script type = "text/javascript">';
        echo 'alert("ID or Password is Incorrect");';
        echo 'window.location.href = "login.php"';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <div class="center">
    <strong><a>USER ACCOUNT</a></strong><br>
    <a>Manage your account transactions and reservations</a><br>
    <form class="formCF" name="createAccountForm" action="login.php" method="post">
        <a>Administrative ID / Transaction ID</a><br>
        <input class="inputBox" type="text" name="id" id="id" required size="30"><br>
        <a>Password</a><br>
        <input class="inputBox" type="password" name="password" id="password" required size="30"><br>
        <input type="submit"  name="submit" class="submitBtn" value="Login">
        </form>
    </div>
    </body>
</html>
        
