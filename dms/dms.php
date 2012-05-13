<?php
/*
 * Plugin Name: Domain Map System
 * Plugin URI: http://www.cheekyowl.com/wp/dms
 * Description: Maps certain Domains to certain WP pages (e.g. mywordpress.com -> default, myblog.com -> /blog, mypics.com -> /gallery) 
 * Version: 0.1alpha
 * Author: Robert Vogt
 * Author URI: http://www.cheekyowl.com
 * License: GPL2
 *
 * 
 * Copyright 2012 Robert Vogt (email: robert@cheekyowl.com)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

require_once(plugin_dir_path(__FILE__) . 'dms.class.php');
require_once(plugin_dir_path(__FILE__) . 'dmsmenu.class.php');

function dms_init()
{
    $dms = new DMS();
    $dms->run();
}

function dms_menu()
{
    $DMSMenu    = DMSMenu::getInstance();
    $DMSMenu->config();
}

function dms_settings()
{
    $DMSMenu    = DMSMenu::getInstance();
    $DMSMenu->registerSettings();
}

function dms_menu_page()
{
    $DMSMenu    = DMSMenu::getInstance();
    $DMSMenu->display();
}

function dms_deactivate()
{
    unregister_setting('dms_config', 'dms_map', '');
    unregister_setting('dms_config', 'dms_exit_php', '');
}

add_action('init', 'dms_init', 1, 1);
add_action('admin_init', 'dms_settings');
add_action('admin_menu', 'dms_menu');
register_deactivation_hook(__FILE__, 'dms_deactivate');