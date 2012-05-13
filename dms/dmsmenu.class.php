<?php
class DMSMenu
{
    private static $instance;
    
    private function __construct()
    {
        
    }
    
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance    = new self();
        }
        
        return self::$instance;
    }
    
    public function config()
    {
        add_options_page(
            'Domain Map System Options',
            'DMS Options',
            'administrator',
            'dms-options',
            'dms_menu_page'
        );
    }
    
    public function registerSettings()
    {
        register_setting(
            'dms_config',
            'dms_map'
        );
        
        register_setting(
            'dms_config',
            'dms_exit_php'
        );
    }
    
    public function display()
    {
        if (!current_user_can('install_plugins'))
        {
            wp_die(__('You do not have the permissions to access this page.'));
        }
        
        include_once(plugin_dir_path(__FILE__) . '/templates/option-page.php');
    }
}