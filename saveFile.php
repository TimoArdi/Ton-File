<?php

if(count($errors) === 0){
    if (isset($_POST['submit'])) {
        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

            $imageUniqName =  uniqid() . strrchr($_FILES['image']['name'][$i], '.');
            move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadDirection . $imageUniqName);

        }
        header('Location: upload.php' );
    }
}