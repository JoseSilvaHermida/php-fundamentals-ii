<?php

namespace Common;

trait MachineStatusTrait
{
    public function isRunning(): bool {
        // Randomly decide if it is running or not
        if ( rand(0, 5) == 0 ) {
            return false;
        }

        return true;
    }

    public function exists(): bool {
        // Randomly decide if it exists or not
        if ( rand(0, 9) == 0 ) {
            return false;
        }

        return true;
    }
}