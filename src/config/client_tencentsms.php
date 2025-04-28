<?php


// lavravel_code/code.rpc.upetrol.net/config/tencentsms.php
 
return [
    'sdk_app_id' => getenv('TENCENT_SmsSdkAppId') ?: '',
    'sdk_app_key_secret' => getenv('TENCENT_SmsSdkKey') ?: '',
    'api_app_id' => getenv('TENCENT_SMS_APP_ID') ?: '',
    'api_app_key_secret' => getenv('TENCENT_SMS_APP_KEY') ?: '',
    'sms_sign_name' => getenv('TENCENT_SMS_SIGN') ?: '',
];