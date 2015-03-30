<?php 
session_start();
require_once('../includes/db_link.php');

//$player = addslashes(json_encode($_POST['player']));
$player = $_POST;
$user = $_SESSION['userInfo']['ID'];
$game = $_SESSION['gameInfo']['id'];
$output['success'] = false;

print_r($player['player']['army']);

//$query = "UPDATE players SET playerObj='$player' WHERE userID='$user' AND gameID='$game'";
print("query = $query");

mysqli_query($CONN, $query);

if(mysqli_affected_rows($CONN)){
    $output['success'] = true;
}

echo json_encode($output);