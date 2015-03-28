<?php
session_start();
include('../includes/db_link.php');

    if(isset($_SESSION)){
        $ID = $_SESSION['userinfo']['ID'];
    }
    //changes status when logging out
    $sql = "UPDATE `users` SET `status`=0 WHERE ID='$ID'";
    mysqli_query($CONN, $sql);
    session_destroy();
    header('Location: ../includes/loginScreen.php');
?>