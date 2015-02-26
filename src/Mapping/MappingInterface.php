<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Interface MappingInterface
 * @package Deniaz\WordPress\Dms\Mapping
 */
interface MappingInterface
{
    /**
     * @param $key
     *
     * @return mixed
     */
    public function contains($key);

    /**
     * @param $key
     * @param $item
     *
     * @return mixed
     */
    public function add($key, $item);

    /**
     * @param $key
     *
     * @return mixed
     */
    public function remove($key);
}
