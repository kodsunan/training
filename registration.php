<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Registration</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php 
    require('connect_db.php');
    $u_name = null; $u_pass = null; $u_cpass = null; $u_email = null; $u_rname = null;
    $error = false;

if (isset($_REQUEST['username'])){
    
    $u_name = $_REQUEST['username'];
    $u_pass = $_REQUEST['password'];
    $u_cpass = $_REQUEST['cpassword'];
    $u_email = $_REQUEST['email'];
    $trn_date = date("Y-m-d H:i:s");
    $u_rname = $_REQUEST['rname'];

    // validate
    if (strlen($u_name) < 4) {
        echo 'Username too short, minimum is 4 characters';
        $error = true;
    }
    if (strlen($u_pass) < 6) {
        echo 'Password too short, minimum is 6 characters';
        $error = true;
    }
    if ($u_pass != $u_cpass) {
        echo 'Password an comfirm password are different';
        $error = true;
    }
    if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalide E-Mail';
        $error = true;
    }

    // try {
    //              // prepare sql for checking username
    //  $sql_string = "SELECT COUNT(*) FROM login_user WHERE name ='" . $u_name . "'";

    //  $result = $conn->query($sql_string);
    //  $row = $result->fetch_assoc();

    //  if ($row !== false) {
    //      if ($row > 0) {
    //          echo 'This username already taken';
    //          $error = true;
    //      }
    //  }

    //  if ($error !== false ) {
    //      // Everything fine, add register info into database
    //       // prepare array
    //     $user = array(
    //         'name'  => $u_name,'email' => $u_email,
    //         'pass'  => md5($u_pass),
            
    //     );
        $chk_password = sha1(md5(md5(stripslashes($u_pass))));

         $sql_string = "INSERT INTO login_user (name, email, lu_password, trn_date ,r_name)
                    VALUES ('$u_name', '$u_email','$chk_password',  '$trn_date', '$u_rname')";
            // $result->execute($user);
            $result = $conn->query($sql_string);
            // $row = $result->fetch_assoc($user);

        if ($result) {
        //    echo 'Registration Completed.';
        //    echo "number of rows: " . $result->num_rows;
           echo "<div class='form'><center>
                    <h3>You are registered successfully.</h3>
                    <br/>Click here to <a href='dt_login.php'>Login</a>
                </center></div>";
        }
    // }
    
}else{
?>
<section  class="container-fluid bg">
            <section  class="row justify-content-center">
                <section  class="col-12 col-sm-6 col-md-3">
                    <div class="login">
                        <h1>Registration</h1>
                        <form name="registration" id="register" action="" method="post">

                            <label for="name"><i class="fas fa-file-signature"></i></label>
                            <input type="text" name="rname" id="rname" placeholder="Real Name" pattern="^[ก-๏a-zA-Z\s]+$"  required /> <br>

                            <label for="username"> <i class="fas fa-user"></i> </label>
                            <input type="text" name="username" id="username" placeholder="Username" required /> <br>

                            <label for="password"><i class="fas fa-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required /> <br>

                            <label for="Confirm Password" ><i class="fas fa-unlock"></i></label>
                            <input type="password"  name="cpassword" id="cpassword"
                            placeholder="Confirm Password" required/> <br>

                            <label for="E-Mail"> <i class="fas fa-envelope"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" required /> <br>

                            <!--<input type="reset" name="reset" id="reset" value="Reset" />

                            <input type="submit" name="submit" id="register" value="Register" />-->
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                
                        </form>
                        <p class="text-center">Have an account? <a href="dt_login.php">Log In</a> </p>
                    </div>
           </section>
            </section>
        </section>
<?php 
} 
?>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>