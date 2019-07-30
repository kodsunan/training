<!DOCTYPE html>

<?php
    //----- name of title --------
    define("TITLE","Training PHP Day 1 - 4");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php  echo TITLE; ?></title>

<?php #Day4 ---------- Multi-ARRAY (while , do , for)------------?>

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
		.pump-class {
		  background-color: #7FFFD4;
		}
    </style>

</head>

<body class="pump-class">
    <?php 
        $cars = array(
        array (
        "#"=>1,
        "Brand"=>"Benz", 
        "Model"=>"M3",
        "Color"=>"Red",
        "Year"=>2019,
        "Price"=>""),
        array(
        "#"=>2,
        "Brand"=>"Toyota",
        "Model"=>"ViOs",
        "Color"=>"Bronze",
        "Year"=>2023,
        "Price"=>"3,500,000"),
        array(
        "#"=>3,
        "Brand"=>"Mazda", 
        "Model"=>"High",
        "Color"=>'Black',
        "Year"=>2015,
        "Price"=>"5,500,000"),
        array (
        "#"=>4,
        "Brand"=>"Limucine", 
        "Model"=>"Lux",
        "Color"=>'Blue',
        "Year"=>1997,
        "Price"=>""),
        array(
        "#"=>5,
        "Brand"=>"BMW", 
        "Model"=>"Cooper",
        "Color"=>'White',
        "Year"=>2018,
        "Price"=>"1,400,000"),
        array(
        "#"=>6,
        "Brand"=>"Honda",
        "Model"=>"Turbo",
        "Color"=>'Gold',
        "Year"=>2000,
        "Price"=>"")
        );
    ?>
    <?php 
    if (true) { 
    ?>
        <h1>Cars Info</h1>
    <?php
    }
    ?>
    
    <table class="my-table">
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            <th>Year</th>
            <th>Price</th>
        </tr>
        
        <?php
            foreach ($cars as $key => $value) {
        ?>
        <tr>
            <td><?=($key+1)?></td>
            <td><?=$value["Brand"]?></td>
            <td><?=$value["Model"]?></td>
            <td><?=$value["Color"]?></td>
            <td><?=$value["Year"]?></td>
            <td><?php
                if( empty($value["Price"])){
                    echo "No data";
                }else {
                    echo $value["Price"];
                }
                ?>
            </td>
        </tr>

        <?php } 
        ?>
    </table>

<?php 

 
     //echo "<b># Cars</b><br><br>";
#Type 1 :: foreach ------------------------------------------------------
    
        // echo "<ol>";
        
        // foreach ($cars as $key => $value) {
        //     if ($value["Price"] == null) {
        //    // echo "<li><b>$key:</b> $value  </li>";
        //     echo  "<li>
        //         <b>Brand:</b> ".$value["Brand"]." , ".
        //       "<b>Model:</b> ".$value["Model"]." , ".
        //       "<b>Color:</b> ".$value["Color"]." , ".
        //       "<b>Year:</b> ".$value["Year"]." , ".
        //       "<b>Price:</b> ".($value["Price"]="No Data")."<br></li>";
        //     }else {
        //         echo  "<li>
        //         <b>Brand:</b> ".$value["Brand"]." , ".
        //       "<b>Model:</b> ".$value["Model"]." , ".
        //       "<b>Color:</b> ".$value["Color"]." , ".
        //       "<b>Year:</b> ".$value["Year"]." , ".
        //       "<b>Price:</b> ".$value["Price"]."<br></li>";
        //     }
        // }
        // echo "<br></ol>";
    

    // foreach ($cars as $car) {
    //     foreach ($car as $key => $value) {
    //         echo "</n>".$value." , ";
    //     }
    //     echo "<br>";
    // }
#-----------------------------------------------------------------------------------
// $style = array (
//     array ("Brand","Model","Color","Year")
// );
// $stl=count($style);
    // $cl=count($cars);
    //     for ($i=0; $i < $cl ; $i++) { 
    //         for ($j=0; $j < 3; $j++) { 
    //             echo  $cars[$i][$j]." , ";
    //         }
    //         echo "  <br>";   
    //     }   
    
#-----------------------------------------------------------------------------------
//     $cl=count($cars);
// for ($i=0; $i < $cl ; $i++) { 
//     echo  $cars[$i]['Brand']." , ".$cars[$i]['Model']." , ".$cars[$i]['Color']." , ".$cars[$i]['Year']."  <br>";
// }
// echo "<hr>";
#-----------------------------------------------------------------------------------
// echo 
//     $cars[0][0]." , ",$cars[0][1]." , ",$cars[0][2]."<br>",
//     $cars[1][0]." , ",$cars[1][1]." , ",$cars[1][2]."<br>",
//     $cars[2][0]." , ",$cars[2][1]." , ",$cars[2][2]."<br>",
//     $cars[3][0]." , ",$cars[3][1]." , ",$cars[3][2]."<br>",
//     $cars[4][0]." , ",$cars[4][1]." , ",$cars[4][2]."<br>",
//     $cars[5][0]." , ",$cars[5][1]." , ",$cars[5][2]."<br>"
// ;

