<?php 
session_start();
require_once('../includes/db_link.php');

//$player = addslashes(json_encode($_POST['player']));
$player = $_POST['player'];
$user = $_SESSION['userInfo']['ID'];
$game = $_SESSION['gameInfo']['id'];
$output['success'] = false;

$player['position'] = $_SESSION['gameInfo']['position'];
$player['userID'] = $_SESSION['userInfo']['ID'];

$playerToDB = addslashes(json_encode($player));

$query = "UPDATE players SET playerObj='$playerToDB' WHERE userID='$user' AND gameID='$game'";
//print("query = $query");

mysqli_query($CONN, $query);

if(mysqli_affected_rows($CONN)){
    $output['success'] = true;
    $output['player'] = $player;
}

echo json_encode($output);