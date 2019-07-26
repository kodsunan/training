<!DOCTYPE html>
<html lang="en">
<?php
    //----- name of title --------
    define("TITLE","HW PHP D4");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php  echo TITLE; ?></title>
    
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

<body>
    <?php
        $cars_info = array(
            array(
            "type"=>"รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง", 
            "country"=>"Japan", 
            "engine"=>3000,
            "price"=>1900000),
            array("type"=>"รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก", "country"=>"Japan", "engine"=>1800,"price"=>1500000),
            array("type"=>"รถยนต์นั่งขนาดเล็กมาก", "country"=>"Japan", "engine"=>1500, "price"=>600000),
            array("type"=>"รถยนต์นั่งขนาดเล็กมาก", "country"=>"Japan", "engine"=>1500, "price"=>650000),
            array("type"=>"รถกระบะขนาดกลาง", "country"=>"Japan", "engine"=>2500, "price"=>900000),
            array("type"=>"", "country"=>"", "engine"=>0, "price"=>0)
        );
        $cars = array(
            array(
            "colour"=>"Red", 
            "colour_code"=>"#db0824", 
            "brand"=>"TOYOTA", 
            "model"=>"YARIS",
            "years"=>2019, 
            "more_info"=>$cars_info[2] ),
            array("colour"=>"Black", "colour_code"=>"#110000", "brand"=>"TOYOTA", "model"=>"REVO",
                "years"=>2018, "more_info"=>$cars_info[4] ),
            array("colour"=>"Black", "colour_code"=>"#000000", "brand"=>"HONDA", "model"=>"JAZZ",
                "years"=>2017, "more_info"=>$cars_info[3] ),
            array("colour"=>"Blonde", "colour_code"=>"#faf0be", "brand"=>"HONDA", "model"=>"CR-V",
                "years"=>2017, "more_info"=>$cars_info[1] ),
            array("colour"=>"Silver", "colour_code"=>"#C0C0C0", "brand"=>"ISUZU", "model"=>"MU-X",
                "years"=>2016, "more_info"=>$cars_info[0] ),
            array(
                "colour"=>"Gold", 
                "colour_code"=>"#D3CC74", 
                "brand"=>"BMW", 
                "model"=>"M3",
                "years"=>2019, 
                "more_info"=>$cars_info[5])
        );
        // $lis = array('ประเภทรถ','ประเทศ','ขนาดเครื่องยนต์','ราคา');
    ?>

    <?php 
    if (true) { 
    ?>
        <h1>Cars Info 2 (ver. Multi-Array)</h1>
    <?php
    }
    ?>
    <table class="my-table">
        <tr>
            <th>#</th>
            <th>ยี่ห้อ</th>
            <th>โมเดล</th>
            <th>ปี</th>
            <th>สี</th>
            <th>รายละเอียด</th>
        </tr>
        <?php
            foreach ($cars as $key => $value) {
        ?>
        <tr>
            <td><?=($key+1)?></td>
            <td><?=$value["brand"]?></td>
            <td><?=$value["model"]?></td>
            <td><?=$value["years"]?></td>
            
            <td><font color=<?=$value["colour_code"]?>> <?= $value["colour"] ?> </font></td>

            <td>      
                <ul>
                    <?php
                        echo   
                       "<li> <b>ประเภทรถ : </b>";
                    ?><?php
                            if(empty($value["more_info"]["type"])){
                                echo "N/A";
                            }else {
                                echo $value["more_info"]["type"];
                            }
                       ?></li>
                    <?php 
                        echo
                         "<li> <b>ประเทศ : </b>";
                    ?><?php
                            if(empty($value["more_info"]["country"])){
                                echo "N/A";
                            }else {
                                echo $value["more_info"]["country"];
                            }
                        ?></li>
                    <?php
                        echo
                          "<li> <b>ขนาดเครื่องยนต์ : </b>";
                    ?><?php
                          if(empty($value["more_info"]["engine"])){
                              echo "N/A";
                          }else {
                              echo $value["more_info"]["engine"]." C.C.";
                          }
                        ?></li>
                    <?php
                        echo
                          "<li> <b>ราคา : </b>" ;
                    ?><?php
                            if(empty($value["more_info"]["price"])){
                                echo "N/A";
                            }else {
                                echo $value["more_info"]["price"]." บาท";
                            }
                        ?></li>
                    
                </ul>

                    
                <?php    // foreach ($value["more_info"] as  $val) <!-- //  echo  $val."<br/>";?>
                
        <?php           
            }
        ?>
            </td>
        </tr>

        <?php 
        //} 
        //print_r($b);
        //var_dump($value);
        ?>

    </table>
</body>
</html>