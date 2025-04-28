<?php 
namespace Suxianjia\xianjiamessagepush\factory;
 
use Suxianjia\xianjiamessagepush\driver\AliyunSmsDriver;
use Suxianjia\xianjiamessagepush\driver\TwilioSmsDriver;
use Suxianjia\xianjiamessagepush\driver\HuaweiSmsDriver;
use Suxianjia\xianjiamessagepush\driver\TencentSmsDriver;


use Suxianjia\xianjiamessagepush\myConfig;


// use App\Contracts\SmsService;
 use Exception;
 
use Suxianjia\xianjiamessagepush\exception\MyException;

class SmsDriverFactory {
  private static $driver_maps = [
        'aliyun'  => AliyunSmsDriver::class,
        'twilio'  => TwilioSmsDriver::class,
        'huawei'  => HuaweiSmsDriver::class,
        'tencent' => TencentSmsDriver::class,
    ];

    private static function getDriver(string $driver)
    {
        if ( !isset(self::$driver_maps[$driver]) ) {
            throw new MyException("不支持的短信驱动: {$driver}" );
        }

        $driverClass = self::$driver_maps[$driver];
        return new $driverClass();
    }



    private static function checkTemplateStatus(string $driver,string $msgtype): bool
    {
        $res = match ($driver) {
            'aliyun'  => function ( $msgtype){              
                list($a, $templateCode,$c,$d,$status_aliyun) = myConfig::getInstance()->getDataConfig('sms_template_aliyun.'.$msgtype,[]); 
                return $status_aliyun == 'status=0'  ? true : false;
            },
            'twilio'  => function ( $msgtype){              
                list($a, $templateCode,$c,$d,$status_twilio) = myConfig::getInstance()->getDataConfig('sms_template_twilio.'.$msgtype,[]); 
                return $status_twilio == 'status=0'  ? true : false;
            },
            'huawei'  => function ( $msgtype){              
                list($a, $templateCode,$c,$d,$status_huawei) = myConfig::getInstance()->getDataConfig('sms_template_huawei.'.$msgtype,[]); 
                return $status_huawei == 'status=0'  ? true : false;
            },
            'tencent' => function ( $msgtype){              
                list($a, $templateCode,$c,$d,$status_tencent) = myConfig::getInstance()->getDataConfig('sms_template_tencent.'.$msgtype,[]); 
                return $status_tencent == 'status=0'  ? true : false;
            },
            default   => throw new MyException('不支持的短信驱动')
        };
        return $res($msgtype);
       
    }
   
    public static function create(string $driver,string $msgtype = ''): object
    {
        
        try {
       
            $drivers =  explode(',', $driver);
            if (  empty($drivers)  ) {
                throw new MyException('短信驱动不能为空');
            }
            $len = count($drivers);
            if ($len == 1) {
                $driver = $drivers[0];
                $flat = self::checkTemplateStatus( $driver, $msgtype);
            } else {
                $driver = $drivers[array_rand($drivers)];  // 选择随机的驱动
                $flat = self::checkTemplateStatus( $driver, $msgtype);
                if ( $flat === false ) {
                        foreach ($drivers as $key => $driver_value) {
                                $flat = self::checkTemplateStatus( $driver_value, $msgtype);
                                if ( $flat === true ) {
                                    $driver = $driver_value;
                                    break;
                                }
                        }
                }
            }
     
            if ( $flat === false ) {
                throw new MyException('短信模板未审核通过');
            }
        } catch (MyException $e) {
            throw new MyException($e->getMessage().'----'.$e->getFile().':'.$e->getLine());
        } catch (Exception $e) {
            throw new Exception($e->getMessage().'----'.$e->getFile().':'.$e->getLine());
        }
        return self::getDriver($driver);
    }
}
