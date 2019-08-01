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

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>
<body class="loggedin"><?php
    
    $rname = null;  $email=null;  $updateusername=null;  $password=null;    
    $newpassword=null;  $confirmnewpassword=null;
    
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
                            <a class="nav-link" href="profile.php" tite="Profile">My Profile</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" tite="Logout">
                                <i class="fas fa-sign-out-alt"></i>Logout.</a>
                        </li>
                    </ul>          

                </div>
            </div>
		</nav>
      <hr>
         <?php
                $sql = "SELECT * FROM login_user WHERE name LIKE '%".$_SESSION["username"]."%' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { // Open IF
                    $i=0;
                    while ($row = $result->fetch_assoc()) { ?>

                        <div class="left">
                            <p>Left Menu</p>
                        </div>

                        <div class="main" align="center">

                            <hr><br><h1>Edit My Profile</h1><br>

                            <form action="?" method="post" enctype="multipart/form-data" id="form1" runat="server">
                                <center>
                                <table>
                                    <tr>
                                        <td>Enter your Name </td>
                                        <td><input type="text" name="rname" value="<?php echo $row["r_name"]; ?>" 
                                                maxlength="25" required></td></tr>
                                    <tr>
                                        <td>Enter your Email</td>
                                        <td><input class="form-control" type="email" name="email" 
                                                value="<?php echo $row["email"]; ?>" required></td></tr>
                                    <tr>
                                    <td>Enter your UserName</td>
                                        <td><input type="username" name="username" value="<?php echo $row["r_name"]; ?>
                                                maxlength="25" required"></td></tr>
                                    <tr>
                                        <td>Enter your existing password:</td>
                                        <td><input type="password" size="10" name="password"></td></tr>
                                    <tr>
                                        <td>Enter your new password:</td>
                                        <td><input type="password" size="10" name="newpassword"></td></tr>
                                    <tr>
                                        <td>Re-enter your new password:</td>
                                        <td><input type="password" size="10" name="confirmnewpassword"></td></tr>
                                </table><hr>
                                <p><input type="submit" value="Update">

                            <!-- // <label>Name</label>
                                // <input id="input-field" onkeyup="validate();" class="form-control" type="text" 
                                //     name="rname" value="<?php echo $row["r_name"]; ?>" maxlength="25" required>

                                // <label>Email</label>
                                // <input class="form-control" type="email" name="email" value="<?php echo $row["email"]; ?>" required>

                                // <label>Username</label>
                                // <input class="form-control" type="text" name="username" value="<?php echo $row["name"]; ?>" maxlength="10" required>

                                // <label>Password</label>
                                // <input class="form-control" type="text" name="password" value="<?php echo $row["password"]; ?>" 
                                //         maxlength="15" disabled="disabled">

                                // <label>New Password</label>
                                // <input class="form-control" type="text" name="password" value="<?php echo $row["password"]; ?>" 
                                //         maxlength="15" required>
                                // <br>

                                // <button class="form-control btn-primary" type="submit" name="save">Save</button> 
                                <br>
                                <div align="left"><button onclick="history.go(-1);" >Back</button></div>-->

                            </form>
                        </div>
                        <div class="right">
                            <p>Right Content</p>
                        </div><?php
                    }
                }
                if ($_SERVER["REQUEST_METHOD"]==="POST") {

                    $rname = $_POST['rname'];               $email = $_POST['email'];
                    $updateusername = $_POST['username'];   $password = $_POST['password'];
                    $newpassword = $_POST['newpassword'];   $confirmnewpassword = $_POST['confirmnewpassword'];
                    
                    $mysql = "SELECT password FROM login_user 
                                WHERE name LIKE '%".$_SESSION["username"]."%' ";
                    $resu = $conn->query($mysql);
                    $rw = $resu->fetch_assoc();

                    // $chk_pw=sha1(md5(md5(stripslashes($password))));
                    $chpassword= sha1(md5(md5(stripslashes($password))));
                    $new_password = sha1(md5(md5(stripslashes($newpassword))));

                    if( ($rw["lu_password"] == $chpassword ) && ($newpassword == $confirmnewpassword)){
                        $upsql= "UPDATE login_user 
                                SET r_name='{$rname}' , email='{$email}', lu_password='{$new_password}' 
                                where name = '{$updateusername}' ";
                        $resul = $conn->query($upsql);
                        if($resul === TRUE){
                            echo "Congratulations You have successfully changed your password";
                            echo "<a href='data_cars.php'>Home</a>";
                        }else{
                            echo "Passwords do not match";
                        }
                    }else if($password != mysql_result($resu, 0)){
                        echo "You entered an incorrect password";
                    }else{
                        echo "The username you entered does not exist";
                    }
                }
                $conn->close();
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