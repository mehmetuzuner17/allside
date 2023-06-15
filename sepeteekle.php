<?php

require "ayar.php";

$urunID = $_POST['urunID'];
$userID = $_POST['urunID'];
$sql = "INSERT INTO sepet( tesis_id, user_id) VALUES(".$urunID.",".$userID.")";
$result = mysqli_query($connection, $sql);
echo "OK";

?>