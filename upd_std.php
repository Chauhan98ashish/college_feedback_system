<div id='lg'>
        <button onclick="window.location.href='admin_page.php' ;">BACK</button>
</div>
<?php 
 session_start();
 $db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
 if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
  else{
 echo "<br><h2><u>ENTER NEW STUDENT DETAILS</u></h2>";
 echo "<strong><h4>IMPORTANT:Please use new roll no to register student and automatically student's username and password set as roll no.</h4></strong>";
if(isset($_POST['sub'])){
    $roll=$_POST['rno'];
    $nm=$_POST['name'];
    $yr=$_POST['year'];
    $mob=$_POST['mob'];
    $sql="SELECT * from student where roll_no='$roll'";
    $res=mysqli_query($db,$sql);
    $n=mysqli_num_rows($res);
    if($n==0){
     $cp=md5($roll);
     $s="INSERT into student values ('$roll','$nm','$yr','$roll','$cp','$mob')";
     $r=mysqli_query($db,$s);
     echo "<script> alert('SUCCESSFULLY ADDED')</script>";
    }
    else
     echo "<script> alert('Student details exists.')</script>";
}
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE STUDENT DETAILS</title>
        <link rel="stylesheet" href="upd_style.css">
    </head>
    <body>
    <br>
        <div class="login_form">
            <h1 align="center"><u><i>DETAILS</i></u></h1>
            <form action="upd_std.php" method="POST">
                <strong>ROLL NO</strong><br>
                <input type="text" name="rno" placeholder="roll no" required><br>
                <strong>NAME</strong><br>
                <input type="text" name="name" placeholder="name" required><br>
                <strong>YEAR</strong><br>
                <input type="text" name="year" placeholder="year" required><br>
                <strong>MOBILE NO</strong><br>
                <input type="text" name="mob" placeholder="mob no" required><br>
                <input type="submit" value="SUBMIT" name="sub">
                <br>
            </form>
        </div>
        
    </body>
</html>

