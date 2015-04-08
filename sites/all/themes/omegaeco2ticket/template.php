<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * omegaEco2ticket theme.
 */
/**
 * Registers overrides for various functions.
 * Surcharge du registre pour diverses fonctions.
 *
 * Dans l'exemple ci-dessous, on surcharge 3 fonctions utilisateurs
 */
function omegaeco2ticket_theme() {
  $items = array();
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'omegaeco2ticket') . '/templates',
    'template' => 'user-login',
    'preprocess functions' => array(
       'omegaeco2ticket_preprocess_user_login'
    ),
  );
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'omegaeco2ticket') . '/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'omegaeco2ticket_preprocess_user_register_form'
    ),
  );
  $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'omegaeco2ticket') . '/templates',
    'template' => 'user-pass',
    'preprocess functions' => array(
      'omegaeco2ticket_preprocess_user_pass'
    ),
  );
  return $items;
}

/**
 * Implémentation de trois fonctions de pré-traitement (pre-process functions
 */
function omegaeco2ticket_preprocess_user_login(&$vars) {
  $vars['intro_text'] = t('Identifiez-vous pour profiter de votre €co2ticket');
}
function omegaeco2ticket_preprocess_user_register_form(&$vars) {
  $vars['intro_text'] = t('Créer votre propre compte utilisateur');
}
function omegaeco2ticket_preprocess_user_pass(&$vars) {
  $vars['intro_text'] = t('Créer votre propre compte utilisateur');
}

