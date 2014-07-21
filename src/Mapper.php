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
     * @param DomainPostMap $domainPostMap Map containing Domain and Post Info.
     * @return Mapper
     */
    public function __construct(DomainPostMapInterface $domainPostMap)
    {
        $this->map = $domainPostMap;
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
        $this->currentDomain = $_SERVER['HTTP_HOST'];

        if ($this->map->has($this->currentDomain)) {
            $this->rewrite(
                $this->map->get($this->currentDomain)
            );
        }
    }

    private function rewrite(DomainPostPair $domainPostPair)
    {
        $className = "Deniaz\\Dms\\Rewrite\\{$domainPostPair->getPostType()}Rewrite";

        if (class_exists($className)) {
            $rewrite = new $className($domainPostPair);
        }
        else {
            $rewrite = new Rewrite\PostRewrite($domainPostPair);
        }

        $rewrite->rewrite();
    }
}