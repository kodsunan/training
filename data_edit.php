

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูล</title>

     <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <p><div align="center">   
          <a href="data_cars.php">หน้าแรก</a> 
        | <a href="data_add_cars.php">เพิ่มข้อมูล</a>
        <!-- | <a href="data_delete.php">ลบข้อมูล</a> -->
    </p>
    <h1><div align="center">Edit/Update Cars Data</h1>

    <?php
        require("connect_db.php");

        //--- Post
        if ($_SERVER["REQUEST_METHOD"]==="POST") {

                move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);			
                $carImg=$_FILES["image"]["name"];
            
                $carBrand = $_POST["input_carBrand"];       $carModel = $_POST["input_carModel"]; 
                $carColour = $_POST["input_carColour"];     $carColourCode = $_POST["input_carColourCode"];
                $carYears = $_POST["input_carYears"];       $carType = $_POST["input_carType"];
                $carCountry = $_POST["input_carCountry"];   $carEngine = $_POST["input_carEngine"];
                $carPrice = $_POST["input_carPrice"]; 

            if (!empty($carImg) || !empty($carBrand) || !empty($carModel) || !empty($carColour) || !empty($carColourCode) || !empty($carYears) || 
                !empty($carType) || !empty($carCountry) || !empty($carEngine) || !empty($carPrice) ) {

                $update_id = $_POST["input_id"];
                //echo "Hello, ".$my_text." ! ";

                $sql_string = " UPDATE  in_cars SET 
                                                 cars_img='{$carImg}',      cars_brand='{$carBrand}',
                                                 cars_model='{$carModel}',  cars_colour='{$carColour}',
                                                 cars_colour_code='{$carColourCode}',cars_years='{$carYears}', 
                                                 cars_type='{$carType}',    cars_country='{$carCountry}',
                                                 cars_engine='{$carEngine}', cars_price='{$carPrice}'
                                                 
                                                WHERE cars_id = ".$update_id;
                //echo $sql_string;

                if ($conn->query($sql_string) === TRUE) {
                    echo "New record created successfully <br>";
                    echo "<a href='data_cars.php'>กลับ</a>";
                } else {
                    echo "Error: " . $sql_string . "<br>" . $conn->error;
                }

            }else{
                echo "**** Input Empty ****";
            }

        }

        //--- Select data prepare to edit ------

        if (!empty($_GET["id"])) {
            //header("Location: data_cars.php");
       
            $get_id = $_GET["id"];

            $sql_string = "SELECT * FROM in_cars WHERE cars_id = ".$get_id;
            //echo  $sql_string;
            $result = $conn->query($sql_string);
            $row =$result->fetch_assoc();

            $cb = $row["cars_brand"];
            $cbr = explode(",",$cb);

            $ct = $row["cars_type"];
            $c = explode(",",$ct);

            $a=$row["cars_country"];
            $b=explode(",",$a);
            //print_r($b);

            $y=$row["cars_years"];
            $yr = explode(",",$y);

            if($row['cars_img'] != ""){ ?>
                <img src="images/<?php echo $row['cars_img']; ?>" width="100px" height="100px" style="border:1px solid #333333; margin-left: 30px;">
            <?php 
            }else{ ?>
                <img src="images/noImg.png" width="100px" height="100px" style="border:1px solid #333333; margin-left: 30px;">
            <?php } 
    ?>
       <form class="" action="?" method="post" enctype="multipart/form-data">

            Cars Image : 
            <input type="file" name="image" style="margin-top:-115px;" >
            <br><br>
            Cars Brand : 
            <select name="input_carBrand" id="prov">
                <?php
                $strSQL = "SELECT * FROM in_cars_brand ORDER BY cb_id ASC";
                $res = $conn->query($strSQL);
                //print_r($res);
                if ($res->num_rows > 0) {
                    $i=0;  $objRes='';

                    while($objRes = $res->fetch_assoc()){ ?>
                        <option value="<?php echo $objRes["cb_id"];?>" <?php
                            if (in_array($objRes["cb_id"],$cbr)) {
                                echo "selected";
                            }?>
                        ><?php echo $objRes["cb_id"]." - ".$objRes["cb_name"];?>
                        </option><?php
                    }
                }else {
                    echo "No data.";
                } ?>
            </select><br><br>
            Cars Model : 
            <input type="text" name="input_carModel" value="<?=$row["cars_model"]?>" placeholder=" Car Model" require><br><br>
            Cars Colour : 
            <input type="text" name="input_carColour" value="<?=$row["cars_colour"]?>" placeholder=" Car Colour"><br><br>
            Colour Code : 
            <input type="text" name="input_carColourCode" value="<?=$row["cars_colour_code"]?>" placeholder=" Colour Code"><br><br>
            
            <?php
            // set start and end year range
                $yearArray = range(1990, 2019);
            ?>
            Years : 
            <!-- <input type="text" name="input_carYears" value="<?=$row["cars_years"]?>" placeholder=" Years"> -->
            <select name="input_carYears">
                <option value="<?=$row["cars_years"]?>">Select Year</option>
                <?php
                foreach ($yearArray as $year) {
                    // if you want to select a particular year
                    $selected = ($year == $yearArrays) ? 'selected' : '';
                    echo ''
                ?>
                        <option <?=$selected?> value="<?=$year?>"
                            <?php
                                if (in_array("$year",$yr)) {
                                    echo "selected";
                                }
                            ?>
                        ><?=$year?></option> <?php ;
                
                }
                ?>
            </select>            
            <br><br>
            
            Cars Type : 
            <!-- <input type="text" name="input_carType" value="<?=$row["cars_type"]?>" placeholder=" Cars Type"> -->
            <select name="input_carType" id="prov">
                <?php
                $strSQL = "SELECT * FROM in_cars_type ORDER BY ct_id ASC";
                $res = $conn->query($strSQL);
                //print_r($res);
                if ($res->num_rows > 0) {
                    $i=0;  $objRes='';

                    while($objRes = $res->fetch_assoc()){ ?>
                        <option value="<?php echo $objRes["ct_id"];?>" <?php
                            if (in_array($objRes["ct_id"],$c)) {
                                echo "selected";
                            }?>
                        ><?php echo $objRes["ct_id"]." - ".$objRes["ct_name"];?>
                        </option><?php
                    }
                }else {
                    echo "No data.";
                } ?>
            <!-- 
                <option value="รถยนต์นั่งขนาดเล็กมาก" 
                    <?php
                        if (in_array("รถยนต์นั่งขนาดเล็กมาก",$c)) {
                            echo "selected";
                        }
                    ?>
                >รถยนต์นั่งขนาดเล็กมาก</option>

                <option value="รถกระบะขนาดกลาง"
                    <?php
                        if (in_array("รถกระบะขนาดกลาง",$c)) {
                            echo "selected";
                        }
                    ?>
                >รถกระบะขนาดกลาง</option>

                <option value="รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก"
                    <?php
                        if (in_array("รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก",$c)) {
                            echo "selected";
                        }
                    ?>
                >รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก</option>

                <option value="รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง" 
                    <?php
                        if (in_array("รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง",$c)) {
                            echo "selected";
                        }
                    ?>
                >รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง</option>

                <option value="รถเก๋งอเนกประสงค์" 
                    <?php
                        if (in_array("รถเก๋งอเนกประสงค์",$c)) {
                            echo "selected";
                        }
                    ?>
                >รถเก๋งอเนกประสงค์</option> 
            -->
            </select><br><br>
            
            <b> Country </b><br><br>
            <!-- <input type="text" name="input_carCountry" value="<?=$row["cars_country"]?>" placeholder=" Country" > -->
            <?php 
                $str_SQL = "SELECT * FROM in_cars_country ORDER BY cc_id ASC";
                $r = $conn->query($str_SQL);
                //print_r($r);
                if ($r->num_rows > 0) {
                 $i=0;  $objres='';
                
                    while($objres = $r->fetch_assoc()){?>
                        <input name="input_carCountry" type="radio" id="radio<?php $i+1;?>" 
                            value="<?php echo $objres["cc_id"];?>"  
                            <?php
                            if (in_array( $objres["cc_id"],$b)) {
                                echo "checked";
                            } ?>
                        /> <?php echo $objres["cc_id"]." - ".$objres["cc_name"]; ?><br><?php
                    }
                }else {
                    echo "No data.";
                }
            ?>
            
            <!-- <input name="input_carCountry" type="radio"  id="radio1" value="Japan"  
                <?php
                if (in_array("Japan",$b)) {
                    echo "checked";
                }
                
                ?>
            >Japan 
            <input name="input_carCountry" type="radio"  id="radio2" value="South Korea" 
                <?php
                if (in_array("South Korea",$b)) {
                    echo "checked";
                }
                
                ?>
            >South Korea 
            <input name="input_carCountry" type="radio"  id="radio3" value="England" 
                <?php
                if (in_array("England",$b)) {
                    echo "checked";
                }
                
                ?>
            >England 
            <input name="input_carCountry" type="radio"  id="radio4" value="USA" 
                <?php
                if (in_array("USA",$b)) {
                    echo "checked";
                }
                
                ?>
            >USA  -->
            <br>

            Cars Engine : 
            <input type="text" name="input_carEngine" value="<?=$row["cars_engine"]?>" placeholder=" Car Engine"><br><br>
            Cars Price : 
            <input type="text" name="input_carPrice" value="<?=$row["cars_price"]?>" placeholder=" Car Price">
            
            <input type="hidden" name="input_id" value="<?=$row["cars_id"]?>" >

        <br><br>

            <button type="submit" name="button"> ส่งข้อมูล </button>
            <button type="submit" name="Bbutton"><a href="data_cars.php">Back</a></button>

        </form>
    <?php
        }
    ?>

    <!-- ==========================================Info Test Edit============================================== -->

    <!-- <?php
        require("connect_db.php");

        //--- Post
        if ($_SERVER["REQUEST_METHOD"]==="POST") {

            if ( !empty($_POST["input_mytext"]) || !empty($_POST["input_myinfo"]) ) {

                $update_text =$_POST["input_mytext"];
                $update_info =$_POST["input_myinfo"];
                $update_id = $_POST["input_id"];
                //echo "Hello, ".$my_text." ! ";

                $sql_string = " UPDATE  in_mydata SET md_text='{$update_text}',md_info='{$update_info}' WHERE md_id = ".$update_id;
                //echo $sql_string;

                if ($conn->query($sql_string) === TRUE) {
                    echo "New record created successfully <br>";
                    echo "<a href='data_cars.php'>กลับ</a>";
                } else {
                    echo "Error: " . $sql_string . "<br>" . $conn->error;
                }

            }else{
                echo "**** Input Empty ****";
            }

        }

        //--- Select data prepare to edit ------

        if (!empty($_GET["id"])) {
            //header("Location: data_cars.php");
       
            $get_id = $_GET["id"];

            $sql_string = "SELECT * FROM in_mydata WHERE md_id = ".$get_id;
            //echo  $sql_string;
            $result = $conn->query($sql_string);
            $row =$result->fetch_assoc();

    ?>
       <form class="" action="?" method="post">

            <input type="text" name="input_mytext" value="<?=$row["md_text"]?>" placeholder="my text">
            <input type="text" name="input_myinfo" value="<?=$row["md_info"]?>" placeholder="my info">
            <input type="hidden" name="input_id" value="<?=$row["md_id"]?>" >

            <button type="submit" name="button"> ส่งข้อมูล </button>

        </form>
    <?php
        }
    ?> -->
</body>
</html>