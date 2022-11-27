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
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .container {
            position: absolute;
            left: 50%;
            top: 15%;
        }

        .heading-center {
            text-align: center;
        }

        .records-container {
            position: relative;
            left: -50%;
            margin-top: 3rem;
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            margin: 0;
            padding: 1.5rem;
            border: solid 1px #000000;
            border-radius: .5rem;

        }

        .heading-desc {
            font-size: 1rem;
        }

        .textBox {
            position: relative;
        }

        .inputBox {
            border: 3px solid #ededed;
            border-radius: 1rem;
            background: #ffffff;
            padding: 1rem;
            font-size: 1rem;
            color: #2c2c2c;
            transition: all 0.2s;
            margin-bottom: 1rem;
        }

        .inputBox:focus {
            outline: none;
            border: 3px solid #1a73e8;

        }

        .inputBoxLabel {
            position: absolute;
            left: 1rem;
            color: #262626;
            pointer-events: none;
            transform: translateY(1rem);
            transition: all 0.2s;
        }

        .inputBoxLabel2 {
            position: absolute;
            left: 1rem;
            color: #262626;
            pointer-events: none;
            transform: translateY(1rem);
            transition: all 0.2s;
        }

        .inputBox:focus~.inputBoxLabel,
        .inputBox:valid~.inputBoxLabel {
            transform: translate(-1.3rem, 0.2rem) scale(0.8);
            padding: 0 0.2em;
            color: #2196f3;
        }

        .inputBox:focus~.inputBoxLabel2,
        .inputBox:valid~.inputBoxLabel2 {
            transform: translate(-0.3rem, 0.2rem) scale(0.8);
            padding: 0 0.2em;
            color: #2196f3;
        }

        .submitBtn {
            position: relative;
            width: 100%;
            font-size: 1rem;
            padding: 0.5rem;
            border: 1px solid #336cb6;
            background-color: #336cb6;
            color: #ffffff;
            border-radius: 1rem;
        }

        .submitBtn:hover {
            background-color: #ffffff;
            color: #336cb6;
            border: 1px solid #336cb6;
            transition: 0.7s all;
        }

        a:link {
            font-size: 0.9rem;
            color: #336cb6;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="records-container" name="createAccountForm" action="login.php" method="post">
            <div class="heading-center">
                <h1>USER ACCOUNT</h1>
                <p class="heading-desc">Manage your account transactions and reservations </p>
            </div>

            <div class="textBox">
                <input class="inputBox" type="text" name="id" id="id" required size="40">
                <label class="inputBoxLabel"> Administrative ID / Transaction Id </label>
            </div>

            <div class="textBox">
                <input class="inputBox" type="password" name="password" id="password" required size="40">
                <label class="inputBoxLabel2"> Password </label>
            </div>

            <div class="textBox">
                <a href="register.php"> &nbsp Don't have an account yet? Register now!</a> <br /> <br />
                <input type="submit" name="submit" class="submitBtn" value="Login">
            </div>
        </form>
    </div>

    <script src="" async defer></script>
</body>

</html>
