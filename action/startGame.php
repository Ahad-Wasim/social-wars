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
                $_SESSION['playerStats'] = ($row['playerObj']);
            }elseif($row['userID'] === $oID){
                $_SESSION['opponentStats'] = ($row['playerObj']);
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
        //print('Session');
        //print_r($_SESSION);
        
        $player = (array) json_decode($_SESSION['playerStats']);
        $opponent = (array) json_decode($_SESSION['opponentStats']);
        
        //print('Player');
        //print_r($player);
        //print('Opponent');
        //print_r($opponent);
        
        $count = 0;
        while($player['health'] > 0 && $opponent['health'] > 0){
            do{
                $battleInfo['pdice'] = rand(5, 15);
                $battleInfo['odice'] = rand(5, 15);
            }while($battleInfo['pdice'] === $battleInfo['odice']);
            
            if($battleInfo['pdice'] > $battleInfo['odice']){
                $battleInfo['damage'] = battle($player, $opponent, $battleInfo['pdice']);
                $battleInfo['winner'] = $player['userID'];
                $opponent['health'] -= $battleInfo['damage'];
            }else{
                $battleInfo['damage'] = battle($opponent, $player, $battleInfo['odice']);
                $battleInfo['winner'] = $opponent['userID'];
                $player['health'] -= $battleInfo['damage'];
            }
            $battleInfo['phealth'] = $player['health'];
            $battleInfo['ohealth'] = $opponent['health'];
            $battleInfo['round'] = $count;
            
            $output['results'][$count] = $battleInfo;
            $battleInfo = [];
            $count++;
        }
        if($player['health'] > $opponent['health']){
            $output['winner'] = $player['userID'];
        }else{
            $output['winner'] = $opponent['userID'];
        }
        $output['success'] = true;
        
        $resultToDB = json_encode($output['results']);
        
        $query = "UPDATE game SET status=3, gameOutcome='$resultToDB' WHERE ID='$gameID'";
        mysqli_query($CONN, $query);
        
        if(mysqli_affected_rows($CONN)){
            $output['gameClosed'] = "Game saved and closed";
        }
        
    }else{
        $output['errors'] = $errors;
    }
}else{
    $output['msg'] = 'FAIL';
}

echo json_encode($output);

function battle($attacker, $defender, $dice){
    $attack = $attacker['attack'] * $dice * 40;
    
    //$defender['health'] = $defender['health'] - $attack;
    
    return $attack;
}