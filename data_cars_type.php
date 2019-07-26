<?php
        require("connect_db.php");
        //----- name of title --------
    define("Type","Table Cars_Type 2019 (v.DB)");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo Type;?></title>
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
    <style>
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
    </style>
</head>
<body><center>
    
    <div align="left"><button onclick="history.go(-1);">กลับ </button></div>
    <h1> รายการประเภทรถยนต์ </h1>
    <p>
        <a href="data_cars.php">หน้าแรก</a> 
        | <a href="data_add_cars_type.php">เพิ่มประเภทรถยนต์</a>
        | <a href="data_cars_country.php">ประเทศผู้ผลิตรถยนต์</a> 
    </p>

    <table class="my-table">
        <tr align="center">
            <th>#</th>
            <th>ประเภทรถยนต์</th>
            <th><strong>แก้ไข</strong></th>
            <th><strong>ลบ</strong></th>
        </tr>
    <?php
         $sql_string = "SELECT * FROM in_cars_type";
         $result = $conn->query($sql_string);
 
         //print_r($result);
         if ($result->num_rows > 0) {
            $i=0;
            while ($row = $result->fetch_assoc()) {?>
            <tr>
                <td><div align="center">
                    <?= $row["ct_id"]?></td> 
                <td><?=$row["ct_name"]?></td>
                
                <td><div align="center">
                    <a href="data_edit_cars_type.php?id=<?=$row["ct_id"]?>" >แก้ไข</a></td>
                <td><div align="center">
                    <a href="data_delete.php?id=<?=$row["ct_id"]?>" target="_blank">ลบ</a></td>
            </div></tr>

                
    <?php
            }
 
         }else {
             echo "No data Select.";
         }
    ?>
    </table>
</center></body>
</html>