<?php
namespace Suxianjia\xianjiamessagepush\driver;
use Suxianjia\xianjiamessagepush\interface\SmsDriverInterface;
use InvalidArgumentException;
use Suxianjia\xianjiamessagepush\myConfig;
use Suxianjia\xianjiamessagepush\interface\SmsInterface;
 
 
 

use HuaweiCloud\SDK\Core\Http\HttpConfig;
use HuaweiCloud\SDK\Core\Exceptions\ConnectionException;
use HuaweiCloud\SDK\Core\Exceptions\RequestTimeoutException;
use HuaweiCloud\SDK\Core\Exceptions\ServiceResponseException;
use HuaweiCloud\SDK\SMSApi\V1\Model\BatchSendDiffSmsRequest;
use HuaweiCloud\SDK\SMSApi\V1\Model\BatchSendDiffSmsRequestBody;
use HuaweiCloud\SDK\SMSApi\V1\Model\BatchSendSmsRequest;
use HuaweiCloud\SDK\SMSApi\V1\Model\BatchSendSmsRequestBody;
use HuaweiCloud\SDK\SMSApi\V1\Model\SmsContent;
use HuaweiCloud\SDK\SMSApi\V1\SMSApiClient;
use HuaweiCloud\SDK\SMSApi\V1\SMSApiCredentials;


class HuaweiSmsDriver implements SmsDriverInterface {

        /**
         * 构造X-WSSE参数值
         * @param string $appKey
         * @param string $appSecret
         * @return string
         */


 public function buildWsseHeader(string $appKey, string $appSecret){
        date_default_timezone_set('Asia/Shanghai');
        $now = date('Y-m-d\TH:i:s\Z'); //Created
        $nonce = uniqid(); //Nonce
        $base64 = base64_encode(hash('sha256', ($nonce . $now . $appSecret))); //PasswordDigest
        return sprintf("UsernameToken Username=\"%s\",PasswordDigest=\"%s\",Nonce=\"%s\",Created=\"%s\"",
            $appKey, $base64, $nonce, $now);
    }

    // public   function sendSms( ): array {
    //     $result = []; 

    //     return $result;
    // }
//  public function createClient();
    public function createClient() {
        // 在这里实现发送短信的逻辑
        // 示例：调用 Twilio 短信服务的 API
        // return "Message sent to {$phone} with content: {$message}";


    //     $ak = getenv("CLOUD_SDK_MSGSMS_APPKEY");
    // $sk = getenv("CLOUD_SDK_MSGSMS_APPSECRET");


    $ak =  $APP_KEY = myConfig::getInstance()->getDataConfig("client_huawei.sdk_app_id") ;//'c8RWg3ggEcyd4D3p94bf3Y7x1Ile'; //APP_Key
    $sk =  $APP_SECRET = myConfig::getInstance()->getDataConfig("client_huawei.sdk_app_key_secret") ;


    if ($ak == "" || $sk == "") {
        echo("The ak or sk is empty. please config the environment CLOUD_SDK_MSGSMS_APPKEY and CLOUD_SDK_MSGSMS_APPSECRET first!\n");
        return;
    }

    // This endpoint of this example is of Beijing 4. Replace it with the actual value.
    $endpoint = "https://smsapi.cn-north-4.myhuaweicloud.com:8443";

    // Construct an authentication object and initialize the configuration.
    $credentials = new SMSApiCredentials();
    $credentials->withAk($ak);
    $credentials->withSk($sk);

    $config = HttpConfig::getDefaultConfig();

    # To prevent API invoking failures caused by HTTPS certificate authentication failures, ignore the
    # certificate trust issue to simplify the sample code.
    # Note: Do not ignore the TLS certificate verification in the commercial version.
    $config->setIgnoreSslVerification(true);

    // Creating an SmsApiClient Instance
    $smsApiClient = SmsApiClient::newBuilder()
        ->withCredentials($credentials)
        ->withEndpoint($endpoint)
        ->withHttpConfig($config)
        ->build();
        return $smsApiClient;
 
    }


