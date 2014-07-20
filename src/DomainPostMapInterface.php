<?php

namespace Deniaz\WordPress\Dms;

interface DomainPostMapInterface
{
    public function has($key);
    public function get($key);
}