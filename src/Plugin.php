<?php
/**
 * Plugin Main Class
 *
 * Adds WordPress Action Hooks and sets essential parameters.
 *
 * @since 1.4
 *
 * @package Deniaz\WordPress\Dms
 */

namespace Deniaz\WordPress\Dms;

class Plugin
{
    /**
     * Plugin Dir Path.
     *
     * @since 1.4
     * @access private
     * @var string $pluginDir Plugin Dir Path.
     */
    private $pluginDir;

    /**
     * Plugin Constructor.
     *
     * Instantiates a plugin object and adds action hooks.
     *
     * @since 1.4
     * @param string $pluginDir Plugin Dir Path.
     * @return Deniaz\WordPress\Dms\Plugin Instance
     */
    public function __construct($pluginDir)
    {
        $this->pluginDir = $pluginDir;
    }

    /**
     * Adds Action Hooks.
     *
     * @since 1.4
     * @access private
     * @return void
     */
    public function init()
    {
        if (!is_admin()) {
            //@TODO Implement real Map
            //$domainPostMap = new DomainPostMap();
            $domainPostMap = new MockDomainPostMap();
            $mapper = new Mapper($domainPostMap);
            add_action('wp', array($mapper, 'onPluginsLoaded'), 1, 0);
        }
    }
}