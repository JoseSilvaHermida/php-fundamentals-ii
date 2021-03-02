<?php

namespace Server;

class VPS
{
    protected string $name  = 'test';
    protected string $ram   = '8GB';
    protected string $hd    = '64GB';

    /**
     * VPS constructor.
     * @param string $name
     * @param string $ram
     * @param string $hd
     */
    public function __construct( string $name, string $ram, string $hd ) {
        $this->name = $name;
        $this->ram  = $ram;
        $this->hd   = $hd;
    }

    /**
     * @param bool $autostart
     * @return bool|void
     */
    public function create( bool $autostart = false ) {
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
    public function delete() {
        // TODO: Actually delete the VPS

        if ( $this->isRunning() ) {
            return false;
        }

        return true;
    }

    /**
     * Start the VPS
     * @return bool
     */
    public function start() {
        return true;
    }

    /**
     * Check if the VPS is running
     * @return bool
     */
    private function isRunning() {
        // Randomly decide if the VPS is running or not
        if ( rand(0, 5) == 0 ) {
            return false;
        }

        return true;
    }
}