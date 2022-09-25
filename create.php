<?php

use function PHPSTORM_META\type;

include('connection.php');

if (isset($_POST['submit'])) {
    $name = $_POST['firstname'];
    $age = $_POST['age'];
    $location = $_POST['location'];

    try {
        $sql = "INSERT INTO  Patients (firstName, Age, homeLocation) VALUES ( '$name', '$age', '$location' )";
        $connect->exec($sql);
        echo "data inserted to the database successfully";
    } catch (PDOException $error) {
        echo " faild insertion to the database" . $error->getMessage();
    }

    header('Location: http://localhost/CRUD-Patient-Info/index.php/');
    exit();
}

//back to dashboard button 
if(isset($_POST['back'])){

    header("Location: http://localhost/CRUD-Patient-Info/index.php/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body style="background-color:gray">

    <div style=" margin-top:150px; width:30%;" class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <fieldset>
                <legend style="color:#f0ad4e; font-weight:700; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Add New Patient</legend>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input name="firstname" type="text" class="form-control" id="firstname">
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input name="age" type="number" class="form-control" id="age">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input name="location" type="text" class="form-control" id="location">
                </div>

                <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                <input style="margin-left:153px;" type="submit" name="back" class="btn btn-warning" value="Back To Dashboard">

                <!-- <form method="POST" action="index.php"> -->
                    <!-- <a href="http://localhost/CRUD-Patient-Info/index.php/create.php?"> -->
                        <!-- <button>Click Me</button> -->
                    <!-- </a> -->
                    <!-- <input type="submit" name="back" value="Back To Dashboard"> -->
                <!-- </form> -->

            </fieldset>
        </form>
    </div>

</body>

</html>