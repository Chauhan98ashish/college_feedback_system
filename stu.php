<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");

$s=$_SESSION['s_no'];

$sql="select * from student where username='$s'";
$rec=mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($rec);
$_SESSION['user_name']=$row['name'];

if(isset($_POST['sub'])){
    echo "<script> alert('FEEDBACK COMPLETED')</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>first page</title>
        <style>
            body{
                background-image:url("https://bit.ly/2K4gpkG");
                background-position: unset;
                background-repeat: no-repeat;
                background-size: cover;
            }
            #av{
                box-shadow: 0 0 10px 0 rgba(83, 57, 235, 0.562);
                background: rgb(232, 238, 148);
                width: 400px;
                margin: 20px auto;
                text-align: center;
            }
            #lg{
                text-align: right;
            }
            button{
                background-color: #f4511e;
                 height: 30px;
                width:200px;
            }
            select{
                width: 100px;
                padding: 16px 20px;
                border: none;
                border-radius: 4px;
                background-color: #f1f1f1;
            }
            input[type='submit']{
                background:  #4CAF50;
                width:120px;
                height:30px;  
            }
            </style>
    </head>
    <body>
    <div id="lg">
        <button onclick="window.location.href='logout.php';" >Logout</button><br>
        </div>
        <br><br>
    <div id='av'>
        <br>
    <h2><b>WELCOME  <?php  echo $row['name']; ?> </b></h2><br><br><br><br>
<form action="stu1.php" method="POST">
    <select name="branch">
      <option value="CS">CS</option>
      <option value="IT">IT</option>
      <option value="EC">EC</option>
      <option value="CE">CE</option>
      <option value="ME">ME</option>
      <option value="EI">EI</option>
      <option value="EN">EN</option>
    </select>
    <br><br><br><br>
    <input type="submit" name="sub" value="SUBMIT">
  </form>
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
  <button onclick="window.location.href='update_s.php'">UPDATE DETAILS</button>
  <br><br>
  </div>
    </body>
</html>