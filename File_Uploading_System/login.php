<?php

include('inc/header.php');
include('connection.php');
include('navbar.php');
error_reporting(0);
session_start();

if(isset($_POST['logedbtn']))
{
    $Email=mysqli_real_escape_string($conn,$_POST['email']);
    $Password=mysqli_real_escape_string($conn,$_POST['pass']);
    $_SESSION['user']=$Email;

    if($Email=='' || $Password=='')
    {
        echo "<h4>* all fields are compulsory</h4>";
    }
    else
    {
        $query="select * from `registeration` where Email='$Email' and Password='$Password'";

        $run_query=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($run_query);
        if($row)
        {
            if(isset($_SESSION['user']))
            {
                header('location:dashboard.php');
            }
            else{
                header('location:login.php');
            }
        }
        else
        {
            echo "<h4>*Error!</h4>";
        }
    }
}

?>


<body class="bg-primary-subtle">
    
</body>
<div class="container d-flex justify-content-center">
    <div  style="height:450px; width:500px; margin-top:100px; " class="bg-light">
        <div class="px-5 py-3   text-center bg-danger text-white">
            <h1>Login Details</h1>
        </div>

        <form action="" method="post" >
            <div class="mx-5 my-5 mb-3">
                <label class="form-label">Email-Id</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email...">
            </div>
            <div class="mx-5 mt-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter Password...">
            </div>

            <div class="mx-5 mt-5 text-white">
                <button type="submit" class=" sm btn btn-danger" name="logedbtn">Log In</button>
            </div><br>

            <a href="register.php" class="mx-5"> Don't have an account &rarr;</a>

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
