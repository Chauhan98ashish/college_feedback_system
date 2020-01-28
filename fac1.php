<?php
session_start();
$db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
$s=$_SESSION['user'];
if(!isset($s)){
    header("location:page.html");
}
else{
$sql="select * from faculty where username='$s'";
$rec=mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($rec);
$name=$row['name'];

    $sql="SELECT * from fac_feed where username='$s' ";
    $rec=mysqli_query($db,$sql);
    $res=mysqli_fetch_assoc($rec);

    if(!$res){
        echo "<script>NO FEEDBACK </script>";
        $x="-";
        $y="-";
        $z="-";
    }
    else{
    $x=$res['rating'];
    $y=$res['no_std'];
    $x1=$x-0.01;
    $sql2="SELECT DISTINCT rating from fac_feed where rating>='$x1' ";
    $rec2=mysqli_query($db,$sql2);
    $z=mysqli_num_rows($rec2);
    }

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
            #lg{
                text-align: right;
            }
            button{
                background-color: #f4511e;
                 height: 30px;
                width:200px;
            }
            h2{
                text-align:center;
                
            }
            b{
                border: 3px solid black; 
                padding: 10px;
            }
        
            table, th, td {
                background: green;
                            border: 3px solid black;
                            border-collapse: collapse;
                        }
            th, td {
                    padding: 10px;
                    height: 50px;
                }
            th{
                text-align: left;
                width:400px;
            }
            td{
                text-align: center;
                width:125px;
            }
            </style>
    </head>
    <body>
    <div id="lg">
        <button onclick="window.location.href='logout.php';" >Logout</button><br><br>
        <button onclick="window.location.href='update_f.php'">UPDATE DETAILS</button>
        </div>
        <br>
     <h2><b>WELCOME  <?php  echo $name; ?> </b></h2><br><br><br><br>
        <br>
        <table align='center'>
             <tr>
                 <th><h2>RATING:</h2></th>
                 <td> <?php echo "<h2>".$x."</h2>"; ?> </td>
            </tr>
            <tr>
                 <th><h2>Total Students rated:</h2></th>
                 <td> <?php echo "<h2>".$y."</h2>"; ?> </td>
            </tr>
            <tr>
                 <th><h2>Ranking:</h2></th>
                 <td><?php echo "<h2>".$z."</h2>"; ?> </td>
            </tr>
        </table>
        <br><br><br><br>
    </body>
</html>