<?php 
session_start();
require_once('../includes/db_link.php');

$userID = 8;//$_SESSION['userInfo']['ID'];
$health = $_POST['health'];
$speed = $_POST['speed'];
$attack = $_POST['attack'];
$army = $_POST['army'];

$totalHealth = totalHealth($health, $army);
$totalDPS($attack, $speed);

$query = "INSERT INTO players (health, attack, army) VALUES ('$health', '$attack', '$army') WHERE userID='$userID'";
$todos = mysqli_query($CONN, $query);

if(mysqli_affected_rows($CONN)){
    $output['success'] = true;
}else{
    $output['success'] = false;
}

echo json_encode($output);

function totalHealth($health, $army){
    return $army * $health;
}

function totalDPS($attack, $speed){
    return $attack * $speed;
}
?>