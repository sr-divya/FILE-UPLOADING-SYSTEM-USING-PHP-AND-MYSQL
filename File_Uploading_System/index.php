<?php

include('inc/header.php');
include('navbar.php');

?>

<body style="background-image:url('image/mediafire.jpg'); background-size:cover;">
    
</body>


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