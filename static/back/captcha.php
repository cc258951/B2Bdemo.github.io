<?php

/**
 * 產生驗證碼
 *
 * @author mckey
 * @since 2017-05-08
 */

if (!isset($_SESSION)) {
    session_start();
}

// 驗證碼 session
$_SESSION['phaCaptcha'] = '';

// 輸出驗證碼
header("Content-type: image/PNG");
createCaptcha();

/**
 * 產生驗證碼
 *
 * @param  integer  $codeLength
 * @param  integer  $captchaWidth
 * @param  integer  $captchaHeight
 * @return image
 */
function createCaptcha($codeLength = 5, $captchaWidth = 142, $captchaHeight = 47) {
    // 去除易混淆的字母(數字0和1 字母小寫O和L)。
    $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMOPQRSTUBWXYZ";
    $captchaCode = '';
    for ($no = 0; $no < $codeLength; $no++) {
        $captchaCode .= $str[mt_rand(0, strlen($str)-1)];
    }
    $_SESSION['phaCaptcha'] = $captchaCode;

    // 建立圖示，設置寬度及高度與顏色等等條件
    $image = imagecreate($captchaWidth, $captchaHeight);
    // 驗證碼文字顏色
    $black = imagecolorallocate($image, 0, 0, 0);
    $border_color = imagecolorallocate($image, 21, 106, 235);
    $background_color = imagecolorallocate($image, 235, 236, 237);
    // 建立圖示背景
    imagefilledrectangle($image, 0, 0, $captchaWidth, $captchaHeight, $background_color);
    // 建立圖示邊框
    imagerectangle($image, 0, 0, $captchaWidth-1, $captchaHeight-1, $border_color);
    // 在圖示布上隨機產生大量躁點
    for ($i = 0; $i < 180; $i++) {
        imagesetpixel($image, rand(0, $captchaWidth), rand(0, $captchaHeight), $black);
    }

    $marginLeft = rand(8, 10);
    for ($no = 0; $no < $codeLength; $no++) {
        $marginTop = rand(12, 15);
        imagestring($image, 8, $marginLeft, $marginTop, substr($captchaCode, $no, 1), $black);
        $marginLeft += rand(20, 30);
    }
    imagepng($image);
    imagedestroy($image);
}
?>
