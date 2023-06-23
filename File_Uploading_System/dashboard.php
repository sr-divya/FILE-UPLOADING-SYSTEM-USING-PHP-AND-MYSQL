<?php

include('inc/header.php');
include('logout.php');
// session_start();
if(!isset($_SESSION['user']))
{
    header('location:login.php');
}
// else{
//     header('location:dashboard.php');
// }

?>

<div class="container d-flex justify-content-center">
    <div  style="height:500px; width:500px; margin-top:50px; " class="bg-light">
        <div class="px-5 py-3   text-center bg-primary text-white">
            <h1>Upload</h1>
        </div>


<form action="" method="POST">
    <div class="mx-5 my-5">
        <button class="btn btn-outline-primary btn-lg" name="documentbtn">Documents</button>
    </div>

    <div class="mx-5 my-5">
        <button class="btn btn-outline-success btn-lg" name="musicbtn">Music</button>
    </div>

    <div class="mx-5 my-5">
        <button class="btn btn-outline-warning btn-lg" name="photosbtn">Photos</button>
    </div>

    <div class="mx-5 my-5">
        <button class="btn btn-outline-danger btn-lg" name="videosbtn">Videos</button>
    </div>

</form>
</div>

<?php

include('inc/footer.php');

?>

<?php
if(isset($_POST['documentbtn']))
{
    header('location:document.php');
}
?>

<?php
if(isset($_POST['musicbtn']))
{
    header('location:music.php');
}
?>

<?php
if(isset($_POST['photosbtn']))
{
    header('location:photos.php');
}
?>

<?php
if(isset($_POST['videosbtn']))
{
    header('location:videos.php');
}
?>



