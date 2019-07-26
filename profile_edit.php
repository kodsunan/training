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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body class="loggedin"><?php
    
    $rname = null;  $email=null;  $updateusername=null;  $password=null;    
    $newpassword=null;  $confirmnewpassword=null;
    
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
                <a href="logout.php" tite="Logout"><i class="fas fa-sign-out-alt"></i>Logout.</a><br><br>
            </div>
		</nav>

         <?php
                $sql = "SELECT * FROM login_user WHERE name LIKE '%".$_SESSION["username"]."%' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { // Open IF
                    $row = $result->fetch_assoc();
                    ?>
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
                        </table>
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

                        // <button class="form-control btn-primary" type="submit" name="save">Save</button> -->
                        <br>
                        <div align="left"><button onclick="history.go(-1);" >Back</button></div>

                    </form><?php // Close IF
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
</body>
</html>