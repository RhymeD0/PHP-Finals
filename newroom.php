<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reserve New Room</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <form class="formCF" name="createAccountForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2 class="titleHeading">RESERVE NEW ROOM</h2>
            <a>Reserve a new hotem room online.</a><br>
            <a>Type of Room:</a><br>
            <select name="type" id="type"><br>
                <option value="single">Single Bed</option>
                <option value="double">Double Bed</option>
                <option value="triple">Triple Bed</option>
                <option value="quadruple">Quadruple Bed</option>
                <option value="queen">Queen Bed</option>
                <option value="king">King Bed</option>
            </select><br>
            <a>Date:</a><br>
            <input type="date" name="date" id="date"><br>
            <a>Time:</a><br>
            <input type="time" name="email" id="email"><br>
            <a>Duartion of Stay:</a><br>
            <input type="time" name="duration" id="duration"><br>
            <label for="proof">Proof of Payment</label><br>
            <a>Please insert a screenshot of transactions conducted through bank or third-party payment apps.</a><br>
            <input type="file" name="proof" accept=".jpg, .jpeg, .png"><br>
            <input type="submit"  name="signUp" class="submitBtn" value="Sign Up">
            <a href="reservation_client.php">Cancel</a>
            
        </form>
        <?php
        ?>
        <script src="" async defer></script>
    </body>
</html>