<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>User Login</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body > 

<?php
    // $mdpass = md5('kodsunan2');
    // echo $mdpass ;

    require("connect_db.php");
    // Start the session
    session_start();

    $message="";
    
    // if(count($_POST)>0) {
    //     // $con = mysqli_connect('127.0.0.1:3306','root','','admin') or die('Unable To connect'); 
    //    // $result = mysqli_query($con,"SELECT * FROM login_user WHERE name='" . $_POST["name"] . "' and password = '". $_POST["password"]."'");
    //     $pw = $_POST["password"];

        // $sql_string = "SELECT * FROM login_user 
        //                 WHERE name='" . $_POST["name"] . "' 
        //                 and password='". md5($pw)."'";

    //     $result = $conn->query($sql_string);
    //     // $row  = mysqli_fetch_array($result);
    //     $row = $result->fetch_assoc();
        
    //     if(is_array($row)) {
    //         $_SESSION["id"] = $row["lu_id"];
    //         $_SESSION["name"] = $row["name"];
    //     } else {
             ?><?php //$message = "Invalid Username or Password!"; ?>
        
             <!-- <br><a href="registration.php" tite="Register">Register. -->
             
            <?php
    //     }
    //  }if(isset($_SESSION["id"])) {
    //     header("Location:data_cars.php");
    // }
    if (isset($_POST['username'])) {

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $chk_password = sha1(md5(md5(stripslashes($password))));

        $sql_string = "SELECT * FROM login_user 
                        WHERE name='$username' 
                        and lu_password='$chk_password'";

        $result = $conn->query($sql_string);
        $row = $result->fetch_assoc();
        $rows = $result->num_rows;
        if($rows==1){
            $_SESSION['username'] = $username;
            // Redirect user to index.php
            header("Location: data_cars.php");
        }else{
            echo "<div class='form'>
                    <h3>Username/password is incorrect.</h3>
                    <br/>Click here to <a href='dt_login.php'>Login</a></div>";
        }
    }else{  ?>

        <section  class="container-fluid bg">
            <section  class="row justify-content-center">
                <section  class="col-12 col-sm-6 col-md-3">
                    <div class="login">
                        <h1>Login Cars Info</h1>
                        <form class="form-container" name="frmUser" method="post" action="" >
                            <div class="message"><?php if($message!="") { echo $message; } ?></div>
                            <!-- <h3 align="center">Enter Login Details</h3><br> -->
                            <label for="username">
                                <i class="fas fa-user"></i>
                            </label>
                                <input type="text" name="username" placeholder="Username" id="username" required>
                            <br>
                            <label for="password">
                                <i class="fas fa-lock"></i>
                            </label>
                                <input type="password" name="password" placeholder="Password" id="password" required>
                                <!--<input type="submit" name="submit" value="Login">-->
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                <!-- <input type="reset"></center> -->
                        </form>
                        <p> <center> Not registered yet? <a href='registration.php'>Register Here</a></center></p>
                    </div>
                </section>
            </section>
        </section>

        <?php 
    } ?>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
