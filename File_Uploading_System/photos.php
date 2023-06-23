<?php

include('inc/header.php');
include('connection.php');
error_reporting(0);
session_start();

if(isset($_POST['logoutbtn']))
{
    header('location:dashboard.php');
}
?>

<h2 style="text-decoration:underline;">Upload Photos</h2><br><br>
<form action="#" method="POST" enctype="multipart/form-data">
    <button type="submit" name="logoutbtn" class="btn btn-outline-danger" style="margin-left:1400px;">Log Out</button>
    <input type="file" name="photo" id=""><br><br>
    <button type="submit" name="uploadbtn" class="btn btn-outline-primary">Upload</button><br><br>

</form>



<?php

$email=$_SESSION['user'];

if(isset($_POST['uploadbtn']))
{
    $filename=$_FILES["photo"]["name"];
    $tempname=$_FILES["photo"]["tmp_name"];
    $folder="upload/".$filename;
    $filesize=$_FILES["photo"]["size"];
    $fileext=end(explode('.',$_FILES["photo"]["name"]));
    $extension=array("jpeg","png","jpg");



    if($filename=='')
    {
        echo "<h4>*Please select a file first</h4>";
    }

    else if($filesize>1000000)
    {
        echo "<h4>*file size must be smaller than 1 MB !</h4>";

    }

    else if(in_array($fileext,$extension)===false)
    {
        echo "<h4>*file extension must be jpeg ,png ,jpg</h4>";

    }
    else
    {
        move_uploaded_file($tempname,$folder);

        $query="insert into `images`(Image_src,Email) values ('$folder','$email')";

        $run_query=mysqli_query($conn,$query);
        if($run_query)
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

$q="select Image_src from images where Email='$email' order by SNo desc";
$result=mysqli_query($conn,$q);
?>

<div class="container mt-4">
    <h1 class="text-center text-danger">Latest Images</h1>
    <hr style="height: 10px; opacity: 1; background-color: yellow;">
    <div class="row d-flex justify-content-center">

<?php
if((mysqli_num_rows($result))>0)
{
    while($row=mysqli_fetch_assoc($result))
    {

        ?>
        <div class="col-sm-3 m-3">
            <div class="card" style="width:18rem;">
    
                <img src="<?php echo $row['Image_src'] ?>" height="350px" >
            </div>
        
        </div>
    

        <?php
    }
}
else{
    echo "<h4>No Data found!!</h4>";
}

?>
</div>
</div>