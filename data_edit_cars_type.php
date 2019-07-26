<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขประเทศผู้ผลิต</title>
     <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <p><div align="center">   
          <a href="data_cars.php">หน้าแรก</a> | <a href="data_add_cars.php">เพิ่มข้อมูล</a>
        | <a href="data_cars_type.php">ประเภทรถยนต์</a> | <a href="data_cars_country.php">ประเทศผู้ผลิตรถยนต์</a>

        <!-- | <a href="data_delete.php">ลบข้อมูล</a> -->
    </p>
    <h1><div align="center">Edit/Update Cars Type Data</h1><br>
    
<?php
        require("connect_db.php");

        //--- Post
        if ($_SERVER["REQUEST_METHOD"]==="POST") {

            if ( !empty($_POST["input_ctname"]) ) {

                $update_ctname =$_POST["input_ctname"];
                $update_id = $_POST["input_id"];
                //echo "Hello, ".$my_text." ! ";

                $sql_string = " UPDATE  in_cars_type SET ct_name='{$update_ctname}' WHERE ct_id = ".$update_id;
                //echo $sql_string;

                if ($conn->query($sql_string) === TRUE) {
                    //echo "New record created successfully <br>";
                    echo "<a href='data_cars_type.php'>กลับ</a>";
                } else {
                    echo "Error: " . $sql_string . "<br>" . $conn->error;
                }

            }else{
                echo "**** Input Empty ****";
            }

        }

        //--- Select data prepare to edit ------
        if (!empty($_GET["id"])) {
            //header("Location: data_cars_type.php");
       
            $get_id = $_GET["id"];

            $sql_string = "SELECT * FROM in_cars_type WHERE ct_id = ".$get_id;
            //echo  $sql_string;
            $result = $conn->query($sql_string);
            $row =$result->fetch_assoc();

    ?>
       <form class="" action="?" method="post">

            <b>ประเภทรถยนต์ : </b><input type="text" name="input_ctname" value="<?=$row["ct_name"]?>" placeholder="Type's name">
            <!-- <input type="text" name="input_myinfo" value="<?=$row["md_info"]?>" placeholder="my info"> -->
            <br><input type="hidden" name="input_id" value="<?=$row["ct_id"]?>" >
            <br>
            <p><button type="submit" name="button"> ส่งข้อมูล </button></p>
            <button type="submit" name="Bbutton"><a href="data_cars_type.php">กลับ</a></button>


        </form>
    <?php
        }
    ?>


</body>
</html>