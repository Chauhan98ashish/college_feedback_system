<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$s=$_SESSION['s_no'];
if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
else{
if(isset($_POST['sub'])){
    $a=$_POST['rno'];
    $b=$_POST['name'];
    $c=$_POST['year'];
    $d=$_POST['mno'];
    $sql="UPDATE student set roll_no='$a',name='$b',year='$c',mobile_no='$d' where username='$s' ";
    $res=mysqli_query($db,$sql);
    echo "<script>window.location.href='stu.php';
         alert('UPDATED SUCCESSFULLY')</script>";
}
}
?>