<?php 
namespace Suxianjia\xianjiamessagepush\interface;
interface SmsInterface {
    //     $sms->send('13800138000', '您的验证码是1234');
        public function sendSms(array $phone, array $message,string $msgtype='');
}
