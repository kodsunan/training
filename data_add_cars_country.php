<?php
        require("connect_db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มประเทศผู้ผลิตรถยนต์</title>
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php

    if ($_SERVER["REQUEST_METHOD"]==="POST") {

        if ( !empty($_POST["input_ccname"])  ) {

            $my_ccname =$_POST["input_ccname"];
            //$my_info =$_POST["input_myinfo"];
            //echo "Hello, ".$my_text." ! ";

            $sql_string = " INSERT INTO in_cars_country(cc_name) VALUE ('{$my_ccname}') ";
            //echo $sql_string;
            if ($conn->query($sql_string) === TRUE) {
                echo "New record created successfully";
                echo "<a href='data_cars_country.php'>กลับ</a>";

            } else {
                echo "Error: " . $sql_string . "<br>" . $conn->error;
            }

        }else{
        echo "**** Input Empty ****";
        }

    }

?>
<p><div align="center">
              <a href="data_cars.php">หน้าแรก</a> | <a href="data_add.php">เพิ่มข้อมูล</a>
            | <a href="data_cars_type.php">ประเภทรถยนต์</a> | <a href="data_cars_country.php">ประเทศผู้ผลิตรถยนต์</a>

            <!-- |<a href="data_.php">เพิ่มข้อมูล</a>-->
        </p>
<h1><div align="center">ประเทศผู้ผลิตรถยนต์</h1>

<form class="" action="?" method="post">

    ประเทศผู้ผลิต : <input type="text" name="input_ccname" value="" placeholder="Country's name">
    <!-- <input type="text" name="input_myinfo" value="" placeholder="my info"> -->

    <br><br>

    <p><input type="submit" name="submit" value="ส่งข้อมูล"/></p>
    <button type="submit" name="Bbutton"><a href="data_cars_country.php">กลับ</a></button>


</form>
</body>
</html>