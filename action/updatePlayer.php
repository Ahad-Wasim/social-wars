<?php 
session_start();
require_once('../includes/db_link.php');

$army = $_POST['player'];
$user = 8; //$_SESSION['userInfo']['ID'];
$output['success'] = false;

$query = "UPDATE players SET playerObj='$army' WHERE userID='$user'";

mysqli_query($CONN, $query);

if(mysqli_affected_rows($CONN)){
    $output['success'] = true;
}

echo json_encode($output);