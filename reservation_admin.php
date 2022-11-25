<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <style>
            .table{
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }
            .table td {
            padding: 12px 15px;
            }
            .table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
            }
        </style>
    </head>
    <body>
        <h1>ROOMS AVAILABLE: </h1>
        <h4>Single</h4>
        <h4>Double</h4>
        <h4>Triple</h4>
        <h4>Quadruple</h4>
        <h4>Queen</h4>
        <h4>King</h4>

        <h2>Confirmed Reservation: </h2>
            <table class="table">
                <thead>
                    <tr class="label">
                        <th width="10%">Reservation ID</th>
                        <th width="10%">Type of Room</th>
                        <th width="10%">Date of Reservation</th>
                        <th width="10%">Time of Reservation</th>
                        <th width="10%">Reservation Status</th>
                        <th width="15%">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect("localhost","root","") or die(mysqli_error($db));
                        mysqli_select_db($db,"finalproj") or die(mysqli_error($db));

                        $query = "SELECT * FROM users";
                        $query_run = mysqli_query($db, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                            foreach($query_run as $row) {
                            
                            if($row["status"] == "Confirmed"){
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['type']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['time']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <a href="">Change</a>
                            <a href="">Cancel</a>
                        </td>
                    </tr>
                    <?php
                    }
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

        <h2>Pending Reservation:</h2>
        <table class="table">
                <thead>
                    <tr class="label">
                        <th width="10%">Reservation ID</th>
                        <th width="10%">Type of Room</th>
                        <th width="10%">Date of Reservation</th>
                        <th width="10%">Time of Reservation</th>
                        <th width="10%">Reservation Status</th>
                        <th width="15%">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect("localhost","root","") or die(mysqli_error($db));
                        mysqli_select_db($db,"finalproj") or die(mysqli_error($db));

                        $query = "SELECT * FROM users";
                        $query_run = mysqli_query($db, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                            foreach($query_run as $row) {
                            
                            if($row["status"] != "Confirmed"){
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['type']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['time']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <a href="">Change</a>
                            <a href="">Cancel</a>
                        </td>
                    </tr>
                    <?php
                    }
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
            <a href="logout.php">Logout</a>
        <script src="" async defer></script>
    </body>
</html>
