<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <style>
    body{background-color:  rgb(104, 158, 156);
           
            }
            .contactForm{
        padding-top:60px;
        padding-left:570px;
    
    font-family: Arial, Helvetica, sans-serif;
    color:white;
}
.title{
  font-family: Arial, Helvetica, sans-serif;
        padding-top:120px;
        padding-left:47%;
        color:white;
        font-size: 30px;
    }

.contactForm .text{
  font-weight: bold;
}
  .contactForm .space{
    margin-top: 8px;
margin-bottom: 30px;;
    width:400px;
    height: 35px;
    border-radius: 5px 5px 5px 5px;
    
  }

.registerLogin a{
    font-family: Arial, Helvetica, sans-serif;
    color:rgba(177, 219, 217, 0.767);
    
}.registerLogin {
    padding-top:30px;
    padding-left:43%;
}
.contactForm .button{
  margin-top: 20px;;
  width:100px;
  height: 40px;
  border-radius: 5px 5px 5px 5px;
  font-size: 20px;
}

.button1{
  margin-left:140px;
}

</style>
</head>


<body>

<div class="menu">
        <img src="images/logo.png" width="130px">
        <a href="index.php">Home</a>
        <a href="thisWeek.php">This week</a>
        <a  href="lastWeek.php">Last week</a>
        <a href="twoWeeksAgo.php">Two weeks ago</a>
        <a href="threeWeeksAgo.php">Three weeks ago</a>
        <?php if (isset($_SESSION["idUser"])) { ?>
                <a href="favourite.php">Favourite</a>
                <a href="logout.php">Logout</a></li>
            <?php } else { ?>
                <a class="account" class="active" href="login.php" style=float:right>Login</a>
            <?php } ?>

    </div>


    <div class="title">Login</div>
   
   <form class="contactForm" action="login_php.php" method="post">
    
    
           
   <label class="text">Email address:</label><br>
          <input type="email" class="space" id="email" required name="email"><br>
      
          <label class="text">Password:</label><br>
          <input type="password" class="space" id="pass" required name="pass"><br>
<div class="button1">
<button class="button" type="submit" >Confirm</button>
</div>
</form>
  <div class="options">

  </div>
 <div class="registerLogin">
     <a href="register.php">Not a member? Sign up now</a>
 </div>
  

</body>


</html>