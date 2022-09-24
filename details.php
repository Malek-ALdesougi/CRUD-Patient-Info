<?php
include 'connection.php';

if (isset($_POST['details'])) {
    $id = $_POST['theID'];
}
try {

    $sql = "SELECT * FROM Patients WHERE id ='$id'";
    $result = $connect->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    // echo "fetch done successfully";
} catch (PDOException $err) {
    echo "faild to get the row with id :" . $id . $err->getMessage();
}

// getting the data from the row 
while ($data = $result->fetch()) :

    // echo $data['id'];
    // echo $data['firstName'];
    // echo $data['Age'];
    // echo $data['homeLocation'];



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <style>
            body {
                background-color: gray;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>

    <body>

        <div class="card col-md-3">
            <img src="https://as2.ftcdn.net/v2/jpg/03/49/49/79/1000_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.jpg" class="card-img-top" alt="...">
            <div class="card-body bg-warning">
                <h5 class="card-title"> Patient Name: <?php echo $data['firstName'] ?></h5>
                <h5 class="card-title"> Patient Age: <?php echo $data['Age'] ?></h5>
                <h5 class="card-title"> Patient Address: <?php echo $data['homeLocation'] ?></h5>
                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit assumenda facere quaerat eligendi nam facilis, doloribus alias eum fugiat dolore expedita</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Estimated recovery time : 14 days</small>
            </div>
        </div>

    <?php endwhile ?>
    <!-- <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://as2.ftcdn.net/v2/jpg/03/49/49/79/1000_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" bg-warning card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div> -->
    </body>

    </html>