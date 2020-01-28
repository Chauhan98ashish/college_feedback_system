<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:page.html");
  }
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>VIEW FACULTY INFO</title>
        <link rel="stylesheet" href="upd_style.css">
        <style>
            #t{
                float:top;
            }
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
        <div id='t'>
        <table>
            <tr>
                <th>USERNAME</th>
                <th>NAME</th>
                <th>BRANCH</th>
                <th>Email</th>
                <th>Rating</th>
            </tr>
        <?php
          $db=mysqli_connect('localhost','root','','feedbacktrial') or die("Unable to connect mysql server.");

          $sql="SELECT * from faculty order by branch ";
          $rec=mysqli_query($db,$sql);
          while($res=mysqli_fetch_assoc($rec)){
              $id=$res['username'];
            $sql1="SELECT * from fac_feed where username='$id' ";
            $rec1=mysqli_query($db,$sql1);
            $res1=mysqli_fetch_assoc($rec1);
            echo "<br><tr><td>".$id."</td><td>".$res['name']."</td><td>".$res['branch']."</td><td>".$res['email']."</td><td>".$res1['rating']."</td></tr>";
          }
          ?>
        </table>
        </div>
    </body>
</html>
            
