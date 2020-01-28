<?php
 session_start();
 $db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");
 if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
  else{
    $sql="SELECT * from student ";
    $rec=mysqli_query($db,$sql);
    $ns=mysqli_num_rows($rec);

    $sql1="SELECT * from faculty ";
    $rec1=mysqli_query($db,$sql1);
    $nf=mysqli_num_rows($rec1);

    $sql2="SELECT DISTINCT stu_id from feed  ";
    $rec2=mysqli_query($db,$sql2);
    $ns1=mysqli_num_rows($rec2);

    $sql3="SELECT * from fac_feed ";
    $rec3=mysqli_query($db,$sql3);
    $ns2=mysqli_num_rows($rec3);

    $sql4="SELECT * from fac_feed where rating>=4 ";
    $rec4=mysqli_query($db,$sql4);
    $ns3=mysqli_num_rows($rec4);
    
    $sql6="SELECT * from fac_feed where rating>=2 and rating<4 ";
    $rec6=mysqli_query($db,$sql6);
    $ns5=mysqli_num_rows($rec6);
    
    $sql5="SELECT * from fac_feed where rating<2";
    $rec5=mysqli_query($db,$sql5);
    $ns4=mysqli_num_rows($rec5);
  }
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" href="ad_style.css">
        <style>
            table, th, td {
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
            #t{
                float: left;
                margin: 0px;
               
            }
            h1{
                text-align: center;
            }
            #main{
                 float: right;
                 margin: 0px;
                }
           #out{
            padding-left:150px;
            padding-right:220px;
           }
        </style>
    </head>
    <body style="background:rgb(125, 123, 245)";>
        <div id="lg">
        <button onclick="window.location.href='logout.php';" >Logout</button><br>
        </div>
        
        <h1><u>WELCOME ADMIN</u></h1><br><br>
        <div id="out">
        <div id="main">
            <br><br>
        <h2>VIEW</h2>
        <button onclick="window.location.href='view_std.php';">View Student Detail</button><br>
        <br><button onclick="window.location.href='view_fac.php';">View Faculty Details</button><br>
        
        <br><h2>UPDATE/ADD</h2>
        <button onclick="window.location.href='upd_std.php';">Update Student Details</button><br>
        <br><button onclick="window.location.href='upd_fac.php';">Update Faculty Details</button><br>
        
        <br><h2>DELETE</h2>
        <button onclick="window.location.href='del_std.php';">Delete student Details</button><br>
        <br><button onclick="window.location.href='del_fac.php';">Delete Faculty Details</button><br>
        </div>
        <br>
        <div id="t">
         <table>
             <tr>
                 <th><h2>Total students registered:</h2></th>
                 <td> <?php echo "<h2>".$ns."</h2>" ?> </td>
            </tr>
            <tr>
                 <th><h2>Total faculties registered:</h2></th>
                 <td> <?php echo "<h2>".$nf."</h2>" ?> </td>
            </tr>
            <tr>
                 <th><h2>Total students given feedback:</h2></th>
                 <td><?php echo "<h2>".$ns1."</h2>" ?> </td>
            </tr>
            <tr>
                 <th><h2>Total faculties getted feedback:</h2></th>
                 <td><?php echo "<h2>".$ns2."</h2>" ?></td>
            </tr>
            <tr>
                 <th><h2>Total faculties(rating>=4):</h2></th>
                 <td><?php echo "<h2>".$ns3."</h2>" ?> </td>
            </tr>
            <tr>
                 <th><h2>Total faculties(rating:2-4):</h2></th>
                 <td><?php echo "<h2>".$ns5."</h2>" ?> </td>
            </tr>
            <tr>
                 <th><h2>Total faculties(rating:0-2):</h2></th>
                 <td><?php echo "<h2>".$ns4."</h2>" ?> </td>
            </tr>
        </table>
        <br><br>
        </div>
        </div>

        <br><br>
    </body>
</html>