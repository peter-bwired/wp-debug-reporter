<?php
/*
 * Plugin Name: WP Debug Reporter
 * Plugin URI: https://github.com/peter-bwired/wp-debug-reporter
 * Description: Generate console like log for debugging in WordPress.
 * Author: Peter Weston, Bwired Technologies
 * Version: 0.0.1
 * License: GPLv3
 */

// Block execution before wordpress is loaded.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once(dirname(__FILE__).'/admin-page/dashboard.php');
?>
