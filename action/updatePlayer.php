<?php 
session_start();
require_once('../includes/db_link.php');

$army = addslashes(json_encode($_POST['player']));
$user = $_SESSION['userInfo']['ID'];
$game = $_SESSION['gameInfo']['id'];
$output['success'] = false;

$query = "UPDATE players SET playerObj='$army' WHERE userID='$user' AND gameID='$game'";
print("query = $query");

mysqli_query($CONN, $query);

if(mysqli_affected_rows($CONN)){
    $output['success'] = true;
}

echo json_encode($output);