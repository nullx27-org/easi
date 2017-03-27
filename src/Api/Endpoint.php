<?php

namespace nullx27\Easi\Api;

/**
 * Class Endpoint
 * @package nullx27\Easi\Api
 */
abstract class Endpoint
{
    /**
     * esi-php endpoint api client
     *
     * @var mixed
     */
    protected $apiClient;

    /**
     * ESI datasource
     *
     * @var string
     */
    protected $datasource;
}
