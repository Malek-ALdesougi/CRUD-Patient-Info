<?php

$dsn = "mysql:host=localhost; dbname=PatientInfo";
$user = "root";
$pass = "root";
$db = "PatientInfo";
//create the connection ----------------------------------------
try{
    $connect = new PDO($dsn, $user, $pass);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "connection done successfully";
}
catch(PDOException $error) {
    echo "connection faild ". $error->getMessage(); 
}

//create the database ===============================================
try{
    $sql = "CREATE DATABASE if not exists PatientInfo";

    //excute the sql query
    $connect->exec($sql);
    // echo "Database created successfully";
}
catch(PDOException $e){
    echo "created faild " . $e->getMessage();
}

//create the table ===================================================
try{
$table = "CREATE TABLE IF NOT EXISTS Patients (id int, firstName VARCHAR(10), Age TINYINT(130), homeLocation VARCHAR(100))";
$connect->exec($table);
// echo "table created successfully!!";
}
catch(PDOException $err){

    echo "table faild " . $err->getMessage();
}

// adding the startups patients =========================================
// try{
// $add = "INSERT INTO Patients (firstName, Age, homeLocation) VALUES ('tom', 14, 'us-alabama')";
// $connect->exec($add);
// // echo "added done";
// }
// catch(PDOException $er){

//     echo "table faild " . $er->getMessage();
// }


// delete the redunduncy from the database wddd============================= 

// $sq = "DELETE FROM Patients WHERE firstName='finally' ";
// try{
// $connect->exec($sq);
// echo "Record deleted successfully";
// } catch(PDOException $e) {
// echo $sql . "<br>" . $e->getMessage();
// }





















?>