<?php 
namespace Suxianjia\xianjiamessagepush;
use Suxianjia\xianjiamessagepush\myConfig;
use Exception;
// use Suxianjia\xianjiamessagepush\client\OCRClient;
use Suxianjia\xianjiamessagepush\client\messagepush;
use Suxianjia\xianjiaorm\orm\myDatabase;
use Suxianjia\xianjialogwriter\client\myLogClient;
if (!defined('myAPP_VERSION')) {        exit('myAPP_VERSION is not defined'); }
if (!defined('myAPP_ENV')  ) {          exit ('myAPP_ENV is not defined'); }
if (!defined('myAPP_DEBUG')) {          exit('myAPP_DEBUG is not defined'); }
if (!defined('myAPP_PATH')) {           exit('myAPP_PATH is not defined'); }
if (!defined('myAPP_RUNRIMT_PATH')) {   exit('myAPP_RUNRIMT_PATH is not defined'); }

class myApp {
    private static  $tableName = '';
    private static $contentName = '';
    private static $idName = '';
    private static $app_path = '';
 

    private static $instance = null;
    private static $runtime_path = '';
 

    private function __construct() {
        // Private constructor to prevent direct instantiation
    }
//     public static function getInstance(string $tableName, string $contentName, string $idName): Appocr {
    public static function getInstance(): myApp { 
        if (self::$instance === null) {
            self::init();
            self::$instance = new self();
        }
        return self::$instance;
    }

    private static function init () {
        $config = myConfig::getInstance()::getModelInfoConfig();
        self::$tableName = $config['table_name'];
        self::$contentName = $config['content_name'];
        self::$idName = $config['id_name'];
    }

//    
public static function getTableName( ): string  {
    return self::$tableName;
}
// e
public static  function getContentName( ): string  {
    return self::$contentName;
}
// 
public static function getIdName( ): string  {
    return self::$idName;
}


public static function setAppPath()    {
    self::$app_path = myAPP_PATH;
}

public static function getAppPath(): string {
    self::$app_path = myAPP_PATH;
    return  self::$app_path;
   
}
//  
public static function setRuntimePath(string $path = '') {
    self::$runtime_path = myAPP_RUNRIMT_PATH;
}
public static function getRuntimePath(): string {
    self::$runtime_path = myAPP_RUNRIMT_PATH;
  return  self::$runtime_path;
}
 


public function smssend($phoneNumber, $message) {
    // Example implementation of smssend
    if (empty($phoneNumber) || empty($message)) {
        return false;
    }
    // Simulate sending SMS
    return [
        'status' => 'success',
        'phoneNumber' => $phoneNumber,
        'message' => $message
    ];
}

 
    
}
