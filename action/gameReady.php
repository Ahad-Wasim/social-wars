<?php
session_start();
require_once('../includes/db_link.php');

$pID = $_SESSION['userInfo']['ID'];
$username = $_SESSION['userInfo']['username'];
$output['success'] = false;
$output['gameOwner'] = false; 
$gameID = $_SESSION['gameInfo']['id'];  //game id

$query = "SELECT * FROM game WHERE id='$gameID'";
$result = mysqli_query($CONN, $query);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['author'] === $username){
        $output['gameOwner'] = true;
    }

    if($row['totalPlayers'] === $row['playerReady']){
        $query = "SELECT userID, playerObj FROM players WHERE gameID='$gameID'";
        $result = mysqli_query($CONN, $query);

        if(mysqli_num_rows($result) > 1){
            while($row = mysqli_fetch_assoc($result)){
                if($row['userID'] != $pID){
                    $_SESSION['opponentInfo'] = $row;
                    $output['success'] = true;
                    $output['opponent'] = json_decode($row['playerObj']);
                }
            }
        $output['success'] = true;
        }else{
            $errors[] = "Error with query";
            $errors[] = "Query = ".$query;  
        }
    }else{
        $errors[] = "Waiting on players";
    }
}
if(!$output['success']){
    $output['errors'] = $errors;
}
echo json_encode($output);
?>