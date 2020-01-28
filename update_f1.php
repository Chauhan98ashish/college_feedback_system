<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$s=$_SESSION['user'];
if(!isset($s)){
    header("location:page.html");
  }
else{
if(isset($_POST['sub'])){
    $a=$_POST['name'];
    $b=$_POST['email'];
    $c=$_POST['branch'];
    if($c=='NO'){
      echo "<script> window.location.href='update_f.php';
            alert('SELECT CORRECT BRANCH') </script>";
    }
    else{
    $sql="UPDATE faculty set name='$a',email='$b',branch='$c' where username='$s' ";
    $res=mysqli_query($db,$sql);
    echo "<script>window.location.href='fac1.php';
         alert('UPDATED SUCCESSFULLY')</script>";
}
}
}
?>