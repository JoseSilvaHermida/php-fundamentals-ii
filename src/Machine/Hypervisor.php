<?php

namespace Machine;

use Common\DatastoreTrait;
use Common\MachineStatusTrait;
use Common\SwitchableInterface;

class Hypervisor extends Machine
{
    protected string $datastore = 'default';
    private SwitchableInterface $machine;

    public function __construct(string $name, string $datastore, SwitchableInterface $machine)
    {
        parent::__construct($name);
        $this->datastore = $datastore;
        $this->machine = $machine;
    }

    use MachineStatusTrait, DatastoreTrait {
        MachineStatusTrait::exists insteadof DatastoreTrait;
        DatastoreTrait::exists as datastoreExists;
    }

    /**
     * Return the name
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Return the datastore
     * @return string
     */
    public function getDatastore(): string {
        if ( $this->datastoreExists() ) {
            return $this->datastore;
        }

        return '';
    }

    /**
     * Generate a report
     * @return string
     */
    public function getReport(): string {
        return sprintf("No report available for %s", $this->name );
    }
}