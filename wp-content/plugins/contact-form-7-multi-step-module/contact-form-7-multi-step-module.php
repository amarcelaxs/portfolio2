<?php
/*
Plugin Name: Contact Form 7 Multi-Step Forms
Plugin URI: http://www.mymonkeydo.com/contact-form-7-multi-step-module/
Description: Enables the Contact Form 7 plugin to create multi-page, multi-step forms.
Author: Webhead LLC.
Author URI: http://webheadcoder.com 
Version: 1.6
*/
/*  Copyright 2012 Webhead LLC (email: info at webheadcoder.com)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define( 'CF7MSM_VERSION', '1.6' );
define( 'CF7MSM_FREE_TEXT_PREFIX_RADIO', '_wpcf7_radio_free_text_' );
define( 'CF7MSM_FREE_TEXT_PREFIX_CHECKBOX', '_wpcf7_checkbox_free_text_' );

/**
 * Load modules after plugins loaded to check for hidden module.
 */
function cf7msm_load_modules() {
    $active_plugins = get_option( 'active_plugins', array() );
    if (!in_array('contact-form-7-modules/hidden.php', $active_plugins) && !in_array('contact-form-7-3rd-party-integration/hidden.php', $active_plugins)) {
        //hack to let contact-form-7-modules be activated.
        //next time require it to be activated instead of copying it in!
        if (!is_admin() ||  !isset($_GET['action']) || $_GET['action'] != 'activate' ) {
            require_once(plugin_dir_path(__FILE__) . 'module-hidden.php');   
        }
    }
    require_once(plugin_dir_path(__FILE__) . 'module-session.php');
    require_once(plugin_dir_path(__FILE__) . 'module-back.php');
}
add_action('plugins_loaded', 'cf7msm_load_modules', 2);

/**
 * init_sessions()
 *
 * @uses session_id()
 * @uses session_start()
 */
function cf7msm_init_sessions() {
	//try to set cookie
	if ( empty( $_COOKIE['cf7msm_check'] ) ) {
		$force_session = apply_filters('cf7msm_force_session', false);
		if ( !$force_session ) {
			setcookie('cf7msm_check', 1, 0, COOKIEPATH, COOKIE_DOMAIN);		
		}

	    if (!session_id()) {
	        session_start();
	    }
	}
}
add_action('init', 'cf7msm_init_sessions'); 

 
/**
 * Add scripts to be able to go back to a previous step.
 */
function cf7msm_scripts() {
	$step = cf7msm_get('step');
    wp_enqueue_script('cf7msm',
        plugins_url('/resources/cf7msm.js', __FILE__),
        array('jquery'),
        CF7MSM_VERSION,
        true );
    wp_enqueue_style('cf7msm_styles',
        plugins_url('/resources/cf7msm.css', __FILE__),
        array(),
        CF7MSM_VERSION
        );

    //this makes the script useful even when cookies aren't used.    
    $cf7msm_posted_data = cf7msm_get('cf7msm_posted_data');
    $cf7msm_posted_data['cf7msm_prev_urls'] = cf7msm_get('cf7msm_prev_urls');
    wp_localize_script( 'cf7msm', 'cf7msm_posted_data', $cf7msm_posted_data);
}
add_action('wp_enqueue_scripts', 'cf7msm_scripts');

/**
 *  Saves a variable to cookies or if not enabled, to session.
 */
function cf7msm_set($var_name, $var_value) {
	if ( empty( $_COOKIE['cf7msm_check'] ) ) {
		$_SESSION[$var_name] = $var_value;
	}
	else {
		setcookie($var_name, json_encode( $var_value ), 0, COOKIEPATH, COOKIE_DOMAIN);
	}
}

/**
 *  Get a variable from cookies or if not enabled, from session.
 */
function cf7msm_get($var_name, $default = '') {
	$ret = $default;
	if ( empty( $_COOKIE['cf7msm_check'] ) ) {
		$ret = isset( $_SESSION[$var_name] ) ? $_SESSION[$var_name] : $default;
	}
	else {
		$ret = isset( $_COOKIE[$var_name] ) ? $_COOKIE[$var_name] : $default;
		if (get_magic_quotes_gpc() || function_exists('wp_magic_quotes')) {
			$ret = stripslashes($ret);
		}
		$ret = json_decode( $ret, true );
	}
	return $ret;
}

/**
 * Remove a saved variable.
 */
