<?php
namespace Suxianjia\xianjiamessagepush\driver;
use Suxianjia\xianjiamessagepush\myConfig;
 use Suxianjia\xianjiamessagepush\interface\SmsDriverInterface;
use InvalidArgumentException;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Dysmsapi;
 
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;
// use AlibabaCloud\Tea\Utils\Utils;
 

use Darabonba\OpenApi\Models\Config;
 
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsRequest;
// use AlibabaCloud\Tea\Model\RuntimeOptions;
use AlibabaCloud\Tea\Rpc\RpcOptions as RuntimeOptions;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendBatchSmsRequest;
 //composer require alibabacloud/sdk
// use App\Contracts\SmsDriverInterface;
 
class AliyunSmsDriver implements SmsDriverInterface {
    public   function createClient():  Dysmsapi {
        try {
            // 创建配置实例
            $config = new Config([
                "accessKeyId" => myConfig::getInstance()::getDataConfig("client_alibabacloud.access_key_id"), 
                "accessKeySecret" =>myConfig::getInstance()::getDataConfig("client_alibabacloud.access_key_secret"), 
            ]);
            // Endpoint 请参考 https://api.aliyun.com/product/Dysmsapi
            $config->endpoint = "dysmsapi.aliyuncs.com";
            return new Dysmsapi($config);
        } catch (Exception $e) {
            // 处理异常
            echo "Error: " . $e->getMessage(); 
            die;
            // return $e->getMessage();

        }
        // return new Dysmsapi($config);

    }

    public   function sendSms( array $phone, array $message,string $msgtype = ''): array {

        if( count($phone) > 1) {
           return $this->sendBatchSms($phone, $message, $msgtype);// SendBatchSms();
        }
        $result = []; 
        $result['data']['phone'] = $phone;
        $result['code'] = 1;
        $result['data']['msgtype'] = $msgtype;
        $result['data']['function'] =__CLASS__.':'. __FUNCTION__;
        //发送流水号
        list($a, $templateCode,$c,$d) = myConfig::getInstance()::getDataConfig('sms_template_aliyun.'.$msgtype,[]);
        $result['data']['templateCode'] = $templateCode;
        // $templateCode="SMS_275770003";
        // $templateParam = [
        //     // 'code' => $message[0],
        // ];
        $templateParam = $message;
        if( !empty($templateParam) ){
                $templateParam = json_encode($templateParam, JSON_UNESCAPED_UNICODE);
        }else{
                $templateParam = [
                    // 'code' => $message[0],
                    "t" =>  time(),
                ];
                $templateParam = json_encode($templateParam, JSON_UNESCAPED_UNICODE);
        }
        $client = $this->createClient();

        $sms_sign_name = myConfig::getInstance()::getDataConfig("client_alibabacloud.sms_sign_name");
            $sendSmsRequest = new SendSmsRequest([
                "phoneNumbers" =>  $phone[0] , 
                "signName" =>           $sms_sign_name, 
                "templateCode" => $templateCode,
                "templateParam" => $templateParam,
            ]);
    
            try {
                $res = $client->sendSmsWithOptions($sendSmsRequest, new RuntimeOptions([]));
                $result['code'] = $res->statusCode;
                $result['msg'] = $res->body->message;
                $result['data']['code'] =$res->body->code;
                $result['data']['bizId'] =$res->body->bizId;
                $result['data']['requestId'] =$res->body->requestId;
                $result['code'] = $res->body->code == "OK" ? 0 : 1;
                $result['remote_code'] =$res->body->code;
 

            } catch (Exception $error) {
                if (!($error instanceof TeaError)) {
                    $error = new TeaError([], $error->getMessage());
                }
     
                if (!is_string($error->message)) {
                    throw new InvalidArgumentException("Error message must be a string.");
                }
                $result['error'] = $error->message;
                $result['error1'] = $error->data["Recommend"] ;
                Utils::assertAsString($error->message);
                return $result;
            }
            return $result;
        }
 // 批量发送 
 public   function SendBatchSms ( array $phone, array $message,string $msgtype = ''): array{
    $result = []; 
    $result['code'] = 1;
    $result['data']['phone'] = $phone;
    $result['data']['msgtype'] = $msgtype;
    $result['data']['function'] =__CLASS__.':'. __FUNCTION__;
    $client = $this->createClient();
    $len =  count($phone) ;
    list($a, $templateCode,$c,$d) = config('client_alibabacloud.'.$msgtype,[]);
    $result['data']['templateCode'] = $templateCode;
    $signNames = [];
    $templateParams = [];
    for($i = 0 ; $i < $len ; $i++){
        array_push($signNames, config("client_alibabacloud.sms_sign_name")   ) ;
    
    }

    $templateParam = $message;
    // for($i = 0 ; $i < $len ; $i++){
    //     array_push($templateParams,  [ 'code' => $message[$i] ]  ) ;
    // }
 

    $inputs = [
        "signNameJson" =>json_encode( $signNames ),// "[\" \",\" \"]",
        "templateCode" => $templateCode  ,
        "templateParamJson" => json_encode( $templateParams ),//"[{code:34546},{code:34546}]",
        "phoneNumberJson" =>json_encode( $phone ),
    ];

    // var_export($inputs);  
    // exit;

    $sendBatchSmsRequest = new SendBatchSmsRequest(   $inputs );
    $runtime = new RuntimeOptions([]);
    try {
        // 复制代码运行请自行打印 API 的返回值
        $res = $client->sendBatchSmsWithOptions($sendBatchSmsRequest, $runtime);
        $result['code'] = $res->statusCode;
        $result['msg'] = $res->body->message;
        $result['data']['code'] =$res->body->code;
        $result['data']['bizId'] =$res->body->bizId;
        $result['data']['requestId'] =$res->body->requestId;
        $result['code'] = $res->body->code == "OK" ? 0 : 1;
        $result['remote_code'] =$res->body->code;
    }
    catch (Exception $error) {
        if (!($error instanceof TeaError)) {
            $error = new TeaError([], $error->getMessage(), $error->getCode(), $error);
        }
        // 此处仅做打印展示，请谨慎对待异常处理，在工程项目中切勿直接忽略异常。
        // 错误 message
        // var_dump($error->message);
        // // 诊断地址
        // var_dump($error->data["Recommend"]);
        $result['error'] = $error->message;
        $result['error1'] = $error->data["Recommend"] ;
        Utils::assertAsString($error->message);
    }
    return $result;
}

}