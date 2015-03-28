<?php 
session_start(); 
//if(isset($_SESSION['userinfo']['status']) == '1'){
//    header('Location: ../index.php');
//}
////test. outputs registration confirm msg.
//if(isset($_SESSION['output']) > 0){
//    echo $_SESSION['output']; 
//}
?>
<section>
    <form action="../actions/login.php" method="post">
    <input name="username" type="text" placeholder="Username">
    <input name="password" type="password" placeholder="Password">
    <button type='submit'>Login</button>
    <button type='button' onclick="location.href='registerForm.php'">register</button>
    </form>
</section>