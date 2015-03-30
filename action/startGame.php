<?php 
session_start();

require_once('../includes/db_link.php');

$output = [];
$errors = [];
$ready = false;
$success = false;


$pID = $_SESSION['userInfo']['ID'];   //Player id
$oID = $_SESSION['opponentInfo']['userID']; //Opponent id                     

$gameID = $_SESSION['gameInfo']['id'];  //game id
$query = "SELECT totalPlayers, playerReady FROM game WHERE id='$gameID'";
$result = mysqli_query($CONN, $query);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    
    if($row['totalPlayers'] === $row['playerReady']){
        $ready = true;
    }else{
        $errors[] = "Waiting on players";
    }
}else{
    $errors[] = "Error with query";
    $errors[] = "Query = ".$query;
}

if($ready){
    $query = "SELECT * FROM players WHERE gameID = $gameID";
    $result = mysqli_query($CONN, $query);
    
    if(mysqli_num_rows($result) > 1){
        while($row = mysqli_fetch_assoc($result)){
            if($row['userID'] === $pID){
                $_SESSION['playerStats'] = $row['playerObj'];
            }elseif($row['userID'] === $oID){
                $_SESSION['opponentStats'] = $row['playerObj'];
            }
        }
        if(!isset($_SESSION['playerStats']) || !isset($_SESSION['opponentStats'])){
            $errors[] = "Error finding both players";
        }
    }else{
        $errors[] = "Error with query";
        $errors[] = "Query = ".$query;
    }
    
    if($errors === []){
        $player = (array) json_decode($_SESSION['playerStats']);
        $opponent = (array) json_decode($_SESSION['opponentStats']);
        print_r($player['health']);
        
        $count = 0;
        while($count < 100){ //$player['health'] > 0 && $opponent['health'] > 0
            $battleInfo['pdice'] = rand(5, 15);
            $battleInfo['odice'] = rand(5, 15);
            
            if($battleInfo['pdice'] > $battleInfo['odice']){
                $battleInfo['odamage'] = battle($player, $opponent, $battleInfo['pdice']);
                $battleInfo['winner'] = $player['userID'];   
            }else{
                $battleInfo['pdamage'] = battle($opponent, $player, $battleInfo['odice']);
                $battleInfo['winner'] = $opponent['userID']; 
            }
            $battleInfo['phealth'] = $player['health'];
            $battleInfo['ohealth'] = $opponent['health'];
            
            $output['results'][$count] = $battleInfo;
            $count++;
        }
        $output['success'] = true;
    }else{
        $output['errors'] = $errors;
    }
}else{
    
}

echo json_encode($output);

function battle($attacker, $defender, $dice){
    $attack = $attacker['attack'] * $dice * 10;
    
    $defender['health'] = $defender['health'] - $attack;
    
    return $attack;
}