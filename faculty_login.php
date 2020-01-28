<?php
session_start();

$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
// $_SESSION['user_name']='';
if(isset($_POST['login1'])){

    $user=$_POST['username'];
    $pass=$_POST['password'];
    $cp=md5($pass);
    $sql="select * from faculty where username='$user' && password ='$cp' ";
    $rec=mysqli_query($db,$sql);
    $n=mysqli_num_rows($rec);
    if($n==1){
        $_SESSION['user']=$user;
        echo "<script>Logged in Successfully!!<br>Redirecting to home page....</script>";
        header("Refresh:1 ; url=fac1.php");
    }

    else{
        echo "Check your password or username!<br>Redirecting back.....login again...";
        header("Refresh:1 ; url=faculty.html");
    }
    
    }
else{
    echo '<script>Logged in Fail!!<br>Redirecting to home page....</script>';
        
}
    mysqli_close($db);
 ?>
