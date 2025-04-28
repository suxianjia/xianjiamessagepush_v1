<?php 


return [
    'sdk_app_id' => getenv('HUAWEI_APP_KEY') ?: '',
    'sdk_app_key_secret' => getenv('HUAWEI_APP_SECRET') ?: '',
    'api_app_id' => getenv('HUAWEI_SMS_APP_ID') ?: '',
    'api_app_key_secret' => getenv('HUAWEI_SMS_APP_KEY') ?: '',
    'sms_sign_name' => getenv('HUAWEI_SIGNATURE') ?: '',
];
//HUAWEI_APP_KEY=wM63jd19FREElDV1Ge99jzawJh44
// HUAWEI_APP_SECRET=YSedLPUtAdp6QTWzC3b6it7oTw5j
// 云通信短信服务配置  client_huawei
// HUAWEI_APP_KEY=wM63jd19FREElDV1Ge99jzawJh44
// HUAWEI_APP_SECRET=YSedLPUtAdp6QTWzC3b6it7oTw5j
// HUAWEI_SIGNATURE=优派超