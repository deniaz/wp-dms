<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Interface EntryInterface
 * @package Deniaz\WordPress\Dms\Mapping
 */
interface EntryInterface
{
    /**
     * Rewrites Global WordPress Query
     * @return void
     */
    public function rewrite();
}
