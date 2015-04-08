<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


	global $user;
	echo "<pre>";
		if(user_is_logged_in()){
			$output = t('Utilisateur connecté');
		}
		else {
			$output = t('Utilisateur anonyme');
		}
		echo($output);
	echo "</pre>";


menu_execute_active_handler();

