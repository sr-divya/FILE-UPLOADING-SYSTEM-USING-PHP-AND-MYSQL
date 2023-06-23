<form action="" method="POST">
    <button type="submit" class="btn btn-outline-danger" name="logoutbtn" style="margin-left:1400px; margin-top:5px;">Logout</button><br><br>
</form>

<?php

session_start();

if(isset($_POST['logoutbtn']))
{
    unset($_SESSION['user']);
    session_destroy();
    header('location:login.php');
}

?>