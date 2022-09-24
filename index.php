<?php
include 'connection.php';
// require('connection.php');

try {
    $sql = "SELECT * FROM Patients"; // Fetch all data from tha patients table 
    $result = $connect->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    die("Could not connect to the database Patients" . $error->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Dashboard</title>
    <link rel="stylesheet" href="index.css"> <!-- ain't take the stylesheet -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .anchor {
            text-decoration: none;
            color: red;
        }

        .anchor:hover {
            color: darkred;
        }

        .td {
            text-align: center;
        }

        th {
            text-align: center;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .button {
            position: relative;
            right: 418px;
        }

        p {
            font-size: 16px;
            font-weight: 600;
        }
    </style>
</head>

<body style="background-color: gray;">
    <div style="width: 70%; margin-top:7vh;" id="container">
        <h1>وَإِذَا مَرِضۡتُ فَهُوَ يَشۡفِينِ (80)</h1><br>
        <h3>Patients Dashboard</h3>
        <table class="table table-bordered border-warning table-condensed">
            <form name="createPatient" action="http://localhost/cruD-Patient-Info/create.php/">
                <input type="submit" value="Add New Patient" class=" button submit btn btn-warning">
            </form>

            <thead>
                <tr>
                    <th class="col-sm-1">Patient ID</th>
                    <th class="col-sm-2">First Name</th>
                    <!-- <th>Age</th> -->
                    <!-- <th>Address</th> -->
                    <th class="col-sm-2">Details</th>
                    <th class="col-sm-2">Update</th>
                    <th class="col-sm-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']) ?></td>
                        <td><?php echo htmlspecialchars($row['firstName']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($row['Age']); ?></td> -->
                        <!-- <td><?php echo htmlspecialchars($row['homeLocation']); ?></td> -->
                        <!-- Trigger the modal with a button -->
                        <td class="td">
                            <form action="http://localhost/CRUD-Patient-Info/details.php/" method="POST">
                                <input type="hidden" name="theID" value="<?php echo $row['id'] ?>">
                                <button class="btn btn-info" type="submit" name="details" value="Show details">Show details</button>

                                <!-- <a href="http://localhost/CRUD-Patient-Info/index.php?id=<?php echo $row['id'] ?>">details</a> -->
                                <!-- <button value="More Details" name="details" style="height: 30px;" type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                </button> -->
                            </form>
                        </td>
                        <td>
                            <form action="http://localhost/CRUD-Patient-Info/update.php/?" method="POST">
                                <input type="hidden" name="userID" value="<?php echo $row['id'] ?>">
                                <input type="hidden" name="name" value="<?php echo $row['firstName'] ?>">
                                <input type="hidden" name="age" value="<?php echo $row['Age'] ?>">
                                <input type="hidden" name="location" value="<?php echo $row['homeLocation'] ?>">
                                <input style="background-color: #0275d8; border-radius:5px;" type="submit" name="indexupdate" value="Update">
                            </form>
                        </td>
                        <td class="td"><a class="anchor" href="http://localhost/CRUD-Patient-Info/delete.php/?id=<?php echo htmlspecialchars($row['id']) ?>">
                                <span class="material-symbols-outlined">delete</span></a></td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- trying to get data to push into the modal but the sumbit and button is a big problem -->
        <!-- <?php
        // if (isset($_POST['details'])) {

        //     $name = $_POST['name'];

        //     echo $name;
        //     echo "you get it finally";
        // }

        ?> -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Patient Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>


</html>