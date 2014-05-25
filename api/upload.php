<?php
require_once '../db/DbAccess.php';
$textUpload = "";
if ($_FILES['file']) {
    $uploadfile = __DIR__.'/../images/'. $_FILES['file']['name'];
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        $lat = $_POST['latitude'];
        $lon = $_POST['longitude'];
        $username = $_POST['username'];
        $comment = $_POST['comment'];
        insert_post_data('../images/'. $_FILES['file']['name'], $lat, $lon, $username, $comment);
        header('Content-Type: application/json; charset=utf-8', true);
        echo json_encode(array("message" => "Upload is OK"));
    }else{
        header('Content-Type: application/json; charset=utf-8', true);
        echo json_encode(array("message" => $_FILES['file']['error']."Upload is NOT OK  ".$uploadfile));
    }
}



