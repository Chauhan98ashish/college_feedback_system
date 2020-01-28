<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$sno=$_SESSION['s_no'];

if(!isset($_SESSION['redir'])){
    echo "<script> alert('Please login again..')</script>";
    header("Refresh=2; url: page.html");
}
else{
    if(isset($_POST['FNAME'])){
    $fid=$_POST['FNAME'];
    $s="SELECT * from feed where stu_id='$sno' and username='$fid' ";
    $r=mysqli_query($db,$s);
    if(mysqli_num_rows($r)){
        echo "<script> window.location='stu1.php';
             alert('Feedback given for this faculty') </script>";
    }
    $_SESSION['id']=$fid;
    }
    elseif(isset($_SESSION['id']))
    $fid=$_SESSION['id'];
    $sql="SELECT * from faculty where username='$fid' ";
    $rec=mysqli_query($db,$sql);
    $res=mysqli_fetch_assoc($rec);
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>QUESTIONS</title>
        <style>
        h3{
            text-align:right;
            font-size: 15px;
            font-family: verdana ;
        }
        h1{ text-align: center;}
        p{
            margin-left:50px;
            font-size: 20px;
            
        }
        div{
            margin-left:80px;
           font-size:20px;
        }
        input[type=submit]{
            background-color: grey;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

        </style>
    </head>
    <body style="background-color:cyan;">
        <br><br>
        <h1><u>RATE THE QUESTIONS</u></h1><br><br>
        <?php
        echo "<h3>FEEDBACK FOR ".$res['name']."</h3>";                     
        ?>

        
        <form action='stu2.php' method='POST'>
        <p>1. Does faculty clarify your doubts in class.</p>
        <div>
        <input type="radio" name="rate1" value="1"> 1 
        <input type="radio" name="rate1" value="2"> 2 
        <input type="radio" name="rate1" value="3"> 3 
        <input type="radio" name="rate1" value="4"> 4 
        <input type="radio" name="rate1" value="5">5 
        </div><br>
        <p>2. Were class test conducted.</p>
        <div>
        <input type="radio" name="rate2" value="1"> 1 
        <input type="radio" name="rate2" value="2"> 2 
        <input type="radio" name="rate2" value="3"> 3   
        <input type="radio" name="rate2" value="4"> 4 
        <input type="radio" name="rate2" value="5"> 5 
        </div><br>
        <p>3. Do faculty explain all topic & cover syllabus.</p>
        <div>
        <input type="radio" name="rate3" value="1"> 1 
        <input type="radio" name="rate3" value="2"> 2 
        <input type="radio" name="rate3" value="3"> 3   
        <input type="radio" name="rate3" value="4"> 4 
        <input type="radio" name="rate3" value="5"> 5 
        </div><br>
        <p>4. Does faculty able to relate subject with practical examples.</p>
        <div>
        <input type="radio" name="rate4" value="1"> 1 
        <input type="radio" name="rate4" value="2"> 2 
        <input type="radio" name="rate4" value="3"> 3   
        <input type="radio" name="rate4" value="4"> 4 
        <input type="radio" name="rate4" value="5"> 5 
        </div><br>
        <p>5. Do faculty provide you with assignments. If yes are they enough to clear all arising doubts?</p>   
        <div>
        <input type="radio" name="rate5" value="1"> 1 
        <input type="radio" name="rate5" value="2"> 2 
        <input type="radio" name="rate5" value="3"> 3   
        <input type="radio" name="rate5" value="4"> 4 
        <input type="radio" name="rate5" value="5"> 5 
        </div><br><br>
        <p align='center'>
        <input type="submit" name="sub" value="SUBMIT">
        </p>
        </form>
       
    </body>
</html>