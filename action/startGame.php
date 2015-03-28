<?php 
session_start();

require_once('conn.php');

$output = [];
$errors = [];
$ready = false;
$success = false;


$pID = $_SESSION['userInfo']['id'];   //Player id
$oID = $_SESSION['opponentInfo']['id']; //Opponent id                     

$gameID = $_SESSION['gameInfo']['id'];  //game id
$query = "SELECT totalPlayers, playersReady FROM game WHERE id='$gameID";
$result = mysqli_query($CONN, $query);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    
    if($row[totalPlayers] === $row[playersReady]){
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
            if($row['playerID'] === $pID){
                $_SESSION['playerStats'] = $row;
            }elseif($row['playerID'] === $oID){
                $_SESSION['opponentStats'] = $row;
            }
        }
        if(!isset($_SESSION['playerStats'] || !isset($_SESSION['opponentStats']))){
            $errors[] = "Error finding both players";
        }
    }else{
        $errors[] = "Error with query";
        $errors[] = "Query = ".$query;
    }
    
    if($errors === []){
        $player = $_SESSION['playerStats'];
        $opponent = $_SESSION['opponentStats'];
        
        $count = 0;
        while($player['health'] > 0 && $opponent['health'] > 0){
            $battleInfo['player']['diceRoll'] = rand(5, 15);
            $battleInfo['opponent']['diceRoll'] = rand(5, 15);
            
            if($battleInfo['player']['diceRoll'] > $battleInfo['opponent']['diceRoll']){
                $battleInfo['damage'] = battle($player, $opponent);
                $battleInfo['winner'] = $player['playerID'];   
            }else{
                $battleInfo['damage'] = battle($opponent, $player);
                $battleInfo['winner'] = $player['opponent']; 
            }
            $battleInfo['player'] = $player;
            $battleInfo['opponent'] = $opponent;
            
            $output['results'][$count] = $battleInfo;
            $count++;
        }
        $output['success'] = true;
    }else{
        $output['errors'] = $errors;
    }
}else{
    
}

function battle($attacker, $defender){
    $attack = $attacker['attack'] * $dice;
    
    $defender['health'] -= $attack;
    
    return $attack;
}