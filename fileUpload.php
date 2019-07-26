<?php
    require("connect_db.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>PHP File Upload</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
    <body>
    
        <form  action=""  method="POST"  enctype="multipart/form-data">
            <input type="file"  name="userfile[]" value="" multiple=""/>
            <input type="submit" name="submit" value="upload"/>
        </form>

    <?php
        $phpFileUploadError = array( 
                0 => 'There is no error, the file uploaded with success',
                1 => 'The Uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The Uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The Uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk',
                8 => 'A PHP extension stopped the file upload.',
        );

        //$_FILES global variable
        if (isset($_FILES['userfile'])) {
            //pre_r($_FILES);
            $file_array= reArrayFiles($_FILES['userfile']);
            //pre_r($file_array);

            for ($i=0; $i <count($file_array) ; $i++) { 
                if ($file_array[$i]['error']) {
                    ?><div class="alert alert-danger" > 
                        <?php echo $file_array[$i]['error'].' - '.$phpFileUploadError[$file_array[$i]['error']]; 
                    ?></div><?php
                }else {
                    // $ext_error= false;
                    // a list of extensions we allow to be uploaded.
                    $extensions= array('jpg','jpeg','gif','png' ); //array('jpg','jpeg','gif','png' )

                    $file_ext= explode('.',$file_array[$i]['name']);
                        // pre_r($file_ext); die;
                        $name = $file_ext[0];
                        $name = preg_replace("!-!"," ",$name);
                        $name = ucwords($name);

                    $file_ext= end($file_ext);
                    // pre_r($file_ext);

                    if (!in_array( $file_ext , $extensions) ) {
                        // $ext_error = true;
                        ?><div class="alert alert-danger" >
                        <?php echo "{$file_array[$i]['name']} - Invalid file extension!";
                        ?></div><?php
                    }else {
                        $img_dir= 'images/'.$file_array[$i]['name'];
                        
                        move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);

                        $sql_string = " INSERT IGNORE INTO in_cars_img( icimg_name, icimg_img_dir )
                                                      VALUE ('{$name}','{$img_dir}' ) ";
                        if ($conn->query($sql_string) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql_string . "<br>" . $conn->error;
                        } 

                        ?><div class="alert alert-success" >
                            <?php echo $file_array[$i]['error'].' - '.$phpFileUploadError[$file_array[$i]['error']]; ?>
                        </div><?php
                    }
                }
            }
        }
        function reArrayFiles(& $file_post){

            $file_ary= array();
            $file_count= count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i=0; $i < $file_count; $i++) { 
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }
            return $file_ary;

            // echo "<pre>";
            // print_r($array);
            // echo "<pre>";
        }
        function pre_r($array){
            echo "<pre>";
            print_r($array);
            echo "<pre>";
        }
    ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>