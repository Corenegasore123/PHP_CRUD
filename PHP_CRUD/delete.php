<?php
if( isset($_GET["id"])){
    $id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$db = "myshop";

$db_conn = new mysqli($servername, $username, $password, $db);

$sql = "DELETE FROM clients WHERE id=$id";
$db_conn->query($sql);
}

header("location: index.php");
exit;
?>