function cf7msm_remove($var_name) {
	$ret = '';
	if ( empty( $_COOKIE['cf7msm_check'] ) ) {
		if ( isset( $_SESSION[$var_name] ) ) {
			unset( $_SESSION[$var_name] );
		}
	}
	else {
		if ( isset( $_COOKIE[$var_name] ) ) {
			setcookie($var_name, '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
		}
	}
}


/**
 * Hide the second step of a form.  looks at hidden field 'step'.
 * Always show if the form is the first step.
 * If it's not the first step, make sure it's the next form in the steps.
 */
function cf7msm_step_2($cf7) {
    $has_wpcf7_class = class_exists( 'WPCF7_ContactForm' ) && method_exists($cf7, 'prop');
    if ( $has_wpcf7_class ) {
        $formstring = $cf7->prop('form');
    }
    else {
        $formstring = $cf7->form;
    }
    //check if form has a step field
    if (!is_admin() && preg_match('/\[hidden step "(\d+)-(\d+)"\]/', $formstring, $matches)) {
    	$step = cf7msm_get('step');
        if ( !isset($matches[1]) 
        	|| ($matches[1] != 1 && empty($step) )
        	|| ($matches[1] != 1 && ((int) $step) + 1 < $matches[1]) ) {
            if ( $has_wpcf7_class ) {
                $cf7->set_properties( array( 
                    'form' => apply_filters('wh_hide_cf7_step_message', "Please fill out the form on the previous page")
                ) );
            }
            else {
                $cf7->form = apply_filters('wh_hide_cf7_step_message', "Please fill out the form on the previous page");
            }
        }
        if (count($matches) == 3 && $matches[1] != $matches[2]) {
			add_filter('wpcf7_ajax_json_echo', 'cf7msm_clear_success_message', 10, 2);
        }
    }
    return $cf7;
}
add_action('wpcf7_contact_form', 'cf7msm_step_2');

/**
 * Handle a multi-step cf7 form for cf7 3.9+
 */
function cf7msm_store_data_steps_filter( $cf7_posted_data ) {
    if (isset($cf7_posted_data['step'])) {
        if (preg_match('/(\d+)-(\d+)/', $cf7_posted_data['step'], $matches)) {
            $curr_step = $matches[1];
            $last_step = $matches[2];
        }

        //for back button
        $prev_urls = cf7msm_get('cf7msm_prev_urls');
        if ( empty($prev_urls) ) {
            $prev_urls = array();
        }
        //example: 
        // on step 1,
        //    prev url {"2-3":"page-2"} will be set.
        //    back button is pressed, key "1-3" is looked up and returns undefined
        // on step 2,
        //    prev url {"3-3":"page-2"} will be set.
        //    back button is pressed, key "2-3" is looked up and returns "page-1"
        // on step 3,
        //    prev url {"4-3":"page-3"} will be set. - not used
        //    back button is pressed, key "3-3" is looked up and returns "page-2"
        // step 
        $prev_urls[ ($curr_step+1) . '-' . $last_step] = cf7msm_current_url();
        cf7msm_set('cf7msm_prev_urls', $prev_urls);

        $prev_data = cf7msm_get('cf7msm_posted_data', '' );
        if (!is_array($prev_data)) {
            $prev_data = array();
        }
        //remove empty [form] tags from posted_data so $prev_data can be stored.
        $fes = wpcf7_scan_shortcode();
        foreach ( $fes as $fe ) {
            if ( empty( $fe['name'] ) || $fe['type'] != 'form' )
                continue;
            unset($cf7_posted_data[$fe['name']]);
        }
        $free_text_keys = array();
        foreach ( $prev_data as $key => $value ) {
            if ( strpos( $key, CF7MSM_FREE_TEXT_PREFIX_RADIO ) === 0 ) {
                $free_text_keys[$key] = str_replace(CF7MSM_FREE_TEXT_PREFIX_RADIO, '', $key);
            } 
            else if ( strpos( $key, CF7MSM_FREE_TEXT_PREFIX_CHECKBOX ) === 0 ) {
                $free_text_keys[$key] = str_replace( CF7MSM_FREE_TEXT_PREFIX_CHECKBOX, '', $key );
            }
        }
        //if original key is set and not free text, remove free text to reflect posted data.
        foreach( $free_text_keys as $free_text_key => $original_key ) {
            if ( isset( $cf7_posted_data[$original_key] ) && !isset( $cf7_posted_data[$free_text_key] ) ) {
                unset( $prev_data[$free_text_key] );
            }
        }
        if ($curr_step != $last_step) {
            $wpcf7 = WPCF7_ContactForm::get_current();
            $wpcf7->skip_mail = true;
            cf7msm_set('step', $curr_step);
            $posted_data = array_merge($prev_data, $cf7_posted_data);
            cf7msm_set('cf7msm_posted_data', $posted_data );
        }
        else {
            $cf7_posted_data = array_merge($prev_data, $cf7_posted_data);
        }
    }
    return $cf7_posted_data;
}
add_filter( 'wpcf7_posted_data', 'cf7msm_store_data_steps_filter', 9 );

/**
 * Clean things up after mail has been sent.
 */
function cf7msm_mail_sent() {
    if ( isset( $_POST['step'])) {
        $step = $_POST['step'];
        if (preg_match('/(\d+)-(\d+)/', $step, $matches)) {
            $curr_step = $matches[1];
            $last_step = $matches[2];
        }
        if ( $curr_step == $last_step ) {
            cf7msm_remove('step');
            cf7msm_remove('cf7msm_posted_data');
        }
        else {
            // redirect
            // for now only redirect when ajax is disabled.
            if ( !wpcf7_load_js() ) {
                $wpcf7 = WPCF7_ContactForm::get_current();
                $subject = $wpcf7->prop('additional_settings');
                $pattern = '/location\.replace\(\'([^\']*)\'\);/';
                preg_match( $pattern, $subject, $matches );
                if ( count( $matches ) == 2 ) {
                    wp_redirect( esc_url( $matches[1] ) );
                    exit;
                }
            }
        }
    }
}
add_action( 'wpcf7_mail_sent', 'cf7msm_mail_sent' );


/**
 * Handle a multi-step cf7 form for cf7 < 3.9
 */
/*
function cf7msm_store_data_steps(&$cf7) {
    if (isset($cf7->posted_data['step'])) {
        if (preg_match('/(\d+)-(\d+)/', $cf7->posted_data['step'], $matches)) {
            $curr_step = $matches[1];
            $last_step = $matches[2];
        }

        //for back button
        $prev_urls = cf7msm_get('cf7msm_prev_urls');
        if ( empty($prev_urls) ) {
            $prev_urls = array();
        }
        //example: 
        // on step 1,
        //    prev url {"2-3":"page-2"} will be set.
        //    back button is pressed, key "1-3" is looked up and returns undefined
        // on step 2,
        //    prev url {"3-3":"page-2"} will be set.
        //    back button is pressed, key "2-3" is looked up and returns "page-1"
        // on step 3,
        //    prev url {"4-3":"page-3"} will be set. - not used
        //    back button is pressed, key "3-3" is looked up and returns "page-2"
        // step 
        $prev_urls[ ($curr_step+1) . '-' . $last_step] = cf7msm_current_url();
        cf7msm_set('cf7msm_prev_urls', $prev_urls);

		$prev_data = cf7msm_get('cf7msm_posted_data', '' );
		if (!is_array($prev_data)) {
			$prev_data = array();
		}
		//remove empty [form] tags from posted_data so $prev_data can be stored.
		$fes = wpcf7_scan_shortcode();
		foreach ( $fes as $fe ) {
			if ( empty( $fe['name'] ) || $fe['type'] != 'form' )
				continue;
			unset($cf7->posted_data[$fe['name']]);
		}
		if ($curr_step != $last_step) {
			$cf7->skip_mail = true;
			cf7msm_set('step', $curr_step);
			$posted_data = array_merge($prev_data, $cf7->posted_data);
			cf7msm_set('cf7msm_posted_data', $posted_data );
		}
		else {
			$cf7->posted_data = array_merge($prev_data, $cf7->posted_data);
			cf7msm_remove('step');
			cf7msm_remove('cf7msm_posted_data');
		}
	}
}
*/

/**
 * Hide success message if form is redirecting to another page.
 */
function cf7msm_clear_success_message($items, $result) {
    remove_filter('wpcf7_ajax_json_echo', 'cf7msm_clear_success_message');
    if ($items['mailSent'] && isset($items['onSentOk']) && count($items['onSentOk']) > 0) {
        $items['onSentOk'][] = "$('" . $items['into'] . "').find('div.wpcf7-response-output').css('opacity',0);";
    }
    return $items;
}

/**
 * return the full url.
 */
function cf7msm_current_url() {
    $page_url = 'http';
    if ($_SERVER["HTTPS"] == "on") {
    	$page_url .= "s";
    }
    $page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $page_url;
}

/************************************************************************************************************
 * Contact Form 7 has a nice success message after submitting its forms, but on a multi-step form,
 * this can cause confusion if it shows and the page immediately leaves to the next page.
 * The functions below hide the success messages on multi-step forms.
************************************************************************************************************/

/**
 * Hide form when done.
 */
function cf7msm_hide_multistep_form($items, $result) {
    remove_filter('wpcf7_ajax_json_echo', 'cf7msm_hide_multistep_form');
    if ($items['mailSent'] && !isset($items['onSentOk'])) {
        $items['onSentOk'] = array("$('" . $items['into'] . " form').children().not('div.wpcf7-response-output').hide();");
    }
    return $items;
}

/**
 * Add filter to clear form if this is a multistep form.
 */
function cf7msm_cf7_before_mail($cf7) {
	$step = cf7msm_get('step');
	if ( !empty( $step ) ) {
        add_filter('wpcf7_ajax_json_echo', 'cf7msm_hide_multistep_form', 10, 2);
    }
}
add_action( 'wpcf7_before_send_mail', 'cf7msm_cf7_before_mail', 8 );

