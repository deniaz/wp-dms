<?php
/*
 * Plugin Name: Domain Map System
 * Plugin URI: http://projects.cheekyowl.com/wp-dms
 * Description: Maps certain Domains to certain WP pages (e.g. mywordpress.com -> default, myblog.com -> /blog, mypics.com -> /gallery) 
 * Version: 1.3
 * Author: Robert Vogt
 * Author URI: http://www.cheekyowl.com
 * License: GPL3
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
 * along with this program; if not, see <http://www.gnu.org/licenses/>.
 */

require_once(plugin_dir_path(__FILE__) . 'dms.class.php');

add_action('init', array('DMS', 'run'), 1, 1);
add_action('admin_init', array('DMS', 'adminInit'));
add_action('admin_menu', array('DMS', 'addOptionsMenu'));
add_action('admin_enqueue_scripts', array('DMS', 'registerScripts'));
register_deactivation_hook(__FILE__, array('DMS', 'deactivate'));

