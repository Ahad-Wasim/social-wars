<?php session_start(); ?>
<section>
    <form action="../actions/register.php" method="post">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input name="confirm_pw" type="password" placeholder="Confirm Password">
        <button name='submit' type='submit'>Submit</button>
        <button name="cancel" type='button' onclick="location.href='loginScreen.php'">Cancel</button>
    </form>
</section>