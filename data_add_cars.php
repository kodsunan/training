<?php
        require("connect_db.php");
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> เพิ่มข้อมูล </title>

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
        <?php 
            // $strSQL = "SELECT * FROM in_cars_type ORDER BY ct_id ASC";
            // $res = $conn->query($strSQL);
            // //print_r($res);
            // //echo $strSQL;

            // if ($conn->query($strSQL) === TRUE) {
            //     echo "New record created successfully";
            // } else {
            //     echo "Error: " . $strSQL . "<br>" . $conn->error;
            // }
        ?>
    <?php

        if ($_SERVER["REQUEST_METHOD"]==="POST") {

            move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);	
            $carImg = $_FILES["image"]["name"];
            
            $carBrand = $_POST["input_carBrand"];       $carModel = $_POST["input_carModel"]; 
            $carColour = $_POST["input_carColour"];     $carColourCode = $_POST["input_carColourCode"];
            $carYears = $_POST["input_carYears"];       $carType = $_POST["input_carType"];
            $carCountry = $_POST["input_carCountry"];   $carEngine = $_POST["input_carEngine"];
            $carPrice = $_POST["input_carPrice"];

            if ( !empty($carImg) || !empty($carBrand) || !empty($carModel) || !empty($carColour) || !empty($carColourCode) || !empty($carYears) || 
                 !empty($carType) || !empty($carCountry) || !empty($carEngine) || !empty($carPrice) ) {

                //echo "Hello, ".$my_text." ! ";

                $sql_string = " INSERT IGNORE INTO in_cars(
                                                 cars_img, cars_brand, cars_model, cars_colour,
                                                 cars_colour_code, cars_years, cars_type,
                                                 cars_country, cars_engine, cars_price
                                                 )
                                
                                VALUE ('{$carImg}','{$carBrand}','{$carModel}','{$carColour}',
                                        '{$carColourCode}','{$carYears}','{$carType}',
                                        '{$carCountry}','{$carEngine}','{$carPrice}'
                                ) ";// "value 'NOW()'";#--<Update TimeString>

                //echo $sql_string;
                if ($conn->query($sql_string) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql_string . "<br>" . $conn->error;
                }

            }else{
                echo "**** Input Empty ****";
            }

        }

    ?>

        <p><div align="center">
              <a href="data_cars.php">หน้าแรก</a> 
            | <a href="data_add_cars.php">เพิ่มข้อมูล</a>
            <!-- |<a href="data_.php">เพิ่มข้อมูล</a>-->
        </p>
