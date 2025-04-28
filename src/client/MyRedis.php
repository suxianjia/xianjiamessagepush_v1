<?php
namespace Suxianjia\xianjiamessagepush\client;
use \Redis;

/*

# Install the Redis extension if not already installed

sudo apt-get install php-redis # For Ubuntu/Debian

# OR

brew install redis && pecl install redis # For macOS



# Enable the Redis extension in your PHP configuration

echo "extension=redis.so" | sudo tee -a $(php --ini | grep "Loaded Configuration" | awk '{print $4}')



# Restart your web server or PHP service

sudo service apache2 restart # For Apache

sudo service php7.x-fpm restart # For PHP-FPM (replace 7.x with your PHP version)


*/
class MyRedis
{
    protected $redis;
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    protected function connect()
    {
        $this->redis = new Redis();
        $this->redis->connect($this->config['host'], $this->config['port']);
        if (isset($this->config['password'])) {
            $this->redis->auth($this->config['password']);
        }
    }
    public function set($key, $value, $expire = 0)
    {
        if ($expire > 0) {
            $this->redis->setex($key, $expire, $value);
        } else {
            $this->redis->set($key, $value);
        }
    }   
    public function get($key)
    {
        return $this->redis->get($key);
    }
    public function delete($key)
    {
        return $this->redis->delete($key);
    }
    public function exists($key)
    {
        return $this->redis->exists($key);
    }
    public function close()
    {
        $this->redis->close();
    }
    public function __destruct()
    {
        $this->close();
    }   
    public function getRedis()
    {
        return $this->redis;
    }
    public function getConfig()
    {
        return $this->config;
    }
    public function setConfig($config)
    {
        $this->config = $config;
        $this->connect();
    }   
    }