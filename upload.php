<?php
$uploadDirection = 'uploads/';
$errors = [];
require_once 'checkFile.php';
require_once 'saveFile.php';
?>
<!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(count($errors) > 0){
    echo '<ul>';
    foreach ($errors as $error){
        echo '<li>' . $error . '</li>' ;
    }
      echo '</ul>';
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="imageUpload">Upload an image</label>
    <input type="file" name="image[]" multiple="multiple"  />
    <!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" accept="image/png, image/jpeg, image/gif"> !-->
    <input type="submit" name="submit" value="Send">
</form>
<?php
if(is_dir($uploadDirection)) {
    $it = new FilesystemIterator($uploadDirection);
    foreach ($it as $fileinfo) {
        echo "<figure><img src='" . $uploadDirection  . $fileinfo->getFilename() . "' alt='image' width='200px'><figcaption>" . $fileinfo->getFilename() . "</figcaption></figure>";
        echo "<a href='deleteImage.php?delete=" . $fileinfo->getFilename() . "'>Supprimer</a>";
    }
}
?>
</body>
</html>
