<?php
require_once('includes/db_link.php');
//input: 
//return: opponents armys
if(!isset($_SESSION['userInfo']['id']))
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
$user_id = $_SESSION['userInfo']['id'];
$query = "SELECT p.userID, p.playerObj, p.position, u.username 
            FROM players AS p 
            JOIN users AS u ON p.userID = u.ID
            WHERE userID=$user_id";
$result = mysqli_query($CONN, $query);
$players = mysqli_num_rows($query);
if($players>0)
{
    $player_roster = [];
    while($row = mysqli_fetch_assoc($result))
    {
        $player_roster[$row['userID']] = 
            ['playerObj'=>$row['playerObj'],
             'position'=>$row['playerObj'],
             'username'=>$row['playerObj'],
            ];
    }
    echo json_encode(['success'=>true,'roster'=>$player_roster,'messages'=>$players]);
    exit();
}
else
{
    echo json_encode(['success'=>false,'error'=>['no players are ready']]);
    exit();
}
?>