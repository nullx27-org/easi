<?php

namespace nullx27\Easi;

use Carbon\Carbon;
use nullx27\Easi\Api\Endpoint;
use nullx27\Easi\Api\Response;
use nullx27\Easi\Exceptions\EndpointNotFoundException;
use nullx27\Easi\Exceptions\MethodNotFoundException;
use nullx27\ESI\ApiException;

/**
 * Class Easi.
 */
class Easi
{
    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var string SSO access token
     */
    protected $token;

    /**
     * @var string last called endpoint
     */
    private $endpoint;

    /**
     * @var array collection of cached endpoint instances
     */
    private $endpoints = [];

    /**
     * @param string $token SSO access token default: empty
     */
    public function __construct(string $token = '')
    {
        $this->config = Configuration::getInstance();
        $this->config->getApiClientConfig()->setAccessToken($token);
    }

    /**
     * Get access token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * set access token.
     *
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     *  Set endpoint.
     *
     * @param string $name Endpoint name
     *
     * @throws EndpointNotFoundException
     *
     * @return Easi
     */
    public function __get(string $name): self
    {
        $endpoint = __NAMESPACE__.'\\Api\\Endpoints\\'.ucfirst($name);

        if (!class_exists($endpoint)) {
            $this->getConfig()->getLogger()->error('Endpoint {endpoint] not found!', ['endpoint' => $endpoint]);

            throw new EndpointNotFoundException();
        }

        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Get Configuration instance.
     *
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Call endpoint method.
     *
     * @param string $name      Method name
     * @param array  $arguments
     *
     * @throws EndpointNotFoundException
     * @throws Exceptions\ApiException
     * @throws MethodNotFoundException
     *
     * @return Response
     */
    public function __call(string $name, array $arguments): Response
    {
        if (is_null($this->endpoint)) {
            throw new EndpointNotFoundException();
        }

        $cache = $this->config->getCache();
        $args = array_flatten($arguments);
        $endpoint = substr(strrchr($this->endpoint, '\\'), 1);

        $this->getConfig()->getLogger()->info('Called {endpoint} -> {method}', ['endpoint' => $endpoint, 'method' => $name]);

        $key = $endpoint.'|'.$this->token.'|'.$this->getConfig()->getDatasource().'|'.implode('|', $args);

        if (!$cache->has($key)) {
            $instance = $this->getEndpoint($this->endpoint, $this->config->getDatasource());

            if (!method_exists($instance, $name)) {
                $this->getConfig()->getLogger()->error('{endpoint}::{method} not found!', ['endpoint' => $endpoint, 'method' => $name]);

                throw new MethodNotFoundException();
            }

            try {
                $raw = call_user_func_array([$instance, $name], $arguments);
            } catch (ApiException $exception) {
                throw new \nullx27\Easi\Exceptions\ApiException($exception->getResponseBody()->error, $exception->getCode());
            }

            $ttl = Carbon::parse($raw[2]['Expires'])->diffInMinutes();

            $cache->set($key, $raw, $ttl);
            $this->getConfig()->getLogger()->info('Result cached with key {key}', ['key' => $key]);
        } else {
            $this->getConfig()->getLogger()->info('Request was found in cache!');
            $raw = $cache->get($key);
        }

        return new Response($raw);
    }

    /**
     * Get Endpoint instance.
     *
     * @param string $endpoint
     * @param string $datasource
     *
     * @return Endpoint
     */
    protected function getEndpoint(string $endpoint, string $datasource): Endpoint
    {
        if (!in_array($endpoint.$datasource, $this->endpoints)) {
            $this->endpoints[$endpoint.$datasource] = new $endpoint($this->config->getDatasource());
        }

        return $this->endpoints[$endpoint.$datasource];
    }
}
