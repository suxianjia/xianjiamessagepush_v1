<?php
namespace Suxianjia\xianjiamessagepush\driver;

use Suxianjia\xianjiamessagepush\myConfig;
use InvalidArgumentException;
 
use Suxianjia\xianjiamessagepush\interface\SmsDriverInterface;
 
use TencentCloud\Cvm\V20170312\Models\DescribeInstancesRequest;
 
use TencentCloud\Common\Credential;
 
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
// use TencentCloud\Cvm\V20170312\CvmClient;
use TencentCloud\Cvm\V20170312\Models\DescribeRegionsRequest;
use TencentCloud\Sms\V20210111\SmsClient;
use TencentCloud\Sms\V20210111\Models\SendSmsRequest;
class TencentSmsDriver implements SmsDriverInterface {


    public function createClient(): SmsClient {
 

        try {
 
 $appid = myConfig::getInstance()::getDataConfig("client_tencentsms.api_app_id");
 $appsecret = myConfig::getInstance()::getDataConfig("client_tencentsms.api_app_key_secret");
 
            $cred = new Credential( $appid, $appsecret);  
            // 实例化一个http选项，可选的，没有特殊需求可以跳过
            $httpProfile = new HttpProfile();
            $httpProfile->setEndpoint("sms.tencentcloudapi.com");
            // 实例化一个client选项，可选的，没有特殊需求可以跳过
            $clientProfile = new ClientProfile();
            $clientProfile->setHttpProfile($httpProfile);
            // 实例化要请求产品的client对象,clientProfile是可选的
            $client = new SmsClient($cred, "ap-guangzhou", $clientProfile);
  

            return $client;
        }
        catch(TencentCloudSDKException $e) {
            echo $e; exit;
        }

    }
//  php82 artisan app:sms-client  
 //     public   function sendSms( string $phone, string $message,string $msgtype = ''): array {
    public   function sendSms( array $phone, array $message,string $msgtype = ''): array {
    //    try {
// var_dump('sms_template_tencent.'.$msgtype ); exit;

        list($a, $templateCode,$c,$d) = myConfig::getInstance()::getDataConfig('sms_template_tencent.'.$msgtype,[]);
        $result = []; 
        $result['code'] = 1;
        $result['data']['msgtype'] = $msgtype;
        $result['data']['templateCode'] = $templateCode;
        $result['data']['phone'] = $phone;
        $result['data']['function'] =__CLASS__.':'. __FUNCTION__;


        // 实例化一个请求对象,每个接口都会对应一个request对象
    $req = new SendSmsRequest();


    $templateParam = [
        // 'code' => $message[0],
    ];
 
  foreach( $message as $key => $value) {
        $templateParam[] = $value;
    }

    $params = array(
        "PhoneNumberSet" => $phone ,//array( $phone[0] ),
        "SmsSdkAppId" => myConfig::getInstance()::getDataConfig("client_tencentsms.sdk_app_id"),//"1400975439",
        "TemplateId" => $templateCode,//"2395766",
        "SignName" =>  myConfig::getInstance()::getDataConfig("client_tencentsms.sms_sign_name"),  //"优派超",
        "TemplateParamSet" =>  $templateParam,// array( $message[0]   )
    );

//   var_dump(     $params ); exit;

    $req->fromJsonString(json_encode($params));

    // 返回的resp是一个SendSmsResponse的实例，与请求对象对应
    $client =  $this->createClient();
    $resp = $client->SendSms($req);

    // 输出json格式的字符串回包
 
    $result['data']['result'] =$resp;
    $result['code'] =$resp->SendStatusSet[0]->Code == 'Ok' ? 0 : 1;
    $result['remote_code'] =$resp->SendStatusSet[0]->Code;
    $result['msg'] = $resp->SendStatusSet[0]->Message;
 
    // $result['data'] =$resp->toJsonString();
        return $result;
    // } catch(TencentCloudSDKException $e) {
    //     echo $e; exit;
    // }

    }

    // public function send(string $phone, string $message) {
    //     // 在这里实现发送短信的逻辑
    //     // 示例：调用 Twilio 短信服务的 API
    //     return "Message sent to {$phone} with content: {$message}";
    // }

// 示例方法
// public function example() {
// // 业务逻辑
// }
}