<?php
/*
 * Plugin Name: Domain Mapping System
 * Plugin URI: http://www.robertvogt.ch/wp-dms
 * Description: This plugin allows you to map domains to single posts.
 * Version: 1.4
 * Author: Robert Vogt
 * Author URI: http://www.cheekyowl.com
 * License: GPL3
 * Text Domain: dms
 * Domain Path: /lang
 *
 *
 * Copyright 2012 - 2014 Robert Vogt (email: robert@cheekyowl.com)
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

namespace Deniaz\WordPress\Dms;

if (is_readable(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

add_action(
    'init',
    function () {
        $plugin = new Plugin(plugin_dir_path(__FILE__));
    },
    0
);


//register_activation_hook(__FILE__, function() {
//    (new Plugin)->activate();
//});
//
//register_deactivation_hook(__FILE__, function() {
//    (new Plugin)->deactivate();
//});
