<?php

namespace nullx27\Easi\Api;

use Carbon\Carbon;

/**
 * Class Response.
 */
class Response
{
    /**
     * Raw endpoint response data.
     *
     * @var array
     */
    public $data = [];

    /**
     * HTTP Response status code.
     *
     * @var int
     */
    public $code = 0;

    /**
     * Serverside cache expiry.
     *
     * @var Carbon
     */
    public $expires;

    /**
     * Last serverside data change.
     *
     * @var Carbon
     */
    public $lastModified;

    /**
     * Raw HTTP Response headers.
     *
     * @var array
     */
    public $headers = [];

    /**
     * Response constructor.
     *
     * @param array $data Raw endpoint response data
     */
    public function __construct(array $data)
    {
        $this->data = $data[0];
        $this->code = $data[1];
        $this->headers = $data[2];

        $this->expires = Carbon::parse($this->headers['Expires']);
        $this->lastModified = Carbon::parse($this->headers['Last-Modified']);
    }

    /**
     * Get endpoint response data.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->data[$name];
    }
}
