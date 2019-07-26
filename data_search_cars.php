<?php
        require("connect_db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Model Cars</title>
     <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <?php
        if (!empty($_REQUEST['c_model'])){
            
            $cmodel=$_GET['c_model'];

            $sql=" SELECT * FROM in_cars WHERE cars_model like '%".$cmodel."%' ";
            //$q=mysql_query($sql);
            $q = $conn->query($sql);
            while ($row = mysql_fetch_array($q)){  
                echo 'Primary key: ' .$row['PRIMARYKEY'];  
                echo '<br /> Code: ' .$row['Code'];  
                echo '<br /> Description: '.$row['Description'];  
                echo '<br /> Category: '.$row['Category'];  
                echo '<br /> Cut Size: '.$row['CutSize'];   
                }  
        }
    ?>
    
</body>
</html>