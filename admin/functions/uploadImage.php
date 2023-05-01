<?php
// function upload_image()
// {
//     $uploadTo = "../../Images/call_for_paper/";
//     $allowImageExt = array('jpg', 'png', 'jpeg', 'gif');
//     $imageName = $_FILES['image']['name'];
//     $tempPath = $_FILES["image"]["tmp_name"];
//     $imageQuality = 70;
//     $basename = basename($imageName);
//     $originalPath = $uploadTo . $basename;
//     $imageExt = pathinfo($originalPath, PATHINFO_EXTENSION);
//     if (empty($imageName)) {
//         $error = "Please Select files..";
//         return $error;
//     } else {

//         if (in_array($imageExt, $allowImageExt)) {
//             $compressedImage = compress_image($tempPath, $originalPath, $imageQuality);
//             if ($compressedImage) {
//                 return "Image was compressed and uploaded to server";
//             } else {
//                 return "Some error !.. check your script";
//             }
//         } else {
//             return "Image Type not allowed";
//         }
//     }
// }


function compress_image($tempPath, $originalPath, $imageQuality)
{

    // Get image info 
    $imgInfo = getimagesize($tempPath);
    $mime = $imgInfo['mime'];

    // Create a new image from file 
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($tempPath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($tempPath);
            break;
        default:
            $image = imagecreatefromjpeg($tempPath);
    }

    // Save image 
    imagejpeg($image, $originalPath, $imageQuality);
    // Return compressed image 
    return $originalPath;
}
