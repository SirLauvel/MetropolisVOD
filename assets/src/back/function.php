<?php

function uploadImage(string $page, $image)
{

    $nameFile = $image['name'];
    $typeFile = $image['type'];
    $tmpFile = $image['tmp_name'];
    $errorFile = $image['error'];
    $sizeFile = $image['size'];

    $extensions = ['png', 'jpg', 'jpeg', 'gif'];
    $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif',];

    $extension = explode('.', $nameFile);

    $max_size = 200000;

    if (in_array($typeFile, $type)) {
        if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
            if ($sizeFile <= $max_size && $errorFile == 0) {
                if (move_uploaded_file($tmpFile, $image = '../../img/upload/' . uniqid() . '.' . end($extension))) {
                    echo "upload  effectué !";
                    return $image;
                } else {
                    $_SESSION['errorMessage'] = 'failImageUpload';
                    header('Location: ../../../'.$page.'.php');
                }
            } else {
                $_SESSION['errorMessage'] = 'highImageWeight';
                header('Location: ../../../'.$page.'.php');
            }
        } else {
            $_SESSION['errorMessage'] = 'notImage';
            header('Location: ../../../'.$page.'.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'errorImageType';
        header('Location: ../../../'.$page.'.php');
    }
    return NULL;
}
function uploadVideo(string $page, $video)
{
    $nameFile = $video['name'];
    $typeFile = $video['type'];
    $tmpFile = $video['tmp_name'];
    $errorFile = $video['error'];
    $sizeFile = $video['size'];

    $extensions = ['mp4', 'avi', 'jpeg', 'webm', 'ogv'];
    $type = ['video/mp4', 'video/avi', 'video/jpeg', 'video/webm', 'video/ogv'];

    $extension = explode('.', $nameFile);

    $max_size = 2147483648;

    if (in_array($typeFile, $type)) {
        if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
            if ($sizeFile <= $max_size && $errorFile == 0) {
                if (move_uploaded_file($tmpFile, $video = '../../video/upload/' . uniqid() . '.' . end($extension))) {
                    echo "upload  effectué !";
                    return $video;
                } else {
                    $_SESSION['errorMessage'] = 'failVideoUpload';
                    header('Location: ../../../'.$page.'.php');
                }
            } else {
                $_SESSION['errorMessage'] = 'highVideoWeight';
                header('Location: ../../../'.$page.'.php');
            }
        } else {
            $_SESSION['errorMessage'] = 'notVideo';
            header('Location: ../../../'.$page.'.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'errorVideoType';
        header('Location: ../../../'.$page.'.php');
    }
    return NULL;
}

function checkNumberCategory(string $page, $category) {
    $numberCategory = count($category);
    var_dump($numberCategory);

    if($numberCategory < 1 || $numberCategory > 3) {
        var_dump($numberCategory);
        $_SESSION['errorMessage'] = 'numberCategory';
        header('Location: ../../../'.$page.'.php');
    }
    return true;
}


