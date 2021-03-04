<?php

namespace Machine;

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
    }

    /**
     * Create a new VPS
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
     * Implement the method to start the VPS
     * @return bool
     */
    public function start() {
        return true;
    }

    /**
     * Implement the method to stop the VPS
     * @return bool
     */
    public function stop() {
        return true;
    }

    /**
     * Check if the VPS is running
     * @return bool
     */
    protected function isRunning() {
        // Randomly decide if the VPS is running or not
        if ( rand(0, 5) == 0 ) {
            return false;
        }

        return true;
    }

    /**
     * Returns VPS data
     * @return string
     */
    public function __toString() {
        return 'Name='.$this->name.',RAM='.$this->ram.',HD='.$this->hd;
    }

    /**
     * Magic method triggered fetching a non-existant property
     * @param $name
     * @throws \Exception
     */
    public function __get( $name ) {
        throw new \Exception("Property $name does not exist");
    }

    /**
     * Magic method triggered setting a non-existant property
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function __set($name, $value ) {
        throw new \Exception("Cannot assign value $value to property $name");
    }

    public function __destruct()
    {
        echo "GAME OVER YEEEAH!\n";
        return true;
    }

    /**
     * Generate a report
     * @return string
     */
    public function getReport()
    {
        return new JsonReport([
            'name'  => $this->name,
            'ram'   => $this->ram,
            'hd'    => $this->hd
        ]);
    }
}