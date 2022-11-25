<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reserve New Room</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="">Cancel</a>
            
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $server= "localhost";
                $user= "root";
                $password= "";
                $dname= "finalproj";
                $conn = mysqli_connect($server, $user, $password, $dname) or die("Error conencting to database.". mysqli_connect_error());
                
                $fname = $_REQUEST['fname'];
                $mname = $_REQUEST['mname'];
                $lname = $_REQUEST['lname'];
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $cpassword = $_REQUEST['cpassword'];
                $bday = $_REQUEST['bday'];
                $email = $_REQUEST['email'];
                $contact = $_REQUEST['contact'];
                $accesslevel = $_REQUEST['accesslevel'];
                $status = $_REQUEST['status'];

                $sqlINSERT = "INSERT INTO users VALUES (' ', '$fname', '$mname', '$lname', '$contact', '$email', '$bday', '$username', '$password', '$accesslevel', '$status', ' ')";
                if($password != $cpassword){
                    echo "<script type=\"text/javascript\"> alert('Error. Password Does not Match'); </script>";
                }else{
                    if ($conn->query($sqlINSERT) === TRUE){
                        echo "<script type=\"text/javascript\"> alert('New record created successfully!'); </script>";
                    } else {
                        echo "Error: ".$sqlINSERT . "<br>" . $conn->error;
                    }
                }
                

                mysqli_close($conn);
            }
        
        ?>
        
        <script src="" async defer></script>
    </body>
</html>