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

    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

     <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
</head>
<body class="loggedin"><?php

    if($_SESSION["username"]) { ?>
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
			<div class="container">
                <a class="navbar-brand" href="#">Cars's
                    <?php   $sqlN = "SELECT r_name FROM `login_user` WHERE name LIKE '%".$_SESSION["username"]."%' ";
                     $res = $conn->query($sqlN);
                     $row = $res->fetch_assoc();
                    echo $row["r_name"];  ?> !
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- left navigation links -->
                    <ul class="navbar-nav mr-auto">

                        <!-- active navigation link -->
                        <li class="nav-item active">
                            <a class="nav-link" href="data_cars.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <!-- regular navigation link -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>

                        <!-- more navigation links -->
                        <li class="nav-item">
                            <a class="nav-link" href="data_add_cars.php">Add cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_cars_type.php">Type cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_cars_country.php">Country</a>
                        </li>

                    </ul>

                    <!-- right navigation link -->
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="profile_edit.php" tite="EProfile">Edit Profile</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" tite="Logout"><i class="fas fa-sign-out-alt"></i>Logout.</a>
                        </li>
                    </ul>          

                </div>
            </div>
		</nav> <?php 

            $sql_string = "SELECT * FROM `login_user` WHERE name LIKE '%".$_SESSION["username"]."%' ";
             $result = $conn->query($sql_string);
 
         //print_r($result);
         if ($result->num_rows > 0) {
            $i=0;
            while ($row = $result->fetch_assoc()) { ?>
        
        // <div class="content" align="center">
        //     </div>
            <div class="left">
                <p>Left Menu</p>
            </div>
            <div class="main" align="center">
                <hr><br><h1>My Profile</h1><br>
                <li>
                <b> Real Name :</b> <?= $row["r_name"]?> </li><br>
                <li>
                    <b>User Name :</b> <?=$row["name"]?></li><br>
                <li>
                    <b>Email :</b> <?=$row["email"]?></li><br>
            </div>
            <div class="right">
                <p>Right Content</p>
            </div>
        <?php
            }
 
         }else {
             echo "No data Select.";
         }
    }else{
        echo "<center><h1> Can Not Connected your Profile.</h1>";
        echo $_SESSION["username"];
    } ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>