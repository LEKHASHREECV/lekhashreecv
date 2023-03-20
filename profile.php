<?php
  include "connection.php";
  include "navbar.php";
?>
<html>
    <head>
        <title>profile</title>
        <style type="text/css">
            .wrapper
            {
                width:300px ;
                margin: 0 auto;
               color:white;
            }
        </style>
    </head>
    <body style="background-color:#004528;">
    <div class="container">
        <form action="" method="post">
            <button class="btn btn-defult" style="float:right; width:70px;" name="submit1">EDIT</button>
        </form>
        <div class="wrapper" >
            <?php
         $q=mysqli_query($db,"SELECT*FROM  student where username='$_SESSION[login_user]'");
         ?>
         <h2 style="text-align:center;">MY PEOFILE</h2>
         <?php
         $row=mysqli_fetch_assoc($q);
         echo"<div style='text-align:center' width:50;hight:50> 
         <img  class='img-circle profile-img ' hight:150 width=150 src='images/".$_SESSION['pic']."'></div>";
         ?>
         <div style='text-align:center;'><b>WELCOME,</b>
        
        <h4>
            <?php
            echo  $_SESSION['login_user'];
            ?>
        </h4>
        </div>
        <?php 
        echo "<b>";
        echo"<table class='table table-bordered'>";
        echo "<tr>";
        echo "<td>";
            echo "<b>first name:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['first'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo "<b>last name:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['last'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo "<b>username:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['username'];
        echo "</td>";       
        echo "</tr>";
        
        echo "<tr>";
         echo "<td>";
         echo "<b>password:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['password'];
        echo "</td>";   
        echo "</tr>";


        echo "<tr>";
        echo "<td>";
        echo "<b>roll:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['roll'];
        echo "</td>";      
        echo "</tr>";
        


        echo "<tr>";
        echo "<td>";
        echo "<b>email:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['email'];
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo "<b>contact:</d>";
        echo "</td>";
         echo "<td>";
         echo  $row ['contact'];
        echo "</td>";
        echo "</tr>";

        echo"</table>";
       echo"</b>";

        ?>
        </div>
       
    </div>
        
    </body>
</html>