<?php
$pID = $_SESSION['userInfo']['ID'];
$output = [];
$output['success'] = false;
$gameID = $_SESSION['gameInfo']['id'];  //game id
$query = "SELECT totalPlayers, playersReady FROM game WHERE id='$gameID";
$result = mysqli_query($CONN, $query);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);

    if($row[totalPlayers] === $row[playersReady]){
        $query = "SELECT playerID FROM players WHERE gameID = $gameID";
        $result = mysqli_query($CONN, $query);

if(mysqli_num_rows($result) > 1){
    while($row = mysqli_fetch_assoc($result)){
        if($row['playerID'] != $pID){
            $_SESSION['opponentInfo'] = $row;
        }
    }
    $output['success'] = true;
    }else{
        $errors[] = "Waiting on players";
    }
}else{
    $errors[] = "Error with query";
    $errors[] = "Query = ".$query;
}
}
$output['errors'] = $errors;
echo json_encode($output);
?>


