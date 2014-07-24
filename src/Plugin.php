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

use Deniaz\WordPress\Dms\Model\Maps\MockDomainEntityMap;
use Deniaz\WordPress\Dms\Views\Admin;
class Plugin
{
    const DMS_VERSION = 1.4;
    const DMS_VERSION_DB_KEY = 'dms_plugin_version';
    const TEXT_DOMAIN = 'dms';

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
            $domainPostMap = new MockDomainEntityMap();
            $mapper = new Mapper($domainPostMap);
            add_action('init', array($mapper, 'onPluginsLoaded'), 1, 0);
        }
        else {
            if (!$this->isLatestInstalled()) {
                $this->upgrade();
            }

            $admin = new Admin($this->pluginDir);
            $admin->addHooks();
        }
    }

    private function isLatestInstalled()
    {
        return ((float) \get_site_option(self::DMS_VERSION_DB_KEY, false) === self::DMS_VERSION);
    }

    private function upgrade()
    {
        // @TODO: Update old DB structure to new one
        \update_site_option(self::DMS_VERSION_DB_KEY, self::DMS_VERSION);
    }

    public static function activate($networkwide) {
        if (version_compare(PHP_VERSION, '5.4.0') < 0) {
            die('DMS 1.4 needs at least PHP 5.4.0.');
        }
    }
}