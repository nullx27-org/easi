<?php

namespace nullx27\Easi\Api;

use nullx27\Easi\Exceptions\InvalidModelDataException;

/**
 * Class Model.
 */
abstract class Model
{
    /**
     * esi-php model class.
     *
     * @var string
     */
    protected $class;

    /**
     * esi-php model instance.
     *
     * @var mixed
     */
    protected $model;

    /**
     * Model constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->model = new $this->class($data);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array($this->model, $arguments);
    }

    /**
     * get populated esi-php model.
     *
     * @throws InvalidModelDataException
     *
     * @return mixed
     */
    public function getModel()
    {
        if (!$this->model->valid()) {
            throw new InvalidModelDataException($this->model->listInvalidProperties());
        }

        return $this->model;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->model[$name];
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function __set(string $name, string $value)
    {
        $this->model[$name] = $value;
    }
}