   public   function sendSms( array $phone, array $message,string $msgtype = ''): array {

        if( count($phone) > 1) {

        }

        $result = []; 
        $result['data']['phone'] = $phone;
        $result['code'] = 1;
        $result['data']['msgtype'] = $msgtype;
        $result['data']['function'] =__CLASS__.':'. __FUNCTION__;
        //发送流水号
        // list($a, $templateCode,$c,$d) = config('sms_template_huawei.'.$msgtype,[]);
        // $result['data']['templateCode'] = $templateCode;

    $smsApiClient = $this->createClient();
  list($code, $msg,$data)  = $this->batchSendSms($smsApiClient, $phone,  $message, $msgtype );
 
  var_dump($code);
  var_dump($msg);
  var_dump($data);
  
  if ( $code == 0) {
        // echo "----Example 1 send sms success.\n";
        $result['msg']=   $msg;
        $result['data']['response'] = $data;
    } else {
        // echo "----Example 1 send sms failed.\n";
        $result['msg']= "send sms failed";
    }

    return $result;
   
}


private function batchSendSms(SmsApiClient $smsApiClient,array $phone, array $message,string $msgtype = ''): array
{

    //         if( count($phone) > 1) {

//         }

          $result = []; 
//         $result['data']['phone'] = $phone;
//         $result['code'] = 1;
//         $result['data']['msgtype'] = $msgtype;
//         $result['data']['function'] =__CLASS__.':'. __FUNCTION__;
//         //发送流水号
//         list($a, $templateCode,$c,$d) = config('sms_template_huawei.'.$msgtype,[]);
//         $result['data']['templateCode'] = $templateCode;

        //发送流水号
        list($a, $templateCode,$c,$d) = myConfig::getInstance()->getDataConfig('sms_template_huawei.'.$msgtype,[]);
        $result['data']['templateCode'] = $templateCode;
        $receiver = implode(',', $phone);



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
        $TEMPLATE_PARAS =    $templateParam ;
    
        
                $sender =   "8823031029103";// 通知类
//         // $sender =   "8823031029066";// 验证码类


    // / Construct a request for sending an SMS message.



    $body = [
        "from" =>  $sender  ,//"8824110605***",
        // List of numbers that receive SMS messages.
        // Note: When there are multiple numbers, do not contain spaces between the numbers.
        "to" =>       $receiver ,// "+86137****3774,+86137****3776",
        // Template Id
        "templateId" =>  $templateCode,// "1d18a7f4e1b84f6c8fc1546b48b3baea",
        // Template parameter, which must be enclosed in square brackets ([]).
        "templateParas" =>   $TEMPLATE_PARAS,// "[\"12\",\"23\",\"e\"]",
        // Status report callback URL. Set this parameter to a valid value. If status reports are not required, you do not need to set this parameter.
        "statusCallback" => "",// "https://test/report"


    ];
    $batchSendSmsRequestBody = new BatchSendSmsRequestBody(    $body );

    $batchSendSmsRequest = new BatchSendSmsRequest(array("body" => $batchSendSmsRequestBody));

    // Invoke the SDK interface to send an SMS message.
    try {
        $response = $smsApiClient->batchSendSms($batchSendSmsRequest);
        // echo $response . "\n";
        // return $response->getStatusCode();

        $result['data']['response'] = $response;
        $result['code'] = 0;
        $result['msg'] = "send sms success";
        // return  $result;
    } catch (ConnectionException $e) {
        // echo "Connection error:" . $e->getMessage() . "\n";

        $result['msg'] = $e->getMessage();
        $result['code'] = 500;
    } catch (RequestTimeoutException $e) {
        // echo "Timeout error:" . $e->getMessage() . "\n";
        $result['msg'] = $e->getMessage();
        $result['code'] = 500;
    } catch (ServiceResponseException $e) {
        // echo "Request error.\n";
        // echo "HttpStatusCode" . $e->getHttpStatusCode() . "\n";
        // echo "RequestId" . $e->getRequestId() . "\n";
        // echo "ErrorCode" . $e->getErrorCode() . "\n";
        // echo "ErrorMsg" . $e->getErrorMsg() . "\n";
        $result['msg'] = $e->getMessage();
        $result['code'] = 500;
    }

    // Exception, then return INTERNAL_SERVER_ERROR
    return  $result;




}
    // Construct the request body

//     public   function sendSms( array $phone, array $message,string $msgtype = ''): array {

//         if( count($phone) > 1) {

//         }

//         $result = []; 
//         $result['data']['phone'] = $phone;
//         $result['code'] = 1;
//         $result['data']['msgtype'] = $msgtype;
//         $result['data']['function'] =__CLASS__.':'. __FUNCTION__;
//         //发送流水号
//         list($a, $templateCode,$c,$d) = config('sms_template_huawei.'.$msgtype,[]);
//         $result['data']['templateCode'] = $templateCode;

    
//     //     $client =  $this->createClient();
//     // $resp = $client->SendSms($req);
    
// //    'sdk_app_id' => env('HUAWEI_APP_KEY', ''),
// // 'sdk_app_key_secret' => env('HUAWEI_APP_SECRET', ''),
    
//         //必填,请参考"开发准备"获取如下数据,替换为实际值
//         $url = 'https://smsapi.cn-north-4.myhuaweicloud.com:443'; //APP接入地址(在控制台"应用管理"页面获取)+接口访问URI
//         // 发送短信：   
//         $url .=  '/sms/batchSendSms/v1';
//         // 发送分批短信：
//         // $url .= '/sms/batchSendDiffSms/v1';
        
//         // 认证用的appKey和appSecret硬编码到代码中或者明文存储都有很大的安全风险，建议在配置文件或者环境变量中密文存放，使用时解密，确保安全；
//         $APP_KEY = config("client_huawei.sdk_app_id") ;//'c8RWg3ggEcyd4D3p94bf3Y7x1Ile'; //APP_Key
//         $APP_SECRET = config("client_huawei.sdk_app_key_secret") ;//'q4Ii87Bh************80SfD7Al'; //APP_Secret
//        // wM63jd19FREElDV1Ge99jzawJh44
//        var_dump($APP_KEY);
//        var_dump($APP_SECRET);
//     //    exit;
       
//         // $sender = 'csms12345678'; //国内短信签名通道号
//         $sender =   "8823031029103";// 通知类
//         // $sender =   "8823031029066";// 验证码类
//         $TEMPLATE_ID =  $templateCode  ;//'8ff55eac1d0b478ab3c06c3c6a492300'; //模板ID
        
//         //条件必填,国内短信关注,当templateId指定的模板类型为通用模板时生效且必填,必须是已审核通过的,与模板类型一致的签名名称
//         // $signature = '华为云短信测试'; //签名名称
//         $signature = config("client_huawei.sms_sign_name"); //签名名称
        
//         //必填,全局号码格式(包含国家码),示例:+86151****6789,多个号码之间用英文逗号分隔
//         // $receiver = '+8615123456789,+86152****7890'; //短信接收人号码
// // var_dump($phone);
//         // $receiver = $phone;
//         // array to string
//         // if( is_array($phone) ){
//             $receiver = implode(',', $phone);
//         // }
//         var_dump($receiver);
//         //选填,短信状态报告接收地址,推荐使用域名,为空或者不填表示不接收状态报告
//         $statusCallback = '';
        
//         /**
//          * 选填,使用无变量模板时请赋空值 $TEMPLATE_PARAS = '';
//          * 单变量模板示例:模板内容为"您的验证码是${1}"时,$TEMPLATE_PARAS可填写为'["369751"]'
//          * 双变量模板示例:模板内容为"您有${1}件快递请到${2}领取"时,$TEMPLATE_PARAS可填写为'["3","人民公园正门"]'
//          * 模板中的每个变量都必须赋值，且取值不能为空
//          * 查看更多模板规范和变量规范:产品介绍>短信模板须知和短信变量须知
//          * @var string $TEMPLATE_PARAS
//          */
//         // $TEMPLATE_PARAS = '["369751"]'; //模板变量，此处以单变量验证码短信为例，请客户自行生成6位验证码，并定义为字符串类型，以杜绝首位0丢失的问题（例如：002569变成了2569）。
//         // $TEMPLATE_PARAS = '['.$templateCode.']'; 

//         $templateParam = $message;
//         if( !empty($templateParam) ){
//                 $templateParam = json_encode($templateParam, JSON_UNESCAPED_UNICODE);
//         }else{
//                 $templateParam = [
//                     // 'code' => $message[0],
//                     "t" =>  time(),
//                 ];
//                 $templateParam = json_encode($templateParam, JSON_UNESCAPED_UNICODE);
//         }
//         $TEMPLATE_PARAS =    $templateParam ;


//         //请求Headers
//         $headers = [
//             'Content-Type: application/x-www-form-urlencoded',
//             'Authorization: WSSE realm="SDP",profile="UsernameToken",type="Appkey"',
//             'X-WSSE: ' . $this->buildWsseHeader($APP_KEY, $APP_SECRET)
//         ];
//         //请求Body
//         $body = [
//             'from' => $sender,
//             'to' => $receiver,
//             'templateId' => $TEMPLATE_ID,
//             'templateParas' => $TEMPLATE_PARAS,
//             'statusCallback' => $statusCallback,
//            'signature' => $signature //使用国内短信通用模板时,必须填写签名名称
//         ];
//         $data = http_build_query(    $body);

//         print_r($body );

        
//         $context_options = [
//             'http' => ['method' => 'POST', 'header'=> $headers, 'content' => $data, 'ignore_errors' => true],
//             'ssl' => ['verify_peer' => false, 'verify_peer_name' => false] //为防止因HTTPS证书认证失败造成API调用失败，需要先忽略证书信任问题
//         ];
//         // print_r($context_options) . PHP_EOL; //打印请求信息
        
//         $response = file_get_contents($url, false, stream_context_create($context_options));
//         // print_r($response) . PHP_EOL; //打印响应信息

//         $result['data']['response'] = json_decode($response, true);
//         return $result;

//     //-------------
//     }

