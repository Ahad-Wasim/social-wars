<?php

function joinGame() 
{
    global $CONN;
    global $userID;

    $results = ["success"=>false,
               "data"=>null,
               "message"=>""];

//    if (isset($_POST)){
        // grab first open game
    $sql = "SELECT * FROM game WHERE status = 0 LIMIT 1";
        
    $result = mysqli_query($CONN, $sql);
        
    $foundGame = false;
        
    $gameRow = mysqli_fetch_assoc($result);
    
    $gameID = $gameRow['ID'];
        // join game
    if ($gameRow) {
            //game exists
            
        if(insertPlayerInGame($gameID)){
            $gameSql2 = "UPDATE game SET status = 1 WHERE maxPlayers = totalPlayers";
            
                // update rows in game table where maxplayers equals totalplayers
            mysqli_query($CONN, $gameSql2);
        }
            
    $results['success'] = true;
    }else{
        if(createGame()) {
            return(joinGame());
        }else{
            $results['success'] = false;
            $results['message'] = 'Unable to create game';
        }
    }
    
    if($results['success']){
        $query = "SELECT gameID AS id FROM players  
                WHERE userID='$userID'";
        $result = mysqli_query($CONN, $query);
        $_SESSION['gameInfo'] = mysqli_fetch_assoc($result);
    
    }
    return $results;
}
    
    function insertPlayerInGame($gameID){
        global $CONN;
        global $userID;
        
        $r = false;
         $playerSql = "INSERT INTO players (userID, gameID) VALUES ('$userID', '$gameID')";
         $results = mysqli_query($CONN, $playerSql);
        
         if(mysqli_affected_rows($CONN) > 0){
            $update_player_numer_in_game_sql = "UPDATE game SET totalPlayers = (totalPlayers + 1) WHERE ID =" . $gameID;
                
            $update_total_result = mysqli_query($CONN, $update_player_numer_in_game_sql);
            if (mysqli_affected_rows($CONN) === 1) {
                $r = true;
            }
        }

        return $r;
    }
    
    function createGame(){
        global $CONN;

        $time = time();
        $author = $_SESSION['userInfo']['username'];
        
        $newGame = "INSERT INTO game  (created, author) VALUES ('$time', '$author')";
        mysqli_query($CONN, $newGame);
        if(mysqli_affected_rows($CONN)){
            return true;
        }
        return false;
    }
?>