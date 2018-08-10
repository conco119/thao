<?php
include_once '../configs.php';
include_once 'func.php';




if(!$loginCheck){
    header('Content-Type: application/json');
    
    $msg = array('msg' => 'Bạn chưa đăng nhập');
    echo json_encode($msg);
    exit;
}
function sql(){
    global $config;

    return new mysqli($config['host'],$config['user'], $config['pass'], $config['dbname']);
}

if(isset($_GET['image']) && $_GET['image']){

    header('Content-Type: image/jpeg');
    $cook = $_SESSION['cookie'];
    $curl = curl('https://www.vietcombank.com.vn/IBanking2015/captcha.ashx?guid='.$_GET['image'],false,'',$cook);

    $img = @imagecreatefromstring($curl[1]);

    if ($img === false) {
        echo $file;
        exit;
    }

    $width = imagesx($img);
    $height = imagesy($img);

    $newWidth = 160;

    $ratio = $newWidth / $width;
    $newHeight = $ratio * $height;


    $resized = @imagecreatetruecolor($newWidth, $newHeight);

    if ($resized === false) {
        echo $file;
        exit;
    }

    $quality = 90;

    if (@imagecopyresampled($resized, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height)) {
        @imagejpeg($resized, NULL, $quality);
    } else {
        echo $file;
    }
    die();

}
?>

