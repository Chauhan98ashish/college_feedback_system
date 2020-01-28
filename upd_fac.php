<div id="lg">
    <button onclick="window.location.href='admin_page.php' ;">BACK</button>
</div>

<?php 
 session_start();
 $db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
 if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
  else{
 echo "<br><h2><u>ENTER NEW FACULTY DETAILS</u></h2>";
 echo "<strong><h4>IMPORTANT:Please use new USERNAME(faculty's code) to register FACULTY</h4></strong>";
if(isset($_POST['sub'])){
    $un=$_POST['uname'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $brn=$_POST['branch'];
    $mail=$_POST['email'];
    $sql="SELECT * from faculty where username='$un'";
    $res=mysqli_query($db,$sql);
    $n=mysqli_num_rows($res);
    if($n==0){
    $cp=md5($pass);
     $s="INSERT into faculty values ('$name','$brn','$un','$cp','$mail')";
     $r=mysqli_query($db,$s);
     echo "<script> alert('SUCCESSFULLY ADDED')</script>";
    }
    else
     echo "<script> alert('Faculty details exists.')</script>";
}
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE FACULTY DETAILS</title>
        <link rel="stylesheet" href="upd_style.css">
    </head>
    <body>
    <br>
        <div class="login_form">
            <h1 align="center"><u><i>DETAILS</i></u></h1>
            <form action="upd_fac.php" method="POST">
                <strong>USERNAME</strong><br>
                <input type="text" name="uname" placeholder="user name" required><br>
                <strong>Password</strong><br>
                <input type="text"  name="pass" placeholder="password" required><br>
                <strong>NAME</strong><br>
                <input type="text" name="name" placeholder="name" required><br>
                <strong>BRANCH</strong><br>
                <select name="branch">
                <option value="CS">CS</option>
                <option value="IT">IT</option>
                <option value="EC">EC</option>
                <option value="CE">CE</option>
                <option value="ME">ME</option>
                <option value="EI">EI</option>
                <option value="EN">EN</option>
                </select><br>
                <strong>Email</strong><br>
                <input type="Email" name="email" placeholder="email" required><br>
                <input type="submit" value="SUBMIT" name="sub">
                <br>
            </form>
        </div>
        
    </body>
</html>

