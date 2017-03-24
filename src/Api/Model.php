<?php

namespace nullx27\Easi\Api;

use nullx27\Easi\Exceptions\InvalidModelDataException;

abstract class Model
{
    protected $_class;
    protected $_model;

    public function __construct(array $data)
    {
        $this->_model = new $this->_class($data);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array($this->_model, $arguments);
    }

    /**
     * @throws InvalidModelDataException
     *
     * @return mixed
     */
    public function getModel()
    {
        if (!$this->_model->valid()) {
            throw new InvalidModelDataException($this->_model->listInvalidProperties());
        }
        return $this->_model;
    }

    public function __get($name)
    {
        return $this->_model[$name];
    }

    public function __set($name, $value)
    {
        $this->_model[$name] = $value;
    }
}
