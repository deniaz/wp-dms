<?php

namespace Deniaz\WordPress\Dms\Views;

use Deniaz\WordPress\Dms\Plugin;

class Admin
{
    private $pluginDir;

    public function __construct($pluginDir)
    {
        $this->pluginDir = $pluginDir;
    }

    public function addHooks()
    {
        add_action('admin_init', array($this, 'init'));
        add_action('admin_menu', array($this, 'addMenu'));
        add_action('admin_enqueue_scripts', array($this, 'registerAssets'));
    }

    public function init()
    {
        // @TODO: Register Settings/Storage
    }

    public function registerAssets()
    {
        \wp_enqueue_style(
            'dms-css',
            plugins_url('assets/css/dms.css', $this->pluginDir . 'wp-dms.php'),
            array(),
            '',
            'all'
        );
    }

    public function addMenu()
    {
        add_options_page(
            __('Page Title', Plugin::TEXT_DOMAIN),
            __('Menu Title', Plugin::TEXT_DOMAIN),
            'manage_options',
            'dms-config',
            array($this, 'render')
        );
    }

    public function render()
    {
        if (!current_user_can('manage_options')) {
            wp_redirect(
                admin_url()
            );
        }

        $view = new Template($this->pluginDir);
        $view->title = __('Page Title', PLUGIN::TEXT_DOMAIN);
        $view->submitButton = __('Submit Button', PLUGIN::TEXT_DOMAIN);
        $view->tabs = array(
            'all' => array(
                'text' => __('All Domains', PLUGIN::TEXT_DOMAIN),
                'count' => 5
            ),
            'active' => array(
                'text' => __('Active Domains', PLUGIN::TEXT_DOMAIN),
                'count' => 2
            ),
            'inactive' => array(
                'text' => __('Inactive Domains', PLUGIN::TEXT_DOMAIN),
                'count' => 3
            )
        );

        echo $view->render('options.php');
    }
}