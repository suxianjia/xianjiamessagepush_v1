<?php
namespace Suxianjia\xianjiamessagepush\driver;
use Suxianjia\xianjiamessagepush\myConfig;
 use Suxianjia\xianjiamessagepush\interface\SmsDriverInterface;

/**
 * 短信驱动基础实现类
 */
abstract class BaseSmsDriver implements SmsDriverInterface
{
    /**
     * 单例实例
     * @var static|null
     */
    protected static $instance = null;

    /**
     * 配置信息
     * @var array
     */
    protected $config = [];

    /**
     * 最后一次错误信息
     * @var string|null
     */
    protected $lastError = null;

    /**
     * 私有构造函数，防止外部实例化
     */
    protected function __construct()
    {
    }

    /**
     * 私有克隆方法，防止克隆实例
     */
    private function __clone()
    {
    }

    /**
     * 获取驱动实例（单例模式）
     * @return static
     */
    public static function getInstance(): SmsDriverInterface
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * 设置配置信息
     * @param array $config 配置数组
     * @return self
     */
    public function setConfig(array $config): SmsDriverInterface
    {
        $this->config = array_merge($this->config, $config);
        return $this;
    }

    /**
     * 获取最后一次错误信息
     * @return string|null
     */
    public function getLastError(): ?string
    {
        return $this->lastError;
    }

    /**
     * 设置错误信息
     * @param string $error 错误信息
     * @return void
     */
    protected function setError(string $error): void
    {
        $this->lastError = $error;
    }

    /**
     * 发送短信的具体实现
     * 子类必须实现此方法
     * @param string $phone 手机号
     * @param string $content 短信内容
     * @param array $options 额外的配置选项
     * @return bool 发送结果
     */
    abstract public function send(string $phone, string $content, array $options = []): bool;
}