<?php

namespace Info;

abstract class Report
{
    protected array $data;
    /**
     * Report constructor.
     * @param array $data
     */
    public function __construct( array $data ) {
        $this->data = $data;
    }

    public abstract function generate();
}