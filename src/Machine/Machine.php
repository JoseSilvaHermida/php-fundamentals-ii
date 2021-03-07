<?php

namespace Machine;

use Common\SwitchableInterface;
use Exceptions\SetPropertyException;

abstract class Machine implements SwitchableInterface
{
    public const OS = 'LINUX';
    protected string $name  = 'test';

    /**
     * Machine constructor.
     * @param string $name
     */
    public function __construct( string $name ) {
        $this->name = $name;
    }

    /**
     * Implement the method to start the Machine
     * @return bool
     */
    public function start(): bool {
        echo "Switch on\n";
        return true;
    }

    /**
     * Implement the method to stop the Machine
     * @return bool
     */
    public function stop(): bool {
        echo "Switch off\n";
        return true;
    }

    /**
     * Magic method triggered fetching a non-existent property
     * @param $name
     * @throws \Exception
     */
    public function __get( $name ) {
        throw new \Exception("Property $name does not exist");
    }

    /**
     * Magic method triggered setting a non-existent property
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function __set($name, $value ) {
        throw new SetPropertyException("Cannot assign value $value to property $name");
    }

    public abstract function getReport();
}