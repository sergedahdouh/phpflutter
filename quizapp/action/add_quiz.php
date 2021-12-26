<?php

    include '../include/connection.php';
    include '../image/baseurl.php';

    if (isset($_POST['submit'])) {
         
        $name = addslashes($_POST['name']);
        $category = $_POST['category'];
        $status = $_POST['status'];
        if(!empty($status)){
            foreach($status as $valueStatus){
                //echo "value: " . $valueStatus;
            }
        }
        $file = $_FILES['photo']['tmp_name'];
        $filename = $_FILES['photo']['name'];
        $target_directory = "../image/image_quiz/";

        $new_image = "quiz_".time()."_".str_replace(" ", "", $filename);
        $target_filepath = $target_directory.$new_image;
        $image = $new_image;
        $strphoto_temp = str_replace(" ", "", $file);

        $insert = "INSERT INTO tbl_quiz(name_quiz, image_quiz, category_quiz, view_quiz, status_quiz) VALUES ('".$name."', '".$image."', '".$category."', '0', '".$valueStatus."')";

        $result = mysqli_query($conn, $insert);

        $lastIdOfStickerPacks = $conn->insert_id;
        $result = mysqli_query($conn, "INSERT INTO tbl_quiz_content(id_quiz) VALUES ('".$lastIdOfStickerPacks."')");

        $path = "../image/image_quiz/";

        mkdir($path.$lastIdOfStickerPacks);
        move_uploaded_file($strphoto_temp, $target_filepath);
        ?>
            <script>
                window.location = '../quiz';
            </script>
        <?php

    }
?>