<h1><div align="center">Add Cars Data</h1>
    <form class="" action="?" method="post" enctype="multipart/form-data">

        Car Image :
            <input type="file"  name="image" value="" multiple=""/>
            <!--<input type="submit" name="submit" value="upload"/>-->
            
        <br><br>
        Cars Brand : <!-- <input type="text" name="input_carBrand" value="" placeholder=" Car Brand " require> -->
        <select name="input_carBrand" id="prov">
            <option value=""><-- Please Select Type --></option>
            <?php
            $strSQL = "SELECT * FROM in_cars_brand ORDER BY cb_id ASC";
            $res = $conn->query($strSQL);
            //print_r($res);
            if ($res->num_rows > 0) {
                $i=0;  $objRes='';

                while($objRes = $res->fetch_assoc()){ ?>
                    <option value="<?php echo $objRes["cb_id"];?>">
                        <?php echo $objRes["cb_id"]." - ".$objRes["cb_name"];?>
                    </option>
			    <?php
                }
            }else {
                echo "No data.";
            } ?>
        </select>
        <br><br>
        Cars Model : <input type="text" name="input_carModel" value="" placeholder=" Car Model" require><br><br>
        Cars Colour : <input type="text" name="input_carColour" value="" placeholder=" Car Colour"><br><br>
        Colour Code : <input type="text" name="input_carColourCode" value="" placeholder=" Colour Code"><br><br>
        
        <?php
            // set start and end year range
            $yearArray = range(1990, 2019);
        ?>
        Years : <!-- <input type="text" name="input_carYears" value="" placeholder=" Years"> -->
        <!-- displaying the dropdown list -->
            <select name="input_carYears">
                <option value="">Select Year</option>
                <?php
                foreach ($yearArray as $year) {
                    // if you want to select a particular year
                    $selected = ($year == 2019) ? 'selected' : '';
                    echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                }
                ?>
            </select>
        
        <br><br>
        
         Cars Type : <!--<input type="text" name="input_carType" value="" placeholder=" Cars Type"> -->
        <select name="input_carType" id="prov">
            <!-- <option value="รถยนต์นั่งขนาดเล็กมาก" >รถยนต์นั่งขนาดเล็กมาก</option>
            <option value="รถกระบะขนาดกลาง" >รถกระบะขนาดกลาง</option>
            <option value="รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก" >รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก</option>
            <option value="รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง" >รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง</option>
            <option value="รถเก๋งอเนกประสงค์" >รถเก๋งอเนกประสงค์</option> -->

            <option value=""><-- Please Select Type --></option>
            <?php
            $strSQL = "SELECT * FROM in_cars_type ORDER BY ct_id ASC";
            $res = $conn->query($strSQL);
            //print_r($res);
            if ($res->num_rows > 0) {
                $i=0;  $objRes='';

                while($objRes = $res->fetch_assoc()){ ?>
                    <option value="<?php echo $objRes["ct_id"];?>">
                        <?php echo $objRes["ct_id"]." - ".$objRes["ct_name"];?>
                    </option>
			    <?php
                }
            }else {
                echo "No data.";
            } ?>
        </select>
        <br><br>

        <b> Country </b><br><br> 
        <!-- <input name="input_carCountry" type="radio"  id="radio1" value="Japan" checked="checked"/>Japan 
        <input name="input_carCountry" type="radio"  id="radio2" value="South Korea" checked="checked"/>South Korea 
        <input name="input_carCountry" type="radio"  id="radio3" value="England" checked="checked"/>England 
        <input name="input_carCountry" type="radio"  id="radio4" value="USA"  checked="checked"/>USA  -->
        <?php 
             $str_SQL = "SELECT * FROM in_cars_country ORDER BY cc_id ASC";
             $r = $conn->query($str_SQL);
             //print_r($r);
            if ($r->num_rows > 0) {
                 $i=0;  $objres='';
                
                while($objres = $r->fetch_assoc()){?>
                    
                    <input name="input_carCountry" type="radio" id="radio<?php $i+1;?>" 
                        value="<?php echo $objres["cc_id"];?>"  checked="checked" 
                    /> <?php echo $objres["cc_id"]." - ".$objres["cc_name"]; ?><br><?php
                }
            }else {
                echo "No data.";
            }
        ?>
        <br>
        Cars Engine : <input type="text" name="input_carEngine" value="" placeholder=" Car Engine"><br><br>
        Cars Price : <input type="text" name="input_carPrice" value="" placeholder=" Car Price">
        
        <br><br>
        <p><input type="submit" name="submit" value="Submit"/></p>
        <button type="submit" name="Bbutton" ><a href="data_cars.php">Back</a></button>

    </form> 
    <!-- =============================================================================== -->
<!-- 
    <?php

        if ($_SERVER["REQUEST_METHOD"]==="POST") {

            if ( !empty($_POST["input_mytext"]) || !empty($_POST["input_myinfo"]) ) {

                $my_text =$_POST["input_mytext"];
                $my_info =$_POST["input_myinfo"];
                //echo "Hello, ".$my_text." ! ";

                $sql_string = " INSERT INTO in_mydata(md_text,md_info) VALUE ('{$my_text}','{$my_info}') ";
                //echo $sql_string;
                if ($conn->query($sql_string) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql_string . "<br>" . $conn->error;
                }

            }else{
                echo "**** Input Empty ****";
            }

        }

    ?>

    <form class="" action="?" method="post">

        <input type="text" name="input_mytext" value="" placeholder="my text">
        <input type="text" name="input_myinfo" value="" placeholder="my info">
        
        <button type="submit" name="button"> ส่งข้อมูล </button>

    </form> -->

    
</body>
</html>