echo "<br>";
//---------------------------------------------------------------
$movies = array(
    array(
      "title" => "Rear Window",
      "director" => "Alfred Hitchcock",
      "year" => 1954
    ),
    array(
      "title" => "Full Metal Jacket",
      "director" => "Stanley Kubrick",
      "year" => 1987
    ),
    array(
      "title" => "Mean Streets",
      "director" => "Martin Scorsese",
      "year" => 1973
    )
  );
  
  foreach ( $movies as $movie ) {
  
    echo '<dl style="margin-bottom: 3em;">';
  
    foreach ( $movie as $key => $value ) {
      echo "<dt><b>$key :: </b></dt>  <dd>$value</dd>";
    }
    echo '</dl>';
  }echo "<center>-------------------------------------------------------------------------<br>Day 3 Array <br>";

#Day3 ---------- ARRAY (while , do , for)------------
    #-----Sorting [sort() , rsort()]-----
    $number = array(10,100,20,50,15,40,70);

//     $max = count($number);
//     $st = 0;
//     while ($st < $max) {

//       for ($i=0; $i < $max; $i++) {
//         if(($i+1) != $max) {
//           if($number[$i] > $number[$i+1] ) {
//             $keep = $number[$i];
//             $number[$i] = $number[$i+1];
//             $number[$i+1] = $keep;
//           } //-- check if first array > second array
//         } //-- check key not equal max length
//       }

//       $st++;
//     } //-- loop follow max length array


//     print_r($number);
//     echo "<br>";

    sort($number); 
        echo 'Less - Hight of Number<br><br>';
    foreach ($number as $k => $val) {
        echo "value : ".$val ;
        echo "<br>";
  
      }
   // // rsort($number); 
   // //  echo 'Hight - Less of Number<br><br>';
   // // $leng_num = count($number);
    // for ($i=0; $i < $leng_num ; $i++) { 
  //  //     echo "value : ".$number[$i]."<br>";
   // // }
    echo "------------------------------------------------<br>";
    
echo "<br>";
echo "# -- Character of Descendance -- #<br><br>";

    #---- Associative Arrays (Keys/String Index , Value) -----
    $age = array(
        'Mal' => 21, 
        'Evie' => 22,
        'Calos' => 19,
        'Jay' => 26
    );
    $age['Uma']= 17;

    print_r($age);
    echo "<br><br>Count : ". count($age)."<br><br>";
    asort($age); // Sort age less-high

    foreach ($age as $key => $value) {
        echo "  Name : ".$key. "<br> Age : ".$value." years old. <br><br>";
    }
    

    // $cars = array( "Benz" ,"Toyota", "Mazda", "Limucine" , "BMW" ,"Honda");

    //  $arr_length = count($cars); #for Show count() Number of ... in Array / Length

    // print_r($cars);  #for Print Checking Data in Array
    // echo "<br><br>"." Cars = ".count($cars)."<br><br>";

    // // for ($i=0; $i < $arr_length ; $i++) { 
    // //     echo $i." ".$cars[$i]."<br> ";
    // // }
    // //---------------------------------------------------------------
    // $a = 0;
    // while ($a < $arr_length) {
    //     echo ($a+1)." ".$cars[$a]."<br> ";
    //     $a++;
    // }
    

    #$cars = array();
    // $cars[3] = "Mitsubishi";
    // $cars[2] = "Honda";
    // echo $cars[2];
    echo "<br>";
//---------------------------------------------------------------
    $text = array('H','o','l','w','r','e','d');
    echo $text[0].$text[5].$text[2].$text[2].$text[1]." ".$text[3].$text[1].$text[4].$text[2].$text[6];
    //sort($text);

    // $clength = count($text);

    // for($x = 0; $x < $clength; $x++) {
    // echo $text[$x];
    //}
    

echo "<br>";
echo "</center>";
#Day2 ---------- LOOP (while , do , for)------------

    #===== loop WHILE (Use best for ARRAY[])====
    $a = 0; $max=10;

    for ($i=0; $i <= $max; $i++) { 

        for ($n=0; $n < $i; $n++) { 
            echo "*";
        }
        echo "<br>";
    }for ($i=$max; $i >= 0; $i--) { 

        for ($n=0; $n <= $i; $n++) { 
            echo "*";
        }
        echo "<br>";
    }

    // for ($i=0; $i <= 5; $i++) { 

    //     for ($n=0; $n < $i; $n++) { 
    //         echo "*";
    //     }
    //     echo "<br>";
    // }for ($i=5; $i >= 0; $i--) { 

    //     for ($n=0; $n <= $i; $n++) { 
    //         echo "*";
    //     }
    //     echo "<br>";
    // }

    // for ($i=0; $i <= 5; $i++) { 

    //     for ($n=0; $n < $i; $n++) { 
    //         echo "</n>*";
    //     }
    //     for ($d=5; $d >= $i; $d--) { #-- Square ---
    //         echo "*";
    //     }
    //     echo "<br>";
    // }

    // while ($a < $max) { //## == Q&A :: Loop show 1 to $max(N) ==
    //     // $a++;
    //     // echo $a." Hello<br>"; //It's Work it!
    //     echo ($a+1)." Hello<br>";
    //      $a++; # $a += 1; or $a= $a+1;
    // } 
    //---------------------------------------------------------------
    // do { // Do before Check!
    //     # code...
    // } while ($a <= 10);
    //---------------------------------------------------------------
    // for ($i=0; $max >= $i ; $max--) {  # --- Show $max(N) to 0
    //     if ($max % 7 == 0) { #check $i หาร 7 ลงตัว ใช้ mod(%) และ == 0
    //         echo '<b>'.$max.'</b>'."<br>"; # <b>txt</b> => Bold txt
    //     }else{
    //         echo $max."<br>";
    //     }
    // }
    //---------------------------------------------------------------
    // for ($i=0; $i <= $max; $i+=1) { #Loop Show 0 to $max(N) 

    //     if ($i % 7 == 0) { #check $i หาร 7 ลงตัว ใช้ mod(%) และ == 0
    //         echo '<b>'.$i.'</b>'."<br>"; # <b>txt</b> => Bold txt
    //     }else{
    //         echo $i."<br>";
    //     }
        
    // }

#Day1---------------------------------------------------------------
      #---- Q&A :: เลขคู่ / คี่ ----
    //     $numb = 9;
    //     $res = $numb % 2;
    //     echo "Number is ".$numb;
    //     if ($numb == 0) {
    //         echo " ==> เลข 0";
    //     }elseif ($res == 0 && $numb != 0) {
    //         echo " ==> เลขคู่ ( เศษ".$res." )";
    //     }elseif ($res != 0){
    //         echo " ==> เลขคี่ ( เศษ".$res." )";
    //     }

        // if ($numb == 0) {
        //     echo " ==> เลข 0";
        // }elseif ($res == 0) {
        //     echo " ==> เลขคู่ ( เศษ".$res." )";
        // }else{
        //     echo " ==> เลขคี่ ( เศษ".$res." )";
        // }

        // echo "12 / 5 = ".(12 / 5).'<br>';
        // echo "12 % 5 = ".(12 % 5);



        #---- Comment & Basic PHP Syntax! -----

        //  $txt_name = "Claudia" ; 
        //     echo "Hola! , ".$txt_name;

        //  $num1 = 100; 
        //  $num2 = 50;
        
        //  $result = $num1+$num2;
        
        //  $num2 = $num2 + 100;
        //  $num2 += 100;

        // echo " <b>Love x".$result." ".$num2."</b>";
        // // echo "<b>Love x".($num1+$num2)."</b>";

    //----------------------------------------------------------------
        // $num_1 = 15;
        
        #--- find number 11 - 20 (Ver. If-Else)---

        // if ($num_1 > 0 && $num_1 <= 10){
        //     echo "Number is 1-10.";
        // }elseif($num_1 > 10 && $num_1 <= 20){
        //     echo "Number is  11-20.";
        // }elseif($num_1 > 20 && $num_1 <= 30){
        //     echo "Number is  21-30.";
        // }elseif($num_1 > 30 && $num_1 <= 40){
        //     echo "Number is  31-40.";
        // }else{
        //     echo "Number is not in range 1- 40.";
        // }
        // echo "<br>Next Line..";

        #----- find number 11 - 20 (Ver. Switch-Case)-----

        // switch ($num_1 ) {
        //     case $num_1 > 0 && $num_1 <= 10:
        //         echo "Number is 1-10.";
        //         break;
        //     case $num_1 > 10 && $num_1 <= 20:
        //         echo "Number is 11-20.";
        //         break;
        //     case $num_1 > 20 && $num_1 <= 30:
        //         echo "Number is 21-30.";
        //         break;
        //     case $num_1 > 30 && $num_1 <= 40:
        //         echo "Number is 31-40.";
        //         break;
        //     default:
        //         echo "Number is not in range 1- 40. <br>";
        //         break;
        // }
    // -----------------------------------------------------------------
        // $prefix = "นางสาว";
        //     echo '<br>';
        // if ($prefix == 'นางสาว' || $prefix == 'เด็กหญิง'|| $prefix == 'นาง'){  # '||' --> Or
        //     echo "สวัสดี,".$prefix;
        // }elseif($prefix == 'นาย' || $prefix == 'เด็กชาย'){
        //     echo "Hey!,Boy.".$prefix;
        // }else{
        //     echo "Hola!".$prefix;
        // }

    ?>

</body>

</html>