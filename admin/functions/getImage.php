<?php
function getImage()
{
    if (isset($_POST["edit_call_for_paper"])) {
        $current_image = $_POST["current_image"];
    }

    if (isset($_FILES["image1"]["name"], $_FILES["image2"]["name"])) {
        $imageName = $_FILES["image"]["name"];
        $tmpImage = $_FILES["image"]["tmp_name"];
        $size = $_FILES["image"]["size"];
        $type = $_FILES["image"]["type"];
        $typeExt = explode('/', $type);
        $end = end($typeExt);
        $strLower = strtolower($end);
        // echo "<pre>";
        // print_r($_FILES);
        $format = ['jpg', 'jpeg', 'png'];
        // echo $image, $tmpImage, $size;
        // echo strtolower($end);
        if (!in_array($strLower, $format)) {
            $imageErr = "Image format is not supported";
        } else if ($size >= 5242880) {
            $imageErr = "Image size cannot be larger than 5 MB";
        } else {
            $nameExt = explode('.', $imageName);
            $nameEnd = end($nameExt);
            $imageName = 'Student-' . rand(1000, 9999) . '.' . $nameEnd;
            $destination = './images/students/' . $imageName;
            $upload = move_uploaded_file($tmpImage, $destination);

            if (!$upload) {
                $imageErr = "Image is not inserted";
            } else if ($upload && isset($current_image)) {
                if (file_exists('./images/students/' . $current_image)) {
                    unlink('./images/students/' . $current_image);
                    $image = $imageName;
                }
            } else {
                $image = $imageName;
            }
        }
    } else {
        $image = $current_image;
    }
    $image = $image || $imageErr;
    return $image;
}
