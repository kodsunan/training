<?php 
        // $mdpass = md5(1234);
        //  echo $mdpass ;
    ?><?php
    require("connect_db.php");
    // Start the session
    session_start();
    $message="";
    if(count($_POST)>0) {
        
        // $con = mysqli_connect('127.0.0.1:3306','root','','admin') or die('Unable To connect'); 
       // $result = mysqli_query($con,"SELECT * FROM login_user WHERE name='" . $_POST["name"] . "' and password = '". $_POST["password"]."'");
        $pw = $_POST["password"];

        $sql_string = "SELECT * FROM login_user 
                        WHERE name='" . $_POST["name"] . "' 
                        and password='". md5($pw)."'";

        $result = $conn->query($sql_string);
        // $row  = mysqli_fetch_array($result);
        $row = $result->fetch_assoc();
        
        if(is_array($row)) {
            $_SESSION["id"] = $row["lu_id"];
            $_SESSION["name"] = $row["name"];
        } else {
           ?><?php $message = "Invalid Username or Password!"; ?>
            <br><a href="registration.php" tite="Register">Register.<?php
        }
    }

    if(isset($_SESSION["id"])) {
        header("Location:data_cars.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body >
<div class="login">
	<h1>Login Cars Info</h1>
    <form name="frmUser" method="post" action="" >
        <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <!-- <h3 align="center">Enter Login Details</h3><br> -->
        <label for="username">
			<i class="fas fa-user"></i>
		</label>
            <input type="text" name="name" placeholder="Username" id="username" required>
        <br>
        <label for="password">
			<i class="fas fa-lock"></i>
		</label>
            <input type="password" name="password" placeholder="Password" id="password" required>
        
            <input type="submit" name="submit" value="Login">
            
            <!-- <input type="reset"></center> -->
    </form>
</div>
    <?php 
    #-------------- Example Session --------------------
        //if (empty($_SESSION["my_name"]) || !isset($_SESSION["my_name"])) {
        //     echo "No Available.";
        // }else{
        //     echo $_SESSION["my_name"];
        // }
       
    ?>
</body>
</html>