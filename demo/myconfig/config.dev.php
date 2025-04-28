<?php 


return [

   "version" => 'v1.0.0',
   'app_debug' => true,
   'app_env' =>   'dev',//dev,prod
   'app_path' => __DIR__.'/',
   'runtime_path' => __DIR__.'/runtime', //用户输入  路径 

    //
    // 'user_config_file.php' => time() ,

 
// Database configuration
 'mysql' =>  [
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'www_u_petrol_com',
    'username' => 'root',
    'password' => '654321mm',
    'ssssssss' => "sssssss",
    "dsn" =>"mysql:host=localhost;dbname=mydatabase",
 ],
// ocr
 'ocr' => [
    'url' => 'https://ai.gitee.com/v1/images/ocr',
    'token' => 'WUNJCZ38UH3TIQD5KU7D85PTELNJLBOQ03EQMG1H',
    'model' => 'GOT-OCR2_0',
    'image_path' => __DIR__.'/runtime' ,
    'out_file_path' => __DIR__.'/runtime' ,
    'response_format' => 'text',
 ],
//log
 'log' => [
    'log_path' => __DIR__.'/runtime',
    'log_mode' => 'mysql',
    'runtime_path' => __DIR__.'/runtime',
 
 ],
// modelinfo
 'modelinfo' =>  [
    'table_name' => 'ypc_news_base',
    'content_name' => 'article_content',
    'id_name' => 'article_id',
 ],
// Set the table name, content name, and ID name

];