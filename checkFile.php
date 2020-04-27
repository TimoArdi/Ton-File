<?php
if (isset($_POST['submit'])){
    $maxSize = 1000000;
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageError = $_FILES['image']['error'][$i];
        $imageSize = $_FILES['image']['size'][$i];
        $imageExtension = strrchr($_FILES['image']['name'][$i], '.');
        switch ($imageError) {
            case 0:
                break;
            case 1:
                $errors[] = ' Le fichier ' .$imageName .' est trop gros (server)';
                break;
            default :
                $errors[] = 'Une erreur est survenue lors du transfert du fichier ' . $imageName;
                break;
        }
        if ($imageSize > $maxSize) {
            $errors[] = 'Le fichier ' . $imageName. ' est trop gros';
        }
        if(!in_array($imageExtension, $extensions))
        {
            $errors[] = 'Le fichier ' . $imageName . ' ne correspond pas au type png, gif, jpg, jpeg';
        }
    }

}