    // public function send(string $mobile, string $message): bool
    // {
    //     try {
    //         // Create credentials
    //         $credentials = new BasicCredentials(env('HUAWEI_APP_KEY'), env('HUAWEI_APP_SECRET'));

    //         // Create HTTP configuration
    //         $httpConfig = HttpConfig::getDefaultConfig();
    //         $httpConfig->setIgnoreSSLVerification(true); // Optional: Ignore SSL verification

    //         // Initialize the SmsClient
    //         $client = SmsClient::newBuilder()
    //             ->withCredentials($credentials)
    //             ->withHttpConfig($httpConfig)
    //             ->withRegion('ap-southeast-1') // Replace with your region
    //             ->build();

    //         // Prepare the request body
    //         $requestBody = [
    //             'from' => env('HUAWEI_SIGNATURE'), // Sender signature
    //             'to' => $mobile,
    //             'template_id' => 'your_template_id', // Replace with your template ID
    //             'template_params' => [$message], // Template parameters
    //         ];

    //         // Create the request
    //         // Adjusted to use the correct request creation method
    //         $request = new SendSmsRequest();
    //         $request->setFrom(env('HUAWEI_SIGNATURE'));
    //         $request->setTo([$mobile]); // 'to' should be an array
    //         $request->setTemplateId('your_template_id'); // Replace with your template ID
    //         $request->setTemplateParas([$message]); // Correct method name is 'setTemplateParas'

    //         // Send the SMS
    //         $response = $client->sendSms($request);

    //         // Check if the response indicates success
    //         return $response->getStatusCode() === 200;
    //     } catch (SdkException $e) {
    //         // Log the exception or handle it as needed
    //         logger()->error('Huawei SMS sending failed: ' . $e->getMessage());
    //         return false;
    //     }
    // }

// 示例方法
public function example() {
// 业务逻辑
}
}