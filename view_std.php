<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>VIEW STUDENT INFO</title>
        <link rel="stylesheet" href="upd_style.css">
        <style>
            table{
                 font-family: verdana;
                 border-collapse: collapse;
                 width: 100%;
                 font-size: 20px;
                }
            td,tr{
                border: 3px solid #dddddd;
                text-align: left;
                padding: 15px;
                border-collapse: collapse;
                }

            tr:nth-child(odd) {
                background-color: #dddddd;
                }
            tr:nth-child(even) {
                background-color: #ffff;
            }
            #lg{
                text-align: right;
                }
            button{
                height: 30px;
                width:200px;
            }
            </style>
    </head>
    <body>
        <div id='lg'>
        <button onclick="window.location.href='admin_page.php' ;">BACK</button>
        </div>
        <table>
            <tr>
                <th>ROLL NO</th>
                <th>NAME</th>
                <th>YEAR</th>
                <th>MOBILE NO</th>
            </tr>
        <?php
          $db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");

          $sql="SELECT * from student order by year ";
          $rec=mysqli_query($db,$sql);
          while($res=mysqli_fetch_assoc($rec)){
            echo "<br><tr><td>".$res['roll_no']."</td><td>".$res['name']."</td><td>".$res['year']."</td><td>".$res['mobile_no']."</td></tr>";
          }
          ?>
        </table>
    </body>
</html>
            
