<?php
session_start();
require_once('../includes/db_link.php');
//input: 
//return: opponents armys
if(!isset($_SESSION['userInfo']['ID']))
{
    echo json_encode(['success'=>false,'error_msg'=>['No user logged in']]);
    exit();
}
if(!isset($_SESSION['gameInfo']['id']))
{
    echo json_encode(['success'=>false,'error_msg'=>['Player is not in a game session']]);
    exit();
}
$game_id = $_SESSION['gameInfo']['id'];
$user_id = $_SESSION['userInfo']['ID'];
$query = "SELECT p.userID, p.playerObj, p.position, u.username 
            FROM players AS p 
            JOIN users AS u ON p.userID = u.ID
            WHERE p.gameID=$game_id AND p.userID<>$user_id AND p.playerObj<>'NULL'";
//print $query;
$result = mysqli_query($CONN, $query);
$players = mysqli_num_rows($result);
if($players>0)
{
    $player_roster = [];
    while($row = mysqli_fetch_assoc($result))
    {
        $player_roster[]= 
            ['playerObj'=>json_decode($row['playerObj'],true),
             'position'=>$row['playerObj'],
             'username'=>$row['playerObj'],
            ];
    }
//print("<pre>").print_r($player_roster).print("</pre>");;
    echo json_encode(['success'=>true,'roster'=>$player_roster,'messages'=>$players,'player'=>$player_roster[0]]);
    exit();
}
else
{
    echo json_encode(['success'=>false,'error'=>['no players are ready']]);
    exit();
}
?>