<?php

include('connection.php');
include('inc/header.php');
error_reporting(0);
session_start();

if(isset($_POST['logoutbtn']))
{
    header('location:dashboard.php');
}


?>

<h2 style="text-decoration:underline;">Upload Videos</h2><br><br>
<form action="#" method="POST" enctype="multipart/form-data">
    <button type="submit" name="logoutbtn" class="btn btn-outline-danger" style="margin-left:1400px;">Log Out</button>
    <input type="file" name="video" id=""><br><br>
    <button type="submit" name="uploadbtn" class="btn btn-outline-primary">Upload</button><br><br>

</form>

<?php
$email=$_SESSION['user'];

if(isset($_POST['uploadbtn']))
{
    $filename=$_FILES["video"]["name"];
    $tempname=$_FILES["video"]["tmp_name"];
    $folder="upload/".$filename;
    $filesize=$_FILES["video"]["size"];
    $fileext=end(explode('.',$_FILES["video"]["name"]));
    $extension=array("mp4");


    if($filename=='')
    {
        echo "<h4>*Please select a file first</h4>";
    }

    else if($filesize>20000000)
    {
        echo "<h4>*file size must be smaller than 20 MB !</h4>";

    }

    else if(in_array($fileext,$extension)===false)
    {
        echo "<h4>*file extension must be mp4</h4>";

    }
    else
    {
        move_uploaded_file($tempname,$folder);

        $query="insert into `videos`(Video_src,Email) values ('$folder','$email')";

        $result=mysqli_query($conn,$query);
        if($result)
        {
            echo "<h4>File Uploaded Successfully..</h4>";
        }
        else{
            echo "<h4>*Error Occured!</h4>";

        }
    }
}
?>

<?php

$q="select Video_src from videos where Email='$email'";
$res=mysqli_query($conn,$q);
?>

<div class="container mt-4">
    <h1 class="text-center text-danger">Latest Videos</h1>
    <hr style="height: 10px; opacity: 1; background-color: yellow;">
    <div class="row d-flex justify-content-center">

    <?php

if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {

        ?>
        <div class="col-sm-3 m-3">
            <div class="card" style="width:18rem;">
        <video width="100%" src="<?php echo $row['Video_src']; ?>" height="200px" controls>
            
        </video>
    </div>
    </div>

        <?php
    }
}
else{
    echo "<h2>No Data Found...</h2>";
}
?>

</div>
    </div>