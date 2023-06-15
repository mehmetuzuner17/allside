<?php 


session_start();
require "ayar.php";
require "functions.php";

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id']; 
    deleteurun($id);    
}else{
    $userID = $_REQUEST['userID'];
    $urunID = $_REQUEST['urunID'];

    $query = "SELECT id FROM sepet WHERE user_id=$userID AND urun_id = $urunID";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    deleteurun($row['id']);  
}


header("Location:cart.php");


mysqli_close($connection);

?>