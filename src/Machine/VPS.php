<?php

namespace Machine;

use Common\MachineStatusTrait;
use Info\JsonReport;

class VPS extends Machine
{
    protected string $ram   = '8GB';
    protected string $hd    = '64GB';

    /**
     * VPS constructor.
     * @param string $name
     * @param string $ram
     * @param string $hd
     */
    public function __construct( string $name, string $ram, string $hd ) {
        parent::__construct( $name );
        $this->ram  = $ram;
        $this->hd   = $hd;

        printf("New %s machine: %s\n", parent::OS, $this->name);
    }

    /**
     * Create a new VPS
     * @param bool $autostart
     * @return bool|void
     */
    public function create( bool $autostart = false ): bool {
        // TODO: Actually create the VPS

        // Start the VPS after creation
        if ( $autostart ) {
            return $this->start();
        }

        return true;
    }

    /**
     * Delete the VPS if it is stopped
     * @return bool
     */
    public function delete(): bool {
        // TODO: Actually delete the VPS

        if ( ! $this->exists() ) {
            echo "Machine does not exist\n";
            return false;
        }

        if ( $this->isRunning() ) {
            echo "Machine is still running\n";
            return false;
        }

        return true;
    }

    use MachineStatusTrait;

    /**
     * Returns VPS data
     * @return string
     */
    public function __toString(): string {
        return 'Name='.$this->name.',RAM='.$this->ram.',HD='.$this->hd;
    }

    public function __destruct() {
        echo "GAME OVER YEEEAH!\n";
    }

    /**
     * Generate a report
     * @return string
     */
    public function getReport() {
        return new JsonReport([
            'name'  => $this->name,
            'ram'   => $this->ram,
            'hd'    => $this->hd
        ]);
    }
}