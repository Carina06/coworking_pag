<?php include "config.php" ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Last week Top 20</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <style>
        body {
            background-color: rgb(104, 158, 156);
        }

        .container {
            position: relative;
            text-align: center;


        }

        .centered {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 40px;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container2 {
            padding-left: 260px;
            padding-top: 30px;
            width: 1142px;


        }


        .mov_title {
            padding: 30px 20px 20px 20px;
            width: 793px;
            height: 30px;
            float: left;
            background-color: white;
            border-radius: 0px 30px 0px 0px;
            box-shadow: 10px -10px 10px -5px rgba(0, 0, 0, 0.2);
            font-size: 35px;
        }

        .mov_description {
            padding: 20px;
            width: 793px;
            height: 160px;
            float: left;
            background-color: white;
            border-radius: 0px 0px 30px 0px;
            box-shadow: 10px 10px 10px -5px rgba(0, 0, 0, 0.2);
            font-size: 18px;
        }

        .imagee {
            width: 187px;
            height: 280px;
            float: left;
            background-color: white;
            border-radius: 30px 0px 0px 30px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        }

        .img {
            width: 100%;
            border-radius: 30px 0px 0px 30px;

            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        }

        .mov_pic {
            margin-bottom: 300px;
        }
        
       .add{
           text-align: center;
           color:black;
           font-size:20px;
           font-family:Arial, Helvetica, sans-serif;
    }

    .form{
        
        text-align: center;
        margin-bottom: 20px;
    }

    form .space{
    margin-top: 8px;
    margin-bottom: 10px;;
    width:400px;
    height: 35px;
   
    
  }

  .form .button{
  width:70px;
  height: 30px;
  border-radius: 5px 5px 5px 5px;
  font-size: 15px;
}

    </style>
</head>


<body>

    <div class="menu">
        <img src="images/logo.png" width="130px">
        <a href="index.php">Home</a>
        <a href="thisWeek.php">This week</a>
        <a class="active" href="lastWeek.php">Last week</a>
        <a href="twoWeeksAgo.php">Two weeks ago</a>
        <a href="threeWeeksAgo.php">Three weeks ago</a>
        <?php if (isset($_SESSION["idUser"])) { ?>
            <a href="favourite.php">Favourite</a>
            <a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <a class="account" href="login.php" style=float:right>Login</a>
        <?php } ?>

    </div>

    <div class="container1">

        <img src="images/top2.jpg" width="100%">
        <div class="centered"> Top 20 movies of the last week </div>
    </div>

    <?php 

$datetime1=date_create('2020-05-18'); //first date 
$interval=date_diff($datetime1,date_create( date('Y-m-d')));
$num=$interval->format('%a');
$week=(int)($num/7)-1;
?>
    <p class="add">Add a film to the favourites</p>
    <form class="form" method="post" action="fav_php.php" enctype="multipart/form-data">

<p>
    <select class="space" required name="id" id="id">
        <?php $sql = "select * from week$week order by popularity desc";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {

            echo "<option value=\"" . $row["id"] . "\" ";
            if ($row["id"]) {
                echo " selected";
            }
            echo ">" . $row["title"] . "</option>";
        }
        ?>
    </select>
</p>
<div class="button1">
<button class="button" type="submit" >Add</button>
</div>
</form>


    <?php

    include "getmovies.php";
    ?>

    <?php



    $datetime1 = date_create('2020-05-18'); //first date 
    $interval = date_diff($datetime1, date_create(date('Y-m-d')));
    $num = $interval->format('%a');
    $week = ((int) ($num / 7)) - 1;


    $sql = "SELECT * FROM week$week order by popularity desc";
    $result = $mysqli->query($sql);


    if ($result = $mysqli->query($sql)) {

        print "<div class=\"container2\">";
        while ($row = $result->fetch_assoc()) {

            print "<div class=\"mov_pic\" >";

            print "<div class=\"imagee\">";
            print "<img class=\"img\" src=\"https://image.tmdb.org/t/p/w500" . $row['poster_path'] . "\">";
            print "</div>";

            print "<div class=\"mov_title\">";
            print $row["title"] . " ";
            print "</div>";

            print "<div class=\"mov_description\">";
            print $row["overview"] . " ";
            print "</div>";

            print "<br>";
            print "</div>";
        }
        print "</div>";
    }
    ?>



















</body>


</html>