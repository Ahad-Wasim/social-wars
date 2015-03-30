<?php 
session_start();
require_once('../includes/db_link.php');

$output['success'] = false;
$userID = $_SESSION['userInfo']['ID'];
$gameID = $_SESSION['gameInfo']['id'];
$player = $_POST;

$player['attack'] = totalDPS($player['attack'], $player['speed'], $player['health']);
$player['health'] = totalHealth($player['health'], $player['army']);

$playerToDB = addslashes(json_encode($player));

$query = "UPDATE players SET playerObj='$playerToDB' WHERE userID='$userID' AND gameID='$gameID'";
$todos = mysqli_query($CONN, $query);

if(mysqli_affected_rows($CONN)){
    
    $query = "UPDATE game SET playerReady=(playerReady + 1) WHERE ID='$gameID'";
    mysqli_query($CONN, $query);
    if(mysqli_affected_rows($CONN)){
        $output['success'] = true;
        $output['player'] = $player;
    }else{
        $output['msgs'] = "Failed to update game db";
    }
}else{
    $output['msgs'] = "Failed to update player db";
}

echo json_encode($output);

function totalHealth($health, $army){
    if($health < 2){
        $health = 2;
    }
    
    return floor(($army * $health)/2);
}

function totalDPS($attack, $speed, $health){
    return $attack * $speed * $attack;
}
?>