<?php
session_start();
require_once('../includes/db_link.php');

$output['success'] = false;
$errors = [];
$gameID = $_SESSION['gameInfo']['id'];

$query = "SELECT gameOutcome FROM game WHERE ID='$gameID'";

$result = mysqli_query($CONN, $query);

if(mysqli_num_rows($result)){
    $game = mysqli_fetch_assoc($result);
    $output['results'] = json_decode($game['gameOutcome']);
    $output['success'] = true;
    
    //print_r($game);
    //print_r($output['results']);
    //-----remove later--------
    $query = "UPDATE game SET playerReady='0', status='1' WHERE ID='$gameID'";
    mysqli_query($CONN, $query);
    //--------------------------
    
}else{
    $errors[] = 'No match found or error with query';
    $errors[] = "Query: $query";
}

if(!$output['success']){
    $output['errors'] = $errors;
}

echo json_encode($output);