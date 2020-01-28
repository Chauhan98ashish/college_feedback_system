<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$sno=$_SESSION['s_no'];
if(isset($_SESSION['redir'])){
    $id=$_SESSION['id'];
    //rate1
    if(isset($_POST['rate1']))
    $r1=$_POST['rate1'];
    else{
        echo "<script> window.location='question.php';
                alert('not checked button 1') </script>";
        }
    //rate2
    if(isset($_POST['rate2']))
        $r2=$_POST['rate2'];
    else{
        echo "<script> window.location='question.php';
         alert('not checked button 2') </script>";
        }
    //rate3
    if(isset($_POST['rate3']))
        $r3=$_POST['rate3'];
    else{
        echo "<script> window.location='question.php';
                alert('not checked button 3') </script>";
        }
    //rate4
    if(isset($_POST['rate4']))
        $r4=$_POST['rate4'];
    else{
        echo "<script> window.location='question.php';
                alert('not checked button 4') </script>";
        }
    //rate5
    if(isset($_POST['rate5']))
        $r5=$_POST['rate5'];
    else{
        echo "<script> window.location='question.php';
                alert('not checked button 5') </script>";
        }

    if($r1 and $r2 and $r3 and $r4 and $r5){
    $s="INSERT into feed values ('$sno','$id','$r1','$r2','$r3','$r4','$r5')";
    $r=mysqli_query($db,$s);
    $rat=(float) ($r1+$r2+$r3+$r4+$r5)/5;
    $s1="SELECT * from fac_feed where username='$id' ";
    $rs1=mysqli_query($db,$s1);
    $n=1;
    if(!mysqli_num_rows($rs1)){
        $s2="INSERT into fac_feed values ('$id','$rat','$n')";
        $rs2=mysqli_query($db,$s2);
    }
    else{
        $res=mysqli_fetch_assoc($rs1);
        $prev=$res['rating'];
        $n=$res['no_std'];
        $n++;
        $fin=(float) ($prev+$rat)/2;
        $s3="UPDATE fac_feed set rating='$fin', no_std='$n' where username='$id' ";
        $rs3=mysqli_query($db,$s3);
    }

    echo "<script> window.location='stu1.php';
    alert('FEEDBACK SAVED SUCCESSFULLY ') </script>";
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    </body>
</html>