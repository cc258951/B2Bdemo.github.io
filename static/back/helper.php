<?php
/**
 * 公用函數
 *
 * @author mckey
 * @since 2017-05-08
 */

class Helper {

    /**
     * 取得填寫資料訪客IP
     *
     * @return string
     */
    function getIP() {
        $ip = '';
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        return $ip;
    }

    /**
     * 寄信
     *
     * @param  array    $recipient  [收件者Email]
     * @param  array    $request    [信件內容]
     * @return boolean
     */
    function sendMail($recipient, $request) {
        $websiteName = 'PHARAOH GAMING';
        // 寄件資訊
        $sender = 'PHARAOH GAMING1988<pharaon.gaming1988@gmail.com>';
        // 信件標題
        $subject = $websiteName." - 聯絡我們通知";
        // 信件內容
        $info = [
            ['title' => '填寫時間', 'value' => $request['time']],
            ['title' => 'IP', 'value' => $request['ip']],
            ['title' => '姓名', 'value' => $request['name']],
            ['title' => 'Skype', 'value' => $request['Skype']],
            ['title' => 'QQ', 'value' => $request['qq']],
            ['title' => '微信', 'value' => $request['wechat']],
            ['title' => '信箱', 'value' => $request['email']],
        ];
        $msg = '<!DOCTYPE html>';
        $msg .= '<html>';
        $msg .= '<head>';
        $msg .= '<meta charset="utf-8">';
        $msg .= '</head>';
        $msg .= '<body>';
        $msg .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tobdy>
                <tr>
                    <td bgcolor="#ebebeb" align="center" style="padding:0px 10px 0px 10px">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:720px">
                            <tbody>
                                <tr>
                                    <td colspan="2" align="left" valign="top" style="padding:40px 10px 10px 10px">
                                        <p style="color:#777777;font-family:\'GT Eesti Text Light\',Helvetica,Arial,sans-serif;font-size:14px;font-weight:100;line-height:18px;margin:0">
                                            管理員 您好：
                                            <br>
                                            '.$websiteName.' 有一則訪客填寫資訊，資訊如下:
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" bgcolor="#1B1436" align="center"  valign="center" style="color:#ffffff;font-family:\'GT Eesti Text Light\',Helvetica,Arial,sans-serif;font-size:14px;font-weight:100;letter-spacing:6px;line-height:40px;margin:0;">
                                        表單資訊
                                    </td>
                                </tr>';
        foreach ($info as $value) {
            $msg .= '<tr>
                        <td width="20%" bgcolor="#1B1436" align="center" valign="center" style="color:#ffffff;font-family:\'GT Eesti Text Light\',Helvetica,Arial,sans-serif;font-size:14px;font-weight:100;letter-spacing:6px;line-height:40px;margin:0;">
                            '.$value['title'].'
                        </td>
                        <td bgcolor="#ffffff" align="left" valign="top" style="font-size:14px;border-top:1px solid #eaeaea;padding: 10px">'.$value['value'].'</td>
                    </tr>';
        }

        $msg .= '<tr>
        <td colspan="2" bgcolor="#1B1436" align="center"  valign="center" style="color:#ffffff;font-family:\'GT Eesti Text Light\',Helvetica,Arial,sans-serif;font-size:14px;font-weight:100;letter-spacing:6px;line-height:40px;margin:0;">
        具體事項
        </td>
        </tr>
        <tr>
        <td colspan="2" bgcolor="#ffffff" align="left" valign="top" style="font-size:14px;border-top:1px solid #eaeaea;padding: 10px">
        '.nl2br($request['message']).'
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center" valign="top" style="padding:40px 20px 20px 20px">
        <p style="color:#777777;font-family:\'GT Eesti Text Light\',Helvetica,Arial,sans-serif;font-size:14px;font-weight:100;line-height:18px;margin:0">
        此為系統自動發送的信件，並不接收回信，請勿回覆。
        </p></td></tr></tbody></table></td></tr></tbody></table></body></html>';
        // 信件表頭
        $headers = "MIME-Version: 1.0\r\n" .
                    "Content-type: text/html; charset=big5\r\n" .
                    "From: $sender\r\n";

        foreach ($recipient as $mail) {
            mail("$mail", "$subject", "$msg", "$headers");
        }
        return true;
    }
}
