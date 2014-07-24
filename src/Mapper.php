<?php
/**
 * Mapper
 *
 * Checks whether the page needs to be rewritten.
 *
 * @since 1.4
 *
 * @package Deniaz\WordPress\Dms
 */

namespace Deniaz\WordPress\Dms;

use Deniaz\WordPress\Dms\Model\Maps\DomainEntityMapInterface;

class Mapper
{
    /**
     * Domain and post info.
     *
     * @since 1.4
     * @access private
     * @var Array $map Domain and post info.
     */
    private $map;

    /**
     * Currently accessed Domain
     *
     * @since 1.4
     * @access private
     * @var string $currentDomain Current HTTP Host
     */
    private $currentDomain;

    /**
     * Mapper Constructor.
     *
     * Instantiates Mapper object.
     *
     * @since 1.4
     * @param DomainEntityMapInterface $domainEntityMap Map containing Domain and Post Info.
     * @return Mapper
     */
    public function __construct(DomainEntityMapInterface $domainEntityMap)
    {
        $this->map = $domainEntityMap;
    }

    /**
     * plugins_loaded Callback.
     *
     * Callback function called on plugins_loaded. If the current domain is mapped to a post, the request will be
     * rewritten.
     *
     * @since 1.4
     * @return void
     */
    public function onPluginsLoaded()
    {
        $this->currentDomain = ('/' === $_SERVER['REQUEST_URI'])
            ? $_SERVER['HTTP_HOST']
            : $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if ($this->map->has($this->currentDomain)) {
            $this->rewrite(
                $this->map->get($this->currentDomain)
            );
        }
    }

    private function rewrite(\stdClass $domainPostPair)
    {
        $className = "Deniaz\\WordPress\\Dms\\Rewrite\\{$domainPostPair->type}Rewrite";

        if (class_exists($className)) {
            $rewrite = new $className($domainPostPair);
        }
        else {
            $rewrite = new Rewrite\PostRewrite($domainPostPair);
        }

        $rewrite->rewrite();
    }
}