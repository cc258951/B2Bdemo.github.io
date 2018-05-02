<?php
/**
 * 語系設定
 *
 * @author mckey
 * @since 2017-05-08
 */

return [
    // 繁中
    'zh_TW' => [
        'name' => [
            'required' => '姓名不得為空',
            'max'      => '姓名不得大於 max 個字元',
        ],
        'Skype' => [
            'required' => 'skype不得為空',
            'max'      => 'skype不得大於 max 個字元',
        ],
        'qq' => [
            'required' => 'QQ不得為空',
            'max'      => 'QQ不得大於 max 個字元',
        ],
        'wechat' => [
            'required' => '微信不得為空',
            'max'      => '微信不得大於 max 個字元',
        ],
        'email' => [
            'required' => '信箱不得為空',
            'email'    => '信箱格式有誤',
            'max'      => '信箱不得大於 max 個字元',
        ],
        'message' => [
            'required' => '具體事項不得為空',
            'max'      => '內容不得大於 max 個字元',
        ],
        'code' => [
            'required' => '驗證碼不得為空',
            'check'    => '驗證碼輸入錯誤',
            'max'      => '驗證碼不得大於 max 個字元',
        ],
        'mail' => [
            'success' => '感謝您的填寫，我們已經收到您的填寫資訊，我們將有人會儘快跟您接洽。',
            'false'   => '感謝您的填寫，目前系統發生異常，請稍候再次進行填寫，感謝您的配合。',
        ],
    ],
    // 簡中
    'zh_CN' => [
        'name' => [
            'required' => '姓名不得为空',
            'max'      => '姓名不得大于 max 个字元',
        ],
        'Skype' => [
            'required' => 'skype不得为空',
            'max'      => 'skype不得大于 max 个字元',
        ],
        'qq' => [
            'required' => 'QQ不得为空',
            'max'      => 'QQ不得大于 max 个字元',
        ],
        'wechat' => [
            'required' => '微信不得为空',
            'max'      => '微信不得大于 max 个字元',
        ],
        'email' => [
            'required' => '信箱不得为空',
            'email'    => '信箱格式有误',
            'max'      => '信箱不得大于 max 个字元',
        ],
        'message' => [
            'required' => '具体事项不得为空',
            'max'      => '内容不得大于 max 个字元',
        ],
        'code' => [
            'required' => '验证码不得为空',
            'check'    => '验证码输入错误',
            'max'      => '验证码不得大于 max 个字元',
        ],
        'mail' => [
            'success' => '感谢您的填写，我们已经收到您的填写资讯，我们将有人会儘快跟您接洽。',
            'false'   => '感谢您的填写，目前系统发生异常，请稍候再次进行填写，感谢您的配合。',
        ],
    ],
    // 英文
    'en' => [
        'name' => [
            'required' => 'The Fullname field is required',
            'max'      => 'The Fullname field may not be greater than max characters.',
        ],
        'Skype' => [
            'required' => 'The skype field is required',
            'max'      => 'The skype field may not be greater than max characters.',
        ],
        'qq' => [
            'required' => 'The QQ field is required',
            'max'      => 'The QQ field may not be greater than max characters.',
        ],
        'wechat' => [
            'required' => 'The Wechat field is required',
            'max'      => 'The Wechat field may not be greater than max characters.',
        ],
        'email' => [
            'required' => 'The Email field is required',
            'email'    => 'The Email field must be a valid email.',
            'max'      => 'The Email field may not be greater than max characters.',
        ],
        'message' => [
            'required' => 'The Message field is required',
            'max'      => 'The Message field may not be greater than max characters.',
        ],
        'code' => [
            'required' => 'The Code field is required',
            'check'    => 'The Code Incorrect',
            'max'      => 'The Code field may not be greater than max characters.',
        ],
        'mail' => [
            'success' => 'Thank you fill out the questionnaire and we earnestly await your prompt reply.',
            'false'   => 'Thank you fill out the questionnaire and The system is functional.',
        ],
    ],
];
