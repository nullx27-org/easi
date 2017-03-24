<?php

namespace nullx27\Easi\Api;

use Carbon\Carbon;

class Response
{
    public $data = [];

    public $code = 0;
    public $expires;
    public $lastModified;
    public $headers = [];

    public function __construct(array $data)
    {
        $this->data = $data[0];
        $this->code = $data[1];
        $this->headers = $data[2];

        $this->expires = Carbon::parse($this->headers['Expires']);
        $this->lastModified = Carbon::parse($this->headers['Last-Modified']);
    }

    public function __get($name)
    {
        return $this->data[$name];
    }
}