<?php 
namespace Suxianjia\xianjiamessagepush\service;

use Suxianjia\xianjiamessagepush\factory\SmsDriverFactory;  
use Suxianjia\xianjiamessagepush\interface\SmsInterface;
use Suxianjia\xianjiamessagepush\myConfig;
class SmsService implements SmsInterface {

private $maps = [];
 

 
    public function sendSms(array $phone, array $message, string $msgtype = '') {
    // Implementation
        $result = [];
        $createClient = $this->createDriver($msgtype);
        $result = $createClient->sendSms( $phone, $message,$msgtype);
        return $result;
    }

    public function createDriver(string $msgtype) {
        if (! isset($this->maps['sms_driver']) ) { 
            $config = myConfig::getInstance()::getDataConfig('app.sms_driver','');
            $this->maps['sms_driver'] =  SmsDriverFactory::create( $config,$msgtype);
        }
        return $this->maps['sms_driver'];
    }

 
}  