<?php

include('inc/header.php');
include('connection.php');
include('navbar.php');

if(isset($_POST['registerationbtn']))
{
    $Username=$_POST['username'];
    $Email=$_POST['email'];
    $Password=$_POST['pass'];

    if($Username=='' || $Email=='' || $Password=='')
    {
        echo "<h5>* all fields are compulsory...</h5>";
    }
    else
    {
        $query="insert into registeration(Username,Email,Password) values ('$Username','$Email','$Password')";

        $run_query=mysqli_query($conn,$query);
        if($run_query)
        {
            echo "<h5> Registeration Successfull!</h5>";
        }
        else{
            echo "<h5>* Error Occured!</h5>";
        }
    }
}

?>

<div class="container d-flex justify-content-center">
    <div  style="height:550px; width:500px; margin-top:100px; " class="bg-light">
        <div class="px-5 py-3   text-center bg-primary text-white">
            <h1>Registration Form</h1>
        </div>

        <form action="" method="post" >
        <div class="mx-5 my-5 mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username...">
            </div>

            <div class="mx-5 my-3 mb-3">
                <label class="form-label">Email-Id</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email...">
            </div>
            <div class="mx-5 mt-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter Password...">
            </div>

            <div class="mx-5 mt-5 text-white">
                <button type="submit" class=" sm btn btn-primary" name="registerationbtn">Register</button>
            </div><br>
            <a href="login.php" class="mx-5"> Already have an account &rarr;</a>

            </form>

        

    </div>

</div>


<?php

include('inc/footer.php');

?>

<?php

if(isset($_POST['loginbtn']))
{
    header('location:login.php');
}

?>

<?php
if(isset($_POST['registerbtn']))
{
    header('location:register.php');
}

?>
