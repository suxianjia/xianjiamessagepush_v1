<?php
// require_once __DIR__ . '/../../vendor/autoload.php';

// use framework\driver\LogSmsDriver;

// // 获取短信驱动实例（单例模式）
// $smsDriver = LogSmsDriver::getInstance();

// // 配置短信驱动
// $smsDriver->setConfig([
//     'debug' => true,
//     // 其他配置项...
// ]);

// // 发送测试短信
// $phone = '13800138000';
// $content = '您的验证码是：123456，5分钟内有效。';
// $result = $smsDriver->send($phone, $content);

// if ($result) {
//     echo "短信发送成功！\n";
// } else {
//     echo "短信发送失败：" . $smsDriver->getLastError() . "\n";
// }

// // 验证单例模式
// $anotherInstance = LogSmsDriver::getInstance();
// var_dump($smsDriver === $anotherInstance); // 应该输出：bool(true)