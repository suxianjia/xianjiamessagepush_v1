<?php
// alibabacloud.php
return [
    'access_key_id' => getenv('ALIBABA_CLOUD_ACCESS_KEY_ID') ?: '',
    'access_key_secret' => getenv('ALIBABA_CLOUD_ACCESS_KEY_SECRET') ?: '',
    'sms_sign_name' => getenv('ALIBABA_CLOUD_SMS_SIGN_NAME') ?: '',
    'sms_template_code' => getenv('ALIBABA_CLOUD_SMS_TEMPLATE_CODE') ?: '',
];

 