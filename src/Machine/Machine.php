<?php

namespace Machine;

abstract class Machine
{
    protected string $name  = 'test';

    /**
     * Machine constructor.
     * @param string $name
     */
    public function __construct( string $name ) {
        $this->name = $name;
    }

    public abstract function start();
    public abstract function stop();

    public abstract function getReport();
}