<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$s=$_SESSION['user'];
if(!isset($s)){
    header("location:page.html");
  }
else{
    $sql="SELECT * from faculty where username='$s' ";
    $rec=mysqli_query($db,$sql);
    $res=mysqli_fetch_assoc($rec);
}
?>
<div class="login_form">
<h1 align="center"><u><i>UPDATE DETAILS</i></u></h1>
<form action='update_f1.php' method="POST">
    <br><strong>NAME</strong>
    <br><input type="text" name='name' value="<?php echo $res['name'] ?>" requireed >
    <br><strong>BRANCH</strong>
    <input type="text" id="br" value="<?php echo $res['branch'] ?>" disabled >
    <pre>  Please select branch again</pre>
    <select name="branch" >
      <option value='NO'>NO BRANCH</option>
      <option value="CS">CS</option>
      <option value="IT">IT</option>
      <option value="EC">EC</option>
      <option value="CE">CE</option>
      <option value="ME">ME</option>
      <option value="EI">EI</option>
      <option value="EN">EN</option>
    </select>
    <br>
    <br><strong>USERNAME</strong>
    <br><input type="text" name='rno' value="<?php echo $res['username'] ?>" disabled >
    <br><strong>Email</strong>
    <br><input type="text" name='email' value="<?php echo $res['email'] ?>" required>
    <br><input type="submit" name='sub' value="UPDATE" >
</form>
<pre>    IF ALL THE DETAILS ARE CORRECT PRESS <a href="fac1.php">BACK</a></pre><br>
</div>
<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE</title>
        <link rel="stylesheet" href="upd_style.css">
        <style>
            #br{

                width:60px;
            }
            pre{
                color:red;
            }

            select{
                width:100%;
            }
        </style>
    </head>
    <body>
    </body>
</html>