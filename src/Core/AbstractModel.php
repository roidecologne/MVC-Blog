<?php
/**
 * Copyright © 2022 - Oliver Kloecker
 */

namespace App\Core;

use ArrayAccess;

abstract class AbstractModel implements ArrayAccess {

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->$offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->$offset;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->$offset = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->$offset);
    }
}