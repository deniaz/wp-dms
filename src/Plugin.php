<?php

namespace Deniaz\WordPress\Dms;

/**
 * Class Plugin
 * @package Deniaz\WordPress\Dms
 */
class Plugin
{
    const DMS_VERSION = 1.4;
    const DMS_VERSION_DB_KEY = 'dms_plugin_version';
    const TEXT_DOMAIN = 'dms';

    /**
     * @var
     */
    private $pluginDir;

    /**
     * @var Router
     */
    private $router;

    /**
     * @param $pluginDir
     */
    public function __construct($pluginDir)
    {
        $this->pluginDir = $pluginDir;
        $this->router = new Router(new Mapping());
        $this->register();
    }

    /**
     *
     */
    public function activate()
    {
        if (version_compare(PHP_VERSION, '5.4.0') < 0) {
            die('DMS 1.4 needs at least PHP 5.4.0.');
        }
    }

    /**
     *
     */
    public function deactivate()
    {
        throw new \LogicException();
    }

    /**
     *
     */
    public function register()
    {
        add_action('init', [$this->router, 'dispatch']);
    }

    /**
     *
     */
    public function run()
    {
        /*if (is_admin()) {
            if (!$this->isLatestVersion()) {
                $this->upgrade();
            }
        }*/
    }

    /**
     * @return bool
     */
    private function isLatestVersion()
    {
        return ((float) \get_site_option(self::DMS_VERSION_DB_KEY,
                false) === self::DMS_VERSION);
    }

    /**
     *
     */
    private function upgrade()
    {
        // @TODO: Update old DB structure to new one
        // Fetch all old data stuff, write do mapped posts, remove it
        \update_site_option(self::DMS_VERSION_DB_KEY, self::DMS_VERSION);
    }
}
