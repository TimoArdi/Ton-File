<?php
$uploadDirection = 'uploads/';
if(stristr($_GET['delete'], '/')){
    header("HTTP/1.0 403 Forbidden");
    die;
}
if(file_exists($uploadDirection . $_GET['delete'])){
    unlink($uploadDirection . $_GET['delete']);
}
header('Location: upload.php' );
