<?php
  include "connection.php";
  include "navbar.php";
  error_reporting(0);
?>
<html>
    <head>
        <title>BOOK REQUEST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style  type="text/css">
        .srch
        {
            padding-left:850px;
        }
        .form-control
        {
            width: 300px;
            height: 40px;
            background-color:black;
            color:white;
        }
        body {
            background-image:url("images/11.jfif");
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding-left: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
    color:white;
    width:300px;
    height: 50px;
    background-color:#00544c;
}
.container
{
    height:800px;
    width:1200px;
    background-color:black;
    opacity:.8;
    color:white;
    margin-top:-65px;

}
.scroll{
    width:1150px;
    height: 400px;
    overflow:auto;
}
th,td
{
    width:10%;
}
</style>

    </head>
    <body>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">
           
              
                <?php
                if(isset($_SESSION['login_user']))
                  {  echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                  }
                ?>
            </div>


 <div class="h"> <a href="books.php">Books</a></div>
 <div class="h"> <a href="request.php">Book Request</a></div>
 <div class="h"><a href="issue_info.php">Issue Information</a></div>
 <div class="h"><a href="expired.php">expired list</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<div class="container">

<?php
    if(isset($_SESSION['login_user']))
    {
        ?><div style="float : left; padding: 25px">
      <form  method ="post"action="">  <button  name ="submit2" type ="submit" class="btn btn-default" style="background-color: #06861a;color:yellow " >returned</button>&nbsp&nbsp
        <button  name ="submit3" type ="submit"class="btn btn-default" style="background-color: red;color:yellow ">expired</button></div>
        </form>  <div class ="srch" >
        <form  method ="post" action=" " name ="form1">
            
        </form>

    </div>
    <div style="float: right;padding-top:10px">
    <h3>your fineis:
        <?php
        

        echo ($_SESSION['day']*.10);
        ?>
    </h3>

    </div>
        <?php
        if(isset($_POST['submit']))
    {
        $var1='<p style ="color: yellow; background-color:green;">returned</p>';
        mysqli_query($db,"UPDATE issue_book SET approve='$var1' where  username='$_POST[username]'and bid ='$_POST[bid]' ");
    }
    }
    ?>
   <!-- <h3 style="text-align:center;">date expired list</h3>--><br>
<?php
$c=0;
if(isset($_SESSION['login_user']))
{    
    
    $ret='<p style ="color: yellow; background-color:green;">returned</p>';
    $exp='<p style ="color: yellow; background-color:red;">expired</p>'; 
    
    $sql="SELECT student.username,roll,books.bid,name,AUTHORS,addition,approve,issue, 
    issue_book.return FROM student
     inner join issue_book on student.username=issue_book.username inner join books 
     on issue_book.bid=books.bid WHERE issue_book.approve != ''
     and  issue_book.approve != 'yes' ORDER BY `issue_book`.`return` DESC";
   
   
   if(isset($_POST['submit2']))
    {
        $sql="SELECT student.username,roll,books.bid,name,AUTHORS,addition,approve,
        issue, issue_book.return FROM student inner join issue_book on 
        student.username=issue_book.username inner join books on issue_book.bid=books.bid 
        WHERE issue_book.approve = '$ret'
         ORDER BY `issue_book`.`return` DESC";
          $res=mysqli_query($db,$sql);
    
    }
   else if(isset($_POST['submit3']))
   {
    $sql="SELECT student.username,roll,books.bid,name,AUTHORS,addition,approve,issue,
     issue_book.return FROM student inner join issue_book on student.username=issue_book.username 
     inner join books on issue_book.bid=books.bid WHERE issue_book.approve = '$exp' ORDER BY `issue_book`.`return` DESC";

$res=mysqli_query($db,$sql);
    

}
   else
   {
    $sql="SELECT student.username,roll,books.bid,name,AUTHORS,addition,approve,issue, issue_book.return FROM student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve != '' and  issue_book.approve != 'yes' ORDER BY `issue_book`.`return` DESC";
   
    $res=mysqli_query($db,$sql);
    
}
 
    
    echo "<table class='table table-bordered table-hover' style=''width:98% >";
				//Table header
				echo "<tr style='background-color:#6db6b9e6 ;'>";
				echo "<th>"; echo "username";  echo "</th>";
				echo "<th>"; echo "roll";  echo "</th>";
				echo "<th>"; echo "bid";  echo "</th>";
				echo "<th>"; echo "book name";  echo "</th>";
                echo "<th>"; echo "authors name";  echo "</th>";
                echo "<th>"; echo "addition";  echo "</th>";
                echo "<th>"; echo "status";  echo "</th>";
                echo "<th>"; echo "issue date";  echo "</th>";
				echo "<th>"; echo "return date";  echo "</th>";
			echo "</tr>";	
          echo"</table>";
          echo "<div class='scroll'>";
    echo "<table class='table table-bordered table-hover' >";
			while($row=mysqli_fetch_assoc($res))
			{
             
            
				echo "<tr>";
				
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['AUTHORS']; echo "</td>";
                echo "<td>"; echo $row['addition']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				

				echo "</tr>";
			}
           
		echo "</table>";
        echo "</div>";

}
else
{
    ?>
   <h3 style="text-align:center;"> login information of borrower books</h3>
    <?php
}
?>
</div>
</div>
</body>
</html>
