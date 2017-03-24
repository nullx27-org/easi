<?php

namespace nullx27\Easi;

use Cache\Adapter\PHPArray\ArrayCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;
use Psr\Log\LoggerInterface;

class Configuration
{
    protected static $instance = null;

    private $cache;
    private $logger;
    private $datasource = 'tranquility';

    private $apiClientConfig;

    public function __construct()
    {
        $this->apiClientConfig = \nullx27\ESI\Configuration::getDefaultConfiguration();
        $this->setUseragent('nullx27/easi');
        $this->setCache(new SimpleCacheBridge(new ArrayCachePool()));
    }

    /**
     * @param string $useragent
     */
    public function setUseragent(string $useragent)
    {
        $this->apiClientConfig->setUserAgent($useragent);
    }

    public static function getInstance(): Configuration
    {
        if (is_null(static::$instance)) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    /**
     * @return mixed
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param mixed $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getDatasource(): string
    {
        return $this->datasource;
    }

    /**
     * @param string $datasource
     */
    public function setDatasource(string $datasource)
    {
        $this->datasource = $datasource;
    }

    /**
     * @return string
     */
    public function getUseragent(): string
    {
        return $this->apiClientConfig->getUserAgent();
    }

    /**
     * @return \nullx27\ESI\Configuration
     */
    public function getApiClientConfig(): \nullx27\ESI\Configuration
    {
        return $this->apiClientConfig;
    }

    /**
     * @return mixed
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param mixed $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
    }
}
