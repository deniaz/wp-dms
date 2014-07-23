<?php

namespace Deniaz\WordPress\Dms\Model\Maps;

interface DomainEntityMapInterface
{
    public function has($key);
    public function get($key);
}