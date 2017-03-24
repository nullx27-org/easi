<?php

namespace nullx27\Easi;

use Carbon\Carbon;
use nullx27\Easi\Api\Response;
use nullx27\Easi\Exceptions\EndpointNotFoundException;
use nullx27\Easi\Exceptions\MethodNotFoundException;

class Easi
{
    protected $config;
    protected $token;

    private $endpoint;
    private $endpoints = [];

    /**
     * @param string $token
     */
    public function __construct(string $token = "")
    {
        $this->config = Configuration::getInstance();
        $this->config->getApiClientConfig()->setAccessToken($token);
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    public function __get($name)
    {
        $endpoint = __NAMESPACE__ . '\\Api\\Endpoints\\' . ucfirst($name);

        if (!class_exists($endpoint))
            throw new EndpointNotFoundException();

        $this->endpoint = $endpoint;
        return $this;
    }

    public function __call($name, $arguments)
    {
        if (is_null($this->endpoint))
            throw new EndpointNotFoundException();

        $cache = $this->config->getCache();

        $args = array_flatten($arguments);
        $endpoint = substr(strrchr($this->endpoint, '\\'), 1);

        $key = $endpoint . '|' . $this->token . '|' . $this->getConfig()->getDatasource() . '|' . implode('|', $args);

        if (!$cache->has($key)) {
            $instance = $this->getEndpoint($this->endpoint, $this->config->getDatasource());

            if (!method_exists($instance, $name)) {
                throw new MethodNotFoundException();
            }

            $raw = call_user_func_array([$instance, $name], $arguments);
            $ttl = Carbon::parse($raw[2]['Expires'])->diffInMinutes();

            $cache->set($key, $raw, $ttl);
        } else {
            $raw = $cache->get($key);
        }

        return new Response($raw);

    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    protected function getEndpoint(string $endpoint, string $datasource)
    {
        if (!in_array($endpoint . $datasource, $this->endpoints)) {
            $this->endpoints[$endpoint . $datasource] = new $endpoint($this->config->getDatasource());
        }

        return $this->endpoints[$endpoint . $datasource];
    }


}