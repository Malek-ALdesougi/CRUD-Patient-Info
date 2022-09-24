<?php

include 'connection.php';
//getting the row data to put them as placeholders before updating 
if (isset($_POST['indexupdate'])) {
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $location = $_POST['location'];    
}

// update the database row based on the id 
// by putting the new values after clicked the update button
if (isset($_POST['update'])) {

    try{
    $id = $_POST['id']; // get the id from the index.php form 
    $newName = $_POST['newname'];
    $newAge = $_POST['newage'];
    $newLoaction = $_POST['newlocation'];

    $sql = "UPDATE Patients SET firstName = '$newName', Age = '$newAge', homeLocation = '$newLoaction' WHERE id='$id'";
    $connect->exec($sql);
    // echo "record updated successfully";
    }
    catch(PDOException $error){

        echo "update faild :" . $error->getMessage();
    }

    header("Location:http://localhost/CRUD-Patient-Info/index.php/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update info</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
</head>

<body style="background-color: gray; height:100vh; display:flex; justify-content:center; align-items:center">

    <form style="text-align:center;" action="#" method="POST">
        <fieldset style="width:300px; height:200px;">
            <input type="hidden" name="id" value="<?php echo $userID ?>">
            <legend style="color:darkorange">Update Information</legend>
            <label for="firstname">First Name</label>
            <input name="newname" style="margin-bottom:20px;margin-top:20px;" type="text" placeholder="<?php echo $name ?>" id="firstname"><br>

            <label for="age">Age</label>
            <input name="newage" style="margin-left:45px; margin-bottom:20px;" type="number" placeholder="<?php echo $age ?>" id="age"><br>

            <label for="location">Location</label>
            <input name="newlocation" style="margin-bottom:20px;margin-left:15px;" type="text" placeholder="<?php echo $location ?>" id="firstname"><br>


            <input style="background-color:#0275d8; margin-right:35px; cursor:pointer; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; border-radius:5px;"  type="submit" value="Update" name="update">
        </fieldset>
    </form>
</body>

</html>