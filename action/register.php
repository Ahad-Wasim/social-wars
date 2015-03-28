<?php
session_start();
require('../includes/db_link.php');
$output = [];
$errors = [];

    if(isset($_POST)){
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $confirm_pw = $_POST['confirm_pw'];

        if($username == '') {
            $errors['username'] = 'username is blank';
        }
        if($password == '') {
            $errors['password'] = 'no password entered';
        }
        if($confirm_pw == '' || $confirm_pw !== $password){
            $errors['confirm_pw'] = 'no confirmation was entered or passwords do not match';
        }
        
        if(count($errors) == 0) {

            $sql    = "INSERT INTO `users`(`username`, `password`)";
            $sql   .= "VALUES ('$username', '$password')";
            $result = mysqli_query($CONN, $sql);
            
            if(mysqli_affected_rows($CONN) > 0) {
                $output['success']  = true;
                $_SESSION['output'] = $output['message'] = 'registration complete';
                header('Location: ../includes/loginScreen.php');
            } else {

                $output['success']  = false;
                $_SESSION['output'] = $output['message'] = 'registration failed!';
            }
        } else {
            $output['success']  = false;
            $_SESSION['output'] = $output['message'] = 'fill out the form';
            $output['error']    = $errors;
        }
            header('Location: ../includes/loginScreen.php');
    }

?>