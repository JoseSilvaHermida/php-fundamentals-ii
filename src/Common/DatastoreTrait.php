<?php

namespace Common;

trait DatastoreTrait
{
    public function exists(): bool {
        // Randomly decide if it exists or not
        if ( rand(0, 9) == 0 ) {
            return false;
        }

        return true;
    }
}