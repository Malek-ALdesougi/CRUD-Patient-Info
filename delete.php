<?php
// require_once 'connection.php';

include('connection.php');


if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    try{
        $delete = "DELETE FROM Patients WHERE id = $id";
        
        $connect->exec($delete);
        // echo "record deleted successfully";

        //redirect the page 
        header("Location: http://localhost/CRUD-Patient-Info/index.php/index.php?");
        exit();
    }
    catch(PDOException $r){

        echo "no" . $r->getMessage();
    }

}
