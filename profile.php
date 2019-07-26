<?php 
     session_start(); 
     $_SESSION["name"]="";
     require("connect_db.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php //----- name of title --------
    define("TitleName","My Profile (v.DB)"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo TitleName;?></title>

     <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin"><?php

    if($_SESSION["username"]) { ?>
        <nav class="navtop">
			<div>
				<h1>Welcome to Profile's  
                    <?php   $sqlN = "SELECT r_name FROM `login_user` WHERE name LIKE '%".$_SESSION["username"]."%' ";
                     $res = $conn->query($sqlN);
                     $row = $res->fetch_assoc();
                    echo $row["r_name"];  ?> !
                     
                </h1>
                <a href="data_cars.php" tite="home">Home</a><br><br>
                <a href="profile_edit.php" tite="EProfile">Edit Profile</a><br><br>
                <a href="logout.php" tite="Logout"><i class="fas fa-sign-out-alt"></i>Logout.</a><br><br>
            </div>
		</nav> <?php 

            $sql_string = "SELECT * FROM `login_user` WHERE name LIKE '%".$_SESSION["username"]."%' ";
             $result = $conn->query($sql_string);
 
         //print_r($result);
         if ($result->num_rows > 0) {
            $i=0;
            while ($row = $result->fetch_assoc()) { ?>
        
        <div class="content" align="center">
            <br><h1>My Profile</h1><br>
            <li>
               <b> Real Name :</b> <?= $row["r_name"]?> </li><br>
            <li>
                <b>User Name :</b> <?=$row["name"]?></li><br>
            <li>
                <b>Email :</b> <?=$row["email"]?></li><br>
        </div><?php
            }
 
         }else {
             echo "No data Select.";
         }
    }else{
        echo "<center><h1> Can Not Connected your Profile.</h1>";
        echo $_SESSION["username"];
    } ?>
</body>
</html>