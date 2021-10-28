<?php
/*
Plugin Name: BuddyPress Gruppen-E-Mail
Version: 1.0.9
Plugin URI: https://n3rds.work/piestingtal_source/buddypress-gruppen-e-mail-plugin/
Description: Dieses Plugin fügt BuddyPress eine Gruppen-E-Mail-Funktionalität hinzu, die es einem Gruppenadministrator oder Moderator ermöglicht, eine E-Mail an alle anderen Mitglieder in der Gruppe zu senden.
Author: WMS N@W
Author URI: https://n3rds.work/
Requires at least: 4.9
Network: true
Textdomain: groupemail
Domain Path: /languages

Copyright 2017-2021 WMS N@W (https://n3rds.work)
Author - DerN3rd
Contributors - 

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
require 'psource/psource-plugin-update/psource-plugin-updater.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://n3rds.work//wp-update-server/?action=get_metadata&slug=bp-group-email', 
	__FILE__, 
	'bp-group-email' 
);

$bp_group_email_current_version = '1.0.9';

/* Only load code that needs BuddyPress to run once BP is loaded and initialized. */
function bp_group_email_init() {
	if (class_exists('BP_Group_Extension'))
		require_once( dirname( __FILE__ ) . '/includes/bp-group-email.php' );
}
add_action( 'bp_init', 'bp_group_email_init' );

function bp_group_email_localization() {
  // Load up the localization file if we're using WordPress in a different language
	// Place it in this plugin's "languages" folder and name it "groupemail-[value in wp-config].mo"
	load_plugin_textdomain( 'groupemail', FALSE, '/bp-group-email/languages' );
}
add_action( 'plugins_loaded', 'bp_group_email_localization' );

