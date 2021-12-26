<?php

    include '../include/connection.php';

    $name = addslashes($_POST['name']);
    $desc = addslashes($_POST['shortdes']);
    $dkey = $_POST['badgekey'];
    $badreq = $_POST['badreq'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo = $_FILES['photo']['name'];
    $strphoto = str_replace(" ", "", $photo);
    $strphoto_temp = str_replace(" ", "", $photo_tmp);
    $status = $_POST['status'];
    $md5photo = "badge_".time()."_".$strphoto;
    if(!empty($status)){
        foreach($status as $valueStatus){
        }
    }

    $query = "INSERT INTO tbl_badge (badge_name, badge_image, badge_description, badge_status, badge_key, badge_required) VALUES ('$name', '$md5photo', '$desc', '$valueStatus', '$dkey', '$badreq')";

    if (isset($_POST['submit'])) {
    
        move_uploaded_file($strphoto_temp, "../image/image_badge/".$md5photo);
        mysqli_query($conn, $query);
        ?>
        <script>
            window.location = '../badge';
        </script>
        <?php
    } else {
        ?>
        <script>
            window.location = '../badge';
        </script>
        <?php
    }
?>