<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign up & Reservation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body{
                font-family: 'Inter', sans-serif;
            }

            .container{
                position: absolute;
                left: 50%;
                top: 15%;
            }

            .heading-center{
                text-align: center;
            }

            .records-container{
                position: relative;
                top: 2%;
                left: -55%;
                bottom: 3rem;
                margin-top: 3rem;
                width: 100%;
                max-width: 500px;
                background-color: #ffffff;
                margin: 0;
                padding: 1.5rem;
                border: solid 1px #000000;
                border-radius: 1rem;
                
            }

            .heading-desc{
                font-size: 1rem;
            }

            .textBox{
                position: relative;
            }
            .textBox:last-child{
                margin-top: 1rem;
            }

            .inputBox{
                border: 3px solid #ededed;
                border-radius: 1rem;
                background: #ffffff;
                padding: 1rem;
                font-size: 1rem;
                color: #2c2c2c;
                transition: all 0.2s;
                margin-bottom: 1rem;
            }

            .inputBox:focus{
                outline: none;
                border: 3px solid #1a73e8;
                
            }

            select, option, .inputDate{
                width: 28.7rem;
            }

            .inputBoxLabel{
                position: absolute;
                left: 1rem;
                color: #262626;
                pointer-events: none;
                transform: translateY(1rem);
                transition: all 0.2s;
            }

            .inputBox:focus~.inputBoxLabel, .inputBox:valid~.inputBoxLabel{
                transform: translate(-0.6rem, 0.2rem) scale(0.8);
                padding: 0 0.2em;
                color: #2196f3;
            }


            .submitBtn{
                /* position: relative; */
                width: 100%;
                font-size: 1rem;
                padding: 0.7rem;
                margin: 0 0.5rem;
                border: 1px solid #336cb6;
                background-color: #336cb6;
                color: #ffffff;
                border-radius: 1rem;
            }

            .submitBtn:hover{
                background-color: #ffffff;
                color: #336cb6;
                border: 1px solid #336cb6;
                transition: 0.7s all;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form class="records-container" name="createAccountForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="heading-center">
                        <h1>SIGN UP & RESERVATION</h1>
                        <p class="heading-desc">Create an account to reserve hotel rooms online</p><br>
                    </div>
                    
                    <div class="textBox"> 
                        <input class="inputBox" type="text" name="fullname" id="fullname" required size="53">
                        <label class="inputBoxLabel"> Full Name</label> 
                    </div>

                    <div class="textBox"> 
                        <input class="inputBox" type="email" name="email" id="email" required size="53">
                        <label class="inputBoxLabel"> Email Address</label> 
                    </div>
            
                    <div class="textBox"> 
                        <input class="inputBox" type="password" name="password" id="password" required size="53">
                        <label class="inputBoxLabel"> Password</label> 
                    </div>
            
                    <div class="textBox"> 
                        <input class="inputBox" type="password" name="cpassword" id="cpassword" required size="53">
                        <label class="inputBoxLabel"> Confirm Password</label> 
                    </div>
            
                    <div class="textBox">
                        <select class="inputBox" name="type" id="type">
                            <option value="Standard">Standard</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Executive">Executive Suite</option>
                            <option value="Presidential">Presidential Suite</option>
                        </select>
                        <label class="inputBoxLabel">Type of Room</label>
                    </div>
                    <?php
                    // $Date = date('Y-m-d H:i', strtotime(' + 2 days'));
                    ?>
                    <div class="textBox">
                        <input type="datetime-local" name="date" id="date" class="inputBox inputDate"
                            min="<?= $Date = date('Y-m-d H:i', strtotime(' + 2 days'));?>">
                        <label class="inputBoxLabel">Start of Reservation:</label>
                    </div>
                    
                    <div class="textBox">
                        <input type="datetime-local" name="duration" id="duration" class="inputBox inputDate"
                            min="<?= date('Y-m-d H:i', strtotime($Date. ' + 1 days'));?>" >
                        <label class="inputBoxLabel">End of Reservation:</label>
                    </div>
            
                    <div class="textBox">
                        <input type="submit" class="submitBtn" value="Sign Up">
                    </div>
                </div>
            </form>
        </div>
        
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
                $duration = $_REQUEST['duration'];

                $status = "Pending";
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

                // $sqlINSERT = "INSERT INTO users VALUES ('$id', '$name', '$email', '$password', '$type', '$date', '$status', '$duration')";
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
