
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลบข้อมูล</title>
</head>
<body>

    <?php
    header('Content-Type: text/html; charset=UTF-8');
        require("connect_db.php");

    // Delete Location: data_cars.php
    if (!empty($_GET["id"])) {
            header("Location: data_cars.php");
       
        $get_id = $_GET["id"];

        $sql_string="DELETE FROM `in_cars` WHERE cars_id=". $get_id;

        if ($conn->query($sql_string) === TRUE) {
            echo "New record created successfully <br>";
            echo "<a href='data_cars.php'>กลับ</a>";
        } else {
            echo "Error: " . $sql_string . "<br>" . $conn->error;
        }
    }
    // Delete Location: data_cars_country.php
    if (!empty($_GET["id"])) {
        header("Location: data_cars_country.php");
   
        $get_id = $_GET["id"];

        $sql_string="DELETE FROM `in_cars_country` WHERE cc_id=". $get_id;

        if ($conn->query($sql_string) === TRUE) {
            echo "New record created successfully <br>";
            echo "<a href='data_cars_country.php'>กลับ</a>";
        } else {
            echo "Error: " . $sql_string . "<br>" . $conn->error;
        }
    }
    // Delete Location: data_cars_type.php
    if (!empty($_GET["id"])) {
        header("Location: data_cars_type.php");
   
        $get_id = $_GET["id"];

        $sql_string="DELETE FROM `in_cars_type` WHERE ct_id=". $get_id;

        if ($conn->query($sql_string) === TRUE) {
            echo "New record created successfully <br>";
            echo "<a href='data_cars_country.php'>กลับ</a>";
        } else {
            echo "Error: " . $sql_string . "<br>" . $conn->error;
        }
    }
    ?>
    
</body>
</html>