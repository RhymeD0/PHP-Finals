<?php
    session_start();

    $db = mysqli_connect("localhost","root","") or die(mysqli_error($db));
    mysqli_select_db($db,"finalproj") or die(mysqli_error($db));

    $id = $_SESSION['id'];
    $account = mysqli_query($db, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($account);
    $query = $db->query("SELECT * FROM users WHERE id");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reserve New Room</title>
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

            .textBox:last-child {
                margin-top: 1rem;
            }

            .inputBox {
                border: 3px solid #ededed;
                border-radius: 1rem;
                background: #ffffff;
                padding: 1rem;
                font-size: 1rem;
                color: #2c2c2c;
                transition: all 0.2s;
            }

            .inputBox:focus {
                outline: none;
                border: 3px solid #1a73e8;

            }

            select, option {
                width: 400px;
            }

            .inputBoxLabel {
                position: absolute;
                left: 1rem;
                color: #262626;
                pointer-events: none;
                transform: translateY(1rem);
                transition: all 0.2s;
            }

            .inputBox:focus~.inputBoxLabel,
            .inputBox:valid~.inputBoxLabel {
                transform: translate(-0.6rem, 0.2rem) scale(0.8);
                padding: 0 0.2em;
                color: #2196f3;
            }


            .changeRoomBtn {
                width: 45%;
                font-size: 1rem;
                padding: 0.7rem;
                margin: 0 0.5rem;
                border: 1px solid #336cb6;
                background-color: #336cb6;
                color: #ffffff;
                border-radius: 1rem;
            }

            .changeRoomBtn:hover {
                background-color: #ffffff;
                color: #336cb6;
                border: 1px solid #336cb6;
                transition: 0.7s all;
                cursor: pointer;
            }

            .cancelBtn {
                width: 45%;
                font-size: 1rem;
                padding: 0.7rem;
                margin: 0 0.5rem;
                border: 1px solid #000000;
                background-color: #ffffff;
                color: #000000;
                border-radius: 1rem;
            }

            .cancelBtn:hover {
                background-color: #000000;
                color: #ffffff;
                border: 1px solid #000000;
                transition: 0.7s all;
                cursor: pointer;
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
        <?php
                
            if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
            }
            if(isset($_POST['submit'])){
            $type = $_POST['type']; 
            $sql = "UPDATE users SET type='$type' WHERE id='$id'"; 
            if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $db->error;
            }
            }
            $db->close();
            
        ?>

        <div class="container">
            <form class="records-container" name="createAccountForm" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                method="post">
                <div class="heading-center">
                    <h1>CHANGE ROOM</h1>
                    <p class="heading-desc">Change to a new hotel room online.</p><br>
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


                <div class="textBox">
                    <input type="submit" name="changeRoomBtn" class="changeRoomBtn" value="Change Room">
                    <a href="reservation_client.php"> <input type="button" name="cancelBtn" class="cancelBtn"
                            value="Cancel"> </a>
                </div>
            </form>
        </div>
        <script src="" async defer></script>
    </body>
</html>
