<?php

namespace Deniaz\WordPress\Dms;

/**
 * Class Router
 * @package Deniaz\WordPress\Dms
 */
class Router
{
    /**
     * @var Mapping\MappingInterface
     */
    private $store;

    /**
     * @param Mapping\MappingInterface $store
     */
    public function __construct(Mapping\MappingInterface $store)
    {
        $this->store = $store;
    }

    /**
     *
     */
    public function dispatch()
    {
        if (isset($_SERVER['REQUEST_URI']) && isset($_SERVER['HTTP_HOST'])) {
            $currentDomain =
                ('/' === $_SERVER['REQUEST_URI'])
                    ? strtolower($_SERVER['HTTP_HOST'])
                    : strtolower($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

            if ($this->store->contains($currentDomain)) {
                /** @var Mapping\EntryInterface $entry */
                $entry = $this->store->get($currentDomain);
                $entry->rewrite();
            }
        }
    }
}
