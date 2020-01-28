<div id='rig'>
    <button onclick="window.location.href='admin_page.php' ;">BACK</button>
</div>

<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
  else{
      echo "<br><br><h2><u>DELETE STUDENT DETAILS</u></h2>";
      if(isset($_POST['sub'])){
          $p=$_POST['pass'];
          $id=$_POST['rno'];
          $s="SELECT * from admin where password='$p' ";
          $r=mysqli_query($db,$s);
          $s2="SELECT * from faculty where username='$id'";
          $rs2=mysqli_query($db,$s2);
          if(mysqli_num_rows($r)==1 and mysqli_num_rows($rs2)==1){
              
              $s1="DELETE from faculty where username='$id' ";
              $rs1=mysqli_query($db,$s1);
              echo "<script> alert('DELETED SUCCESSFULLY')</script>";
          }
          else{
              if(mysqli_num_rows($r)!=1){
                echo "<script> alert('INCORRECT PASSWORD') </script>";
              }
              else
              echo "<script> alert('FACULTY ID NOT EXISTS') </script>";
          }
      }
  }
  ?>
  <!DOCTYPE html>
  <html>
      <head>
          <title>DELETE FACULTY</title>
          <link rel="stylesheet" href="upd_style.css">
        <style>
            #rig{
                text-align: right;
                }
            button{
                 height: 30px;
                 width:200px;
                }
            #mid{
                text-align: center;
            }
        </style>
      </head>
      <body>
      <div id='mid'>
        <button onclick="window.location.href='view_fac.php' ;">VIEW FACULTY</button>
       </div>
       <div class="login_form">
            <h1 align="center"><u><i>DETAILS</i></u></h1>
            <form action="del_fac.php" method="POST">
                <strong>FACULTY ID</strong><br>
                <input type="text" name="rno" placeholder="ID" required><br>
                <strong>PASSWORD</strong><br>
                <input type="password" name="pass" placeholder="admin password" required><br>
                <input type="submit" value="SUBMIT" name="sub">
                <br>
            </form>
        </div>
        </body>
    </html>

