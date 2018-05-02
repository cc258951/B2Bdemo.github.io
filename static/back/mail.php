<?php
/**
 * 聯絡我們寄信
 *
 * @author mckey
 * @since 2017-05-08
 */

if (!$_POST) {
    echo json_encode(['result' => false, 'messages' => 'pages not found']);
    exit;
}

// 判斷 SESSION 是否啟動(驗證碼使用)
if (!isset($_SESSION)) {
    session_start();
}

// 語系
$allLoale = include 'locale.php';
$locale = $allLoale[(isset($_POST['locale']) && in_array($_POST['locale'], ['zh_TW', 'zh_CN', 'en'])) ? $_POST['locale'] : 'zh_TW'];

/*
|--------------------------------------------------------------------------
| 參數設定
|--------------------------------------------------------------------------
*/
$request  = $errorMessage = [];
// 聯絡我們參數 ['name' => 參數名稱, 'max' => 資料上限]
$field = [
    ['name' => 'name', 'max' => 20],
    ['name' => 'Skype', 'max' => 20],
    ['name' => 'qq', 'max' => 100],
    ['name' => 'wechat', 'max' => 100],
    ['name' => 'email', 'max' => 100],
    ['name' => 'message', 'max' => 500],
    ['name' => 'code', 'max' => 5],
];

// 收件者 Email
$recipient = [
  'ceo@pharaoh-gaming.com',
];
/*
|--------------------------------------------------------------------------
| 參數驗證
|--------------------------------------------------------------------------
*/
foreach ($field as $value) {
    $tmpName = $value['name'];
    $tmpMax = $value['max'];
    $tmpValue = isset($_POST[$tmpName]) ? $_POST[$tmpName] : '';
    $tmpValue = trim(strip_tags($tmpValue));
    if ($tmpValue == '') {
        $errorMessage[] = $locale[$tmpName]['required'];
    } else {
        switch ($tmpName) {
            case 'email':
                if (!filter_var($tmpValue, FILTER_VALIDATE_EMAIL) !== false) {
                    $errorMessage[] = $locale['email']['email'];
                } else if (mb_strlen($tmpValue) > $tmpMax) {
                    $errorMessage[] = str_replace('max', $tmpMax, $locale[$tmpName]['max']);
                }
            break;
            case 'code':
                if (strtoupper($_SESSION['phaCaptcha']) != strtoupper($tmpValue)) {
                    $errorMessage[] = $locale['code']['check'];
                } else if (mb_strlen($tmpValue) > $tmpMax) {
                    $errorMessage[] = str_replace('max', $tmpMax, $locale[$tmpName]['max']);
                }
            break;
            default:
                if (mb_strlen($tmpValue) > $tmpMax) {
                    $errorMessage[] = str_replace('max', $tmpMax, $locale[$tmpName]['max']);
                }
            break;
        }
    }
    $request[$tmpName] = $tmpValue;
}

// 驗證失敗
if (count($errorMessage) > 0) {
    echo json_encode(['result' => false, 'messages' => implode(',', $errorMessage)]);
    exit;
}


/*
|--------------------------------------------------------------------------
| 執行寄信動作
|--------------------------------------------------------------------------
*/
include 'helper.php';
$helper = new Helper;

// 加入訪客相關資訊
$request['time'] = date('Y-m-d H:i:s');
$request['ip'] = $helper->getIP();
if ($helper->sendMail($recipient, $request) == true) { // 寄信成功
    echo json_encode(['result' => true, 'messages' => $locale['mail']['success']]);
    exit;
} else { // 寄信失敗
    echo json_encode(['result' => false, 'messages' => $locale['mail']['false']]);
    exit;
}
