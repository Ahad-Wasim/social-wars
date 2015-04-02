<?php 
session_start();
if(isset($_SESSION)){
    session_unset();
}

include('../includes/db_link.php');
include('joinGame.php');


    $success = [];

    if (isset($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql  = "SELECT * FROM users WHERE username='$username'";
        $sql .= " AND password='$password'";
        $results = mysqli_query($CONN, $sql);

        if(mysqli_num_rows($results)) {
            
            $userinfo = mysqli_fetch_array($results);
            $_SESSION['userInfo'] = $userinfo;
            $userID  = $_SESSION['userInfo']['ID'];
            $sql = "UPDATE `users` SET `status`=1 WHERE ID='$userID'";
            mysqli_query($CONN, $sql);
            
            
            //header('Location: ../index.php');
            // join game or create game if game full
            $join_results = joinGame(); 

            if($join_results['success'])
            {
                $success['loggedIn'] = true;
                $success['message'] = 'User has successfully logged in';
                $success['join'] = $join_results;
            }
            else
            {
                $success['loggedIn'] = false;
                $success['message'] = 'Create / join game failed. 1: echo "fail"; 2: goto 1';                
            }
        }
            //echo "<p>Login successful, status changed to 1</p><a href='logout.php'>Logout</a>";
        else {
            $success['loggedIn'] = false;
            $success['message'] = 'Unable to log in / Invalid username or password';
            
            die("<p>invalid username or password</p><a href='../includes/loginScreen.php'>go back to login page</a>");
        }

        echo json_encode($success);
    }


?>