
<?php
  include "connection.php";
  include "navbar.php";
?>

<html>
    <head>
        <title>change password</title>
        <style type="text/css">
            body
            {
                width:1300px;
                height: 650px;
                background-image:url("images/4.png");
                background-repeat:no-repeat;
            }
            .wrapper
            {
                width:400px;
                height: 400px;
                background-color:black;
                margin:0 auto;
                opacity:.6;
                color:white;
                padding:27px 15px;
            }
            .form-control
            {
                width:300px;
            }
        </style>

    </head>
    <body>
        <div class="wrapper">
            <div style="text-align:center;">
        
        <h1 style="text-align: center; font-size: 30px;font-family: Lucida Console;">change the password</h1>
        <form action=""></form>
        </div>
        <div style="padding-left:30px">
        <form action="" method="post">
          <input type="text" name="username" class="form-control" placeholder="username" required=""><br>
          <input type="text" name="email" class="form-control" placeholder="email" required=""><br>
          <input type="text" name="password" class="form-control" placeholder="new password" required=""><br>
          <button class="btn btn-default" type="submit" name="submit"> update</button>

        </form></div>
        </div>
        <?php
        if(isset($_POST['submit']))
        {
            if(mysqli_query($db,"UPDATE student SET  password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
            {
                ?>
                <script type="text/javascript">
                    alert("the password updated succesfully. ")
                </script>
                <?php
            }
        }
        ?>
    </body>
</html>