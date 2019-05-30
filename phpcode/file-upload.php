<?php

function uploadAndResizeImage(array $fileToUpload, $uploadFolder, array $sizes) {

    $result = [];

    $originalFile = $fileToUpload['name'];

    $fileType = strtolower(pathinfo($originalFile, PATHINFO_EXTENSION));

    $originalFilename = pathinfo($originalFile, PATHINFO_FILENAME);

    $uploadedFile = $fileToUpload['tmp_name'];
    $errors = $fileToUpload['error'];
    $fileSize = $fileToUpload['size'];

    switch ($fileType) {
        case 'png':

            $sourceImage = imagecreatefrompng($uploadedFile);
            break;

        case 'gif':

            $sourceImage = imagecreatefromgif($uploadedFile);
            break;

        case 'jpeg':
        case 'jpg':

            $sourceImage = imagecreatefromjpeg($uploadedFile);
            break;

        default:

            throw new Exception('Unknown image filetype given');
            break;
    }

    $sourceImageWidth = getimagesize($uploadedFile)[0];

    list($sourceImageWidth, $sourceImageHeight) = getimagesize($uploadedFile);

    foreach ($sizes as $prefix => $size) {

        $width = $size;
        $height = ($sourceImageHeight / $sourceImageWidth) * $size;

        $newImage = imagecreatetruecolor($width, $height);

        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $width, $height, $sourceImageWidth, $sourceImageHeight);

        if ($fileType == "jpeg") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.jpg';
            imagejpeg($newImage, $filename, 100);
        }
        if ($fileType == "jpg") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.jpg';
            imagejpeg($newImage, $filename, 100);
        }
        if ($fileType == "gif") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.gif';
            imagegif($newImage, $filename, 100);
        }
        if ($fileType == "png") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.png';
            imagepng($newImage, $filename, 100);
        }

        imagedestroy($newImage);
        $result[$prefix] = $filename;
    }

    imagedestroy($sourceImage);
    return $result;
}
