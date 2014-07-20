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

use Deniaz\WordPress\Dms\Views\Admin;

class Plugin {

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

        $this->initHooks();
    }

    /**
     * Adds Action Hooks.
     *
     * @since 1.4
     * @access private
     * @return void
     */
    private function initHooks()
    {
        if (!is_admin()) {
            $domainPostMap = new DomainPostMap();
            $mapper = new Mapper($domainPostMap);
            add_action('plugins_loaded', array($mapper, 'onPluginsLoaded'), 1, 0);
        } else {
            $adminView = new Admin();
        }
    }
}