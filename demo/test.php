<?php
 include_once __DIR__."/../vendor/autoload.php";
use Suxianjia\xianjiamessagepush\myConfig;
use Suxianjia\xianjiamessagepush\myApp;
 
 



 
// Example usage
// cms_article_base
define("myAPP_VERSION" , "1.0.0") ;
define("myAPP_ENV" , "dev")  ;
define("myAPP_DEBUG" , true )  ;
define("myAPP_PATH", __DIR__."/");
define("myAPP_RUNRIMT_PATH", __DIR__."/runtime/");

 
 
 
  // myConfig::getInstance()::set("bbb" , "bbb"  );
 
  // myConfig::getInstance()::set("bbb1" , "3445bbb"  );
 

 
$App =   myApp::getInstance( );   
// $result = $App->processAllArticles();



// 获取短信驱动实例
// $smsDriver = LogSmsDriver::getInstance();

// 配置驱动
// $smsDriver->setConfig([/* 配置项 */]);

// 发送短信
$result = $App->smssend( );
 

echo json_encode($result, JSON_UNESCAPED_UNICODE);




// 使用方法  cd /ocr/code/demo   &&  php82 test.php 

 
 