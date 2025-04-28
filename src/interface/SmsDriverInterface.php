<?php 
namespace Suxianjia\xianjiamessagepush\interface;
//SmsDriverInterface.php
 interface SmsDriverInterface
{
    public function sendSms( array $phone, array $message,string $msgtype = '');
    public function createClient();
}