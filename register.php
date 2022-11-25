<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign up & Reservation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <form class="formCF" name="createAccountForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2 class="titleHeading">SIGN UP & RESERVATION</h2>
            <a>Create an account to reserve hotel rooms online</a><br>

            <label for="name">Full Name:</label><br>
            <input type="text" name="name" id="name"><br>

            <label for="email">Email Address:</label><br>
            <input type="email" name="email" id="email"><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"><br>

            <label for="password">Confirm Password:</label><br>
            <input type="password" name="cpassword" id="cpassword"><br>

            <label for="type">Type of Room:</label><br>
            <select name="type" id="type"><br>
                <option value="single">Single Bed</option>
                <option value="double">Double Bed</option>
                <option value="triple">Triple Bed</option>
                <option value="quadruple">Quadruple Bed</option>
                <option value="queen">Queen Bed</option>
                <option value="king">King Bed</option>
            </select><br>

            <label for="date">Date:</label><br>
            <input type="date" name="date" id="date"><br>

            <label for="time">Time:</label><br>
            <input type="time" name="time" id="time"><br>

            <label for="duration">Duartion of Stay:</label><br>
            <input type="date" name="duration" id="duration"><br>

            <label for="proof">Proof of Payment</label><br>
            <a>Please insert a screenshot of transactions conducted through bank or third-party payment apps.</a><br>
            <input type="file" name="proof" accept=".jpg, .jpeg, .png"><br>

            <input type="submit"  name="signUp" class="submitBtn" value="Sign Up">
            
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $server= "localhost";
                $user= "root";
                $password= "";
                $dname= "finalproj";
                $conn = mysqli_connect($server, $user, $password, $dname) or die("Error conencting to database.". mysqli_connect_error());
                
                $name = $_REQUEST['name'];
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $cpassword = $_REQUEST['cpassword'];
                $type = $_REQUEST['type'];
                $date = $_REQUEST['date'];
                $time = $_REQUEST['time'];
                $duration = $_REQUEST['duration'];
                $proof = $_REQUEST['proof'];

                $count = '00001';
                $M =  date("M");
                $d = date("d");
                $m = date("m");
                $y = date("y");
                $idname = substr($name, 0, 2);
                $idname = strtoupper($idname);
                $M = strtoupper($M);
                $idtype = substr($type, 0, 3);
                $idtype = strtoupper($idtype);
                $id = $idname . $M . $d . $m . $y . "-" . $idtype . $count;
                
                echo $id;

                // $sqlINSERT = "INSERT INTO users VALUES ('$id', '$name', '$email', '$password', '$type', '$date', '$time', '$duration', '$proof')";
                // if($password != $cpassword){
                //     echo "<script type=\"text/javascript\"> alert('Error. Password Does not Match'); </script>";
                // }else{
                //     if ($conn->query($sqlINSERT) === TRUE){
                //         echo "<script type=\"text/javascript\"> alert('Registered Successfully!'); </script>";
                //     } else {
                //         echo "Error: ".$sqlINSERT . "<br>" . $conn->error;
                //     }
                // }
                // mysqli_close($conn);
            }
        ?>
        <script src="" async defer></script>
    </body>
</html>
