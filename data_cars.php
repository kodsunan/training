<?php // Start the session
    session_start();
     $_SESSION["name"]="";
    // session_destroy(); # For Clear Data Session
?>  <!-- Connected DB by PHP7 --> <?php
    require("connect_db.php");

        // $db_host = "localhost" ;
        // $db_username = "root";
        // $db_password = "";
        // $db_name = "intern_2019"; 

        // // Create connection
        // $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

        // // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
        // $conn->set_charset("utf8");
        // //echo "Connected successfully";

        // $sql_string = "SELECT * FROM in_cars";
        // $result = $conn->query($sql_string);
        // //print_r($result);
?>
<!DOCTYPE html>
<html lang="en">
<?php //----- name of title --------
    define("Data","Table Cars 2019 (v.DB)"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo Data;?></title>

    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
    <!-- <style>
        .my-table {
            width: 800px;
            border-spacing: 0px;
            border-collapse: separate;
        }
        .my-table tr td,
        .my-table tr th {
            border: 1px solid #000;
            padding: 2px 5px;
        }
        .my-table tr th {
          background-color: #000;
          color: #fff;
        }
    </style> -->
</head>
<body class="loggedin">
<?php
    if($_SESSION["username"]) { ?>
        <!--<nav class="navtop fixed-top navtop-expand-md ">-->
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
			<div class="container">
                <a class="navbar-brand" href="#">Cars's 
                    <?php   $sqlN = "SELECT r_name FROM `login_user` WHERE name LIKE '%".$_SESSION["username"]."%' ";
                     $res = $conn->query($sqlN);
                     $row = $res->fetch_assoc();
                    echo $row["r_name"];  ?> 
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
		</nav><?php  
        
     #-- Search List Dropdown(car brand) && Key word (car Model) --
	    ini_set('display_errors', 1);
	    error_reporting(~0);
        $strKmodel = null; $strKbrand = null;

        if (!empty($_REQUEST['c_model']) && !empty($_REQUEST['c_brand']) ){
            
            $strKmodel=$_GET['c_model']; $strKbrand=$_GET['c_brand'];

            $sql_string = "SELECT
                            in_cars.cars_id , in_cars.cars_img,
                             in_cars_brand.cb_name , in_cars.cars_model , 
                            in_cars.cars_colour , in_cars.cars_colour_code , in_cars.cars_years ,
                            in_cars_type.ct_name ,in_cars_country.cc_name ,in_cars.cars_engine , in_cars.cars_price
                        FROM
                            ( in_cars_brand, in_cars_type , in_cars_country )
                        JOIN
                            in_cars
                        ON  
                            (in_cars_brand.cb_id = in_cars.cars_brand) 
                        AND
                            (in_cars_type.ct_id = in_cars.cars_type) 
                        AND 
                            (in_cars_country.cc_id = in_cars.cars_country)
                        
                        WHERE in_cars.cars_brand like '%".$strKbrand."%' AND
                              in_cars.cars_model like '%".$strKmodel."%' 

                        ORDER BY in_cars.cars_id  ASC ";
        }elseif(
        (isset($_GET["c_brand"])&& $_GET["c_brand"] !="") && (isset($_GET["c_model"])&& $_GET["c_model"]=="") ) {
            // $strSQL .= " and '".$_GET["c_brand"]."' LIKE '%".$_GET["c_model"]."%' ";
            $strKmodel = $_GET["c_model"]; $strKbrand = $_GET["c_brand"];
            $sql_string = "SELECT
                            in_cars.cars_id , in_cars.cars_img ,
                            in_cars_brand.cb_name , in_cars.cars_model , 
                            in_cars.cars_colour , in_cars.cars_colour_code , in_cars.cars_years ,
                            in_cars_type.ct_name ,in_cars_country.cc_name ,in_cars.cars_engine , in_cars.cars_price
                        FROM
                            ( in_cars_brand,in_cars_type , in_cars_country )
                        JOIN
                            in_cars
                        ON  
                            (in_cars_brand.cb_id = in_cars.cars_brand) 
                        AND
                            (in_cars_type.ct_id = in_cars.cars_type) 
                        AND 
                            (in_cars_country.cc_id = in_cars.cars_country)
                        
                        WHERE in_cars.cars_brand = '".$strKbrand."' 

                        ORDER BY in_cars.cars_id  ASC ";
	    }elseif (
        (isset($_GET["c_brand"])&& $_GET["c_brand"] == "") && (isset($_GET["c_model"])&& $_GET["c_model"] != "")) {
            $strKmodel = $_GET["c_model"]; $strKbrand = $_GET["c_brand"];
            $sql_string = "SELECT
                            in_cars.cars_id ,in_cars.cars_img,
                             in_cars_brand.cb_name , in_cars.cars_model , 
                            in_cars.cars_colour , in_cars.cars_colour_code , in_cars.cars_years ,
                            in_cars_type.ct_name ,in_cars_country.cc_name ,in_cars.cars_engine , in_cars.cars_price
                        FROM
                            ( in_cars_brand, in_cars_type , in_cars_country )
                        JOIN
                            in_cars
                        ON 
                            (in_cars_brand.cb_id = in_cars.cars_brand) 
                        AND
                            (in_cars_type.ct_id = in_cars.cars_type) 
                        AND 
                            (in_cars_country.cc_id = in_cars.cars_country)
                        
                        WHERE 
                              in_cars.cars_model LIKE '%".$strKmodel."%'  
                        ";
        }else{      
            $sql_string = "SELECT
                            in_cars.cars_id , in_cars.cars_img,
                            in_cars_brand.cb_name , in_cars.cars_model , 
                            in_cars.cars_colour , in_cars.cars_colour_code , in_cars.cars_years ,
                            in_cars_type.ct_name ,in_cars_country.cc_name ,
                            in_cars.cars_engine , in_cars.cars_price
                        FROM
                            (in_cars_brand, in_cars_type , in_cars_country)
                        JOIN
                            in_cars
                        ON 
                            (in_cars_brand.cb_id = in_cars.cars_brand) 
                        AND
                            (in_cars_type.ct_id = in_cars.cars_type) 
                        AND 
                            (in_cars_country.cc_id = in_cars.cars_country)
                        ORDER BY in_cars.cars_id  ASC    ";
        } ?>
     #     
     <main role="main" class="container">
        <div class="row">
            <div class="col">
            <div class="jumbotron">
                <h1 class="display-2">Cars Info 2 (ver. DB)</h1>
                <p class="lead">This data cars is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
                <a class="btn btn-lg btn-primary" href="#" role="button">Get Started &raquo;</a>
            </div>
            </div>
        </div><br>

    <section class="search-sec">
        <div class="container">
            <!-- #Search Form  -->
             <form  method="get" align="center"  novalidate="novalidate">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                        <!-- <select name="c_brand" id="c_brand">
                            <option>-- Select Brand --</option>
                            <option value="BMW" <?
                                // if($_POST["c_brand"]=="BMW"){
                                //     echo"selected";
                                // }?>>- BMW</option>
                            <option value="Chevrolet" <?if($_POST["c_brand"]=="Chevrolet"){echo"selected";}?>>- Chevrolet</option>
                            <option value="Ferrari" <?if($_POST["c_brand"]=="Ferrari"){echo"selected";}?>>- Ferrari</option>
                            <option value="Ford" <?if($_POST["c_brand"]=="Ford"){echo"selected";}?>>- Ford</option>
                            <option value="Honda" <?if($_POST["c_brand"]=="Honda"){echo"selected";}?>>- Honda</option>
                            <option value="Hyundai" <?if($_POST["c_brand"]=="Hyundai"){echo"selected";}?>>- Hyundai</option>
                            <option value="Mazda" <?if($_POST["c_brand"]=="Mazda"){echo"selected";}?>>- Mazda</option>
                            <option value="MG" <?if($_POST["c_brand"]=="MG"){echo"selected";}?>>- MG</option>
                            <option value="NISSAN" <?if($_POST["c_brand"]=="NISSAN"){echo"selected";}?>>- NISSAN</option>
                            <option value="TOYOTA".<?php echo $strKbrand;?> <?if($_POST["c_brand"]=="TOYOTA"){echo"selected";}?>>- TOYOTA</option>
                        </select> -->
                            <select name="c_brand" id="c_brand" class="form-control search-slt" >
                                <option value ="" disabled selected>-- เลือกยี่ห้อรถ --</option>
                                <?php
                                $strSQL = "SELECT cb_id , cb_name FROM in_cars_brand ";
                                $res = $conn->query($strSQL);
                                //print_r($res);
                                if ($res->num_rows > 0) {
                                    $i=0;  $objRes='';

                                    while($objRes = $res->fetch_assoc()){ ?>
                                        <option value="<?php echo $objRes["cb_id"];?>" <?php
                                        if (isset($_GET["c_brand"]) && $_GET["c_brand"]== $objRes["cb_id"]) {
                                            echo "selected"; 
                                            // $strSQL .= " WHERE (worker1 LIKE '%".$_POST["txtKeyword"]."%' ) ";
                                        }?>
                                        ><?php echo $objRes["cb_id"]." - ".$objRes["cb_name"];?>
                                        </option><?php
                                    }
                                }else {
                                    echo "No data.";
                                } ?>
                            </select>
                        </div>
                        <!-- Keyword
                        <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_POST["txtKeyword"];?>">
                        <input type="submit" value="Search"></th> -->
                        <div class="col-lg-1 col-md-1 col-sm-12 p-0">
                            ค้นรุ่นรถยนต์
                         </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input class="form-control search-slt" type="text" name="c_model" id="c_model" value="<?php echo $strKmodel;?> " placeholder="Enter Car's Model ">
                         </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                            <button class="btn btn-outline-primary btn-rounded btn-sm my-0 waves-effect waves-light wrn-btn"  type="submit" name="find">Search</button>
                        </div>
                     </div>
                </div></div>  
            </form>
        </div>
    </section><?php 
                if (true) { ?><center>
                    <!--<h1><div align="center"> Cars Info 2 (ver. DB) </h1> 
                    <p>   <a href="data_cars.php">หน้าแรก</a> | <a href="data_add_cars.php">เพิ่มข้อมูลรถยนต์</a> 
                        | <a href="data_cars_type.php">ประเภทรถยนต์</a> | <a href="data_cars_country.php">ประเทศผู้ผลิตรถยนต์</a>
                        <!-- |<a href="data_.php">เพิ่มข้อมูล</a> 
                    </p>-->
                    <?php
                } ?>

             <div class="table-responsive">
                <table class="my-table table-striped w-auto">
                    <thead>
                        <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">ยี่ห้อ</th>
                            <th scope="col">รุ่น/โมเดล</th>
                            <th scope="col">ปี</th>
                            <th scope="col">สี</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col"><strong>แก้ไข</strong></th>
                            <th scope="col"><strong>ลบ</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Search Car's Model  --><?php
                    $result = $conn->query($sql_string);
                    if ($result->num_rows > 0) {
                        $i=0;
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td scope="row" align="center"><?=$row["cars_id"]?></td>
                                <td align="center"><!--<?=$row["cars_img"]?> --><?php 
                                    if(isset($row['cars_img']) && !empty($row['cars_img']) ){ ?>    
                                        <a href="images/<?php echo $row["cars_img"]; ?>">
                                        <img id="myImg" src='images/<?php echo $row["cars_img"]; ?>'  width='100px' height='100px' >
                                        </a></td> <?php
                                        
                                    }else{ 
                                        $filepath= 'images/noImg.png';
                                        echo '<img src="'.$filepath.'"width="100px" height="100px" ></td>'; //style="border:1px solid #333333;"
                                    } ?>
                                </td>
                                <td><div align="center"><!--<?=$row["cars_brand"]?> --><?php
                                        if(empty($row["cb_name"])){//cars_brand
                                            echo "N/A";
                                        }else {
                                            echo $row["cb_name"];
                                        }?>
                                </td>
                                <td><div align="center"><?=$row["cars_model"]?></td>
                                <td><div align="center"><?=$row["cars_years"]?></td>
                                <td><div align="center"><font color=<?=$row["cars_colour_code"]?>> 
                                                    <?= $row["cars_colour"] ?> </font> </td>
                                <td > <!-- Details Cars (Type , Country , Engine , Price)-->  <br>   
                                    <ul><?php  echo  "
                                        <li> <b>ประเภทรถ : </b>"; ?><?php
                                            if(empty($row["ct_name"])){//cars_type
                                                echo "N/A";
                                            }else {
                                                echo $row["ct_name"];
                                            } ?> 
                                        </li> <?php  echo "
                                        <li> <b>ประเทศ : </b>"; ?><?php
                                            if(empty($row["cc_name"])){//cars_country
                                                echo "N/A";
                                            }else {
                                                echo $row["cc_name"];
                                            } ?>
                                        </li> <?php echo "
                                        <li> <b>ขนาดเครื่องยนต์ : </b>"; ?><?php
                                            if(empty($row["cars_engine"])){
                                                echo "N/A";
                                            }else {
                                                echo $row["cars_engine"]." C.C.";
                                            } ?>
                                        </li> <?php echo "
                                        <li> <b>ราคา : </b>" ; ?><?php
                                            if(empty($row["cars_price"])){
                                                echo "N/A";
                                            }else {
                                                echo $row["cars_price"]." บาท";
                                            } ?>
                                        </li>
                                    </ul>
                                </td>
                                <td align="center"> <a href="data_edit.php?id=<?php echo $row["cars_id"]; ?>" >Edit</a> </td>
                                <td align="center"> <a href="data_delete.php?id=<?php echo $row["cars_id"]; ?>" target="_blank">Delete</a> </td>
                            </tr>
                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>
                            <script><!-- # JavaScript for Modal Image -->
                                // Get the modal
                                    var modal = document.getElementById("myModal");
                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                    var img = document.getElementById("myImg");
                                    var modalImg = document.getElementById("img01");
                                    var captionText = document.getElementById("caption");
                                    img.onclick = function(){
                                        modal.style.display = "block";
                                        modalImg.src = this.src;
                                        captionText.innerHTML = this.alt;
                                    }
                                // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];
                                // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() { 
                                        modal.style.display = "none";
                                    }
                            </script><?php 
                        } ?> 
                    </tbody>
                </table> 
            </div><?php
                    }else {
                        echo "No data Select.";
                    } ?> 
        </div>
     </main>
     <footer class="container mt-4">
        <div class="row">
            <div class="col">
            <p class="text-center">Design by <a href="#">Zetiz Labs</a></p>
            </div>
        </div>
     </footer> <?php
    }else{
        echo "<center><h1>Please login first! .</h1>";?>
        Click here to 
                <a href="dt_login.php" tite="Login">LogIn  
            || <a href="registration.php" tite="Register">Register. <br> 
        <?php 
            // echo $_SESSION["username"];
            // print_r($_SESSION["username"]);
    } ?>
<!-- # Tester Home
    <hr>
    <h1> My Data </h1>

    <p>
        <a href="data_add.php">เพิ่มข้อมูล</a> 
    </p>


    <?php
         $sql_string = "SELECT * FROM in_mydata";
         $result = $conn->query($sql_string);
 
         //print_r($result);
         if ($result->num_rows > 0) {
            $i=0;
            while ($row = $result->fetch_assoc()) {?>
            <li>
                <?= $row["md_id"]?> - <?=$row["md_text"]?> - <?=$row["md_info"]?> __
                <a href="data_edit.php?id=<?=$row["md_id"]?>" target="_blank">แก้ไข</a>
                <a href="data_delete.php?id=<?=$row["md_id"]?>" target="_blank">ลบ</a>
            </li>

                
    <?php
            }
 
         }else {
             echo "No data Select.";
         }
?> -->

    </center>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>