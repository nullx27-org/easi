<?php

namespace nullx27\Easi;

use Cache\Adapter\PHPArray\ArrayCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;

/**
 * Class Configuration
 * @package nullx27\Easi
 */
class Configuration
{
    /**
     * Singleton instance
     * @var null
     */
    protected static $instance = null;

    /**
     * PSR-16 compatible Cache instance
     * @var CacheInterface
     */
    private $cache;

    /**
     * PSR-3 compatible logger
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ESI Datasource
     * @var string
     */
    private $datasource = 'tranquility';

    /**
     * esi-php api client config
     * @var \nullx27\ESI\Configuration
     */
    private $apiClientConfig;

    /**
     * Configuration constructor.
     */
    private final function __construct()
    {
        $this->apiClientConfig = \nullx27\ESI\Configuration::getDefaultConfiguration();
        $this->setUseragent('nullx27/easi');
        $this->setCache(new SimpleCacheBridge(new ArrayCachePool()));
        $this->setLogger(new NullLogger());
    }

    /**
     * Set useragent
     * @param string $useragent
     */
    public function setUseragent(string $useragent)
    {
        $this->apiClientConfig->setUserAgent($useragent);
    }

    /**
     * Get signleton instance
     * @static
     * @return Configuration
     */
    public static function getInstance(): Configuration
    {
        if (is_null(static::$instance)) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    /**
     * Get Logger
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Set Logger
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Get ESI datasource
     *
     * @return string
     */
    public function getDatasource(): string
    {
        return $this->datasource;
    }

    /**
     * Set ESI datasource
     *
     * @param string $datasource
     */
    public function setDatasource(string $datasource)
    {
        $this->datasource = $datasource;
    }

    /**
     * Get HTTP Useragent
     *
     * @return string
     */
    public function getUseragent(): string
    {
        return $this->apiClientConfig->getUserAgent();
    }

    /**
     * Get esi-php api client configuraiton
     *
     * @return \nullx27\ESI\Configuration
     */
    public function getApiClientConfig(): \nullx27\ESI\Configuration
    {
        return $this->apiClientConfig;
    }

    /**
     * Get Cache
     *
     * @return CacheInterface
     */
    public function getCache(): CacheInterface
    {
        return $this->cache;
    }

    /**
     * Set Cache
     *
     * @param CacheInterface $cache
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
    }
}
