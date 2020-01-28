<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$s=$_SESSION['s_no'];
if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
else{
    $sql="SELECT * from student where username='$s' ";
    $rec=mysqli_query($db,$sql);
    $res=mysqli_fetch_assoc($rec);
}
?>
<div class="login_form">
<h1 align="center"><u><i>FILL DETAILS</i></u></h1>
<form action='update_s1.php' method="POST">
    <br><strong>ROLL NO/ STUDENT ID</strong>
    <br><input type="text" name='rno' value="<?php echo $res['roll_no'] ?>" >
    <br><strong>NAME</strong>
    <br><input type="text" name='name' value="<?php echo $res['name'] ?>" >
    <br><strong>YEAR</strong>
    <br><input type="text" name='year' value="<?php echo $res['year'] ?>" >
    <br><strong>USERNAME</strong>
    <br><input type="text" name='rno' value="<?php echo $res['username'] ?>" disabled >
    <br><strong>MOBILE NO</strong>
    <br><input type="text" name='mno' value="<?php echo $res['mobile_no'] ?>" >
    <br><input type="submit" name='sub' value="UPDATE" >
</form>
<pre>    IF ALL THE DETAILS ARE CORRECT PRESS <a href="stu.php">BACK</a></pre><br>
</div>
<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE</title>
        <link rel="stylesheet" href="upd_style.css">
    </head>
    <body>
    </body>
</html>