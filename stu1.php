<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$s=$_SESSION['s_no'];
if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }

elseif(isset($_POST['sub']) or isset($_SESSION['redir'])){
    if(isset($_POST['sub']))
    {
        $ch=$_POST['branch'];
        $_SESSION['redir']=$ch;
    }
    else
       {
          $ch=$_SESSION['redir'];
        }
    $sql="SELECT * from faculty where branch='$ch' ";
    $rec=mysqli_query($db,$sql);
    echo "<br><br><h1><u>FACULTY NAMES</u></h1><br><br>";
    while($res=mysqli_fetch_assoc($rec)){
        $h=$res['name'];
        $id=$res['username'];
        echo "<br><h2>".$h."(".$id.")</h2>";?>
        <div>
        <form action='question.php' method='POST' >
        <input type="hidden" value='1'>
        <input id="in" type="submit" name="FNAME" value="<?php echo $id ?>">
        </form>
        </div><br><br>
         <?php } ?>
         <div>
         <form action='stu.php' method='POST' >
        <input type="submit" name="sub" value="SUBMIT">
        </form>
        </div>
         <!--<p align=center>
               <button onclick="window.location.href='stu.php'">FINAL SUBMIT</button>
        </p>-->
        <?php
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FACULTY NAMES</title>
        <style>
            #in{
                width:200px;
            }
            h1{
                text-align: center;
            }
            h2{
               text-align: center;
            }
            div{
                text-align: center;
            }
            body{
                background-image:url("https://bit.ly/36O98zg");
                background-position: unset;
                background-repeat: no-repeat;
                background-size: cover;
            }
            input[type='submit']{
                background:  #4CAF50;
                width:120px;
                height:30px;  
            }

        </style>
    </head>
</html>