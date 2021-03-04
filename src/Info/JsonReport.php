<?php

namespace Info;

class JsonReport extends Report
{
    /**
     * Generate a JSON report
     * @return false|string
     */
    public function generate()
    {
        return json_encode($this->data);
    }
}