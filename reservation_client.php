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
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <?php
        echo "<b>CLIENT NAME: </b>";
        echo $row["name"];
        echo "<br><b>Transaction ID: </b>";
        echo $row["id"];
        echo "<br><b>Reservation Details:</b>";
        ?>
        <table class="table">
                <thead>
                    <tr class="label">
                        <th width="10%">Reservation Count</th>
                        <th width="10%">Type of Room</th>
                        <th width="10%">Date of Reservation</th>
                        <th width="10%">Time of Reservation</th>
                        <th width="10%">Reservation Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM users WHERE id = '".$id."'";
                        $query_run = mysqli_query($db, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                            foreach($query_run as $row) {
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['type']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['time']; ?></td>
                        <td><?= $row['status']; ?></td>
                    </tr>
                    <?php
                    }
                    } else {
                    ?>
                    <tr>
                        <td colspan="10">No record Found</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        <a href="newroom.php">Reserve</a>
        <a href="logout.php">Logout</a>

        <script src="" async defer></script>
    </body>
</html>
