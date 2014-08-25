<?php
/**
 * Plugin Name: BB: ExactTarget DEManager
 * Description: Adds missing pieces needed to use ExactTarget's DEManager service through the Web Collect API. Requires Gravity Forms and Forms: 3rd Party Integration
 * Version: 0.1
 * Author: Joseph Presley
 */

if (!class_exists('ExactTargetDEManager')) {
	class ExactTargetDEManager {
		
		const successFile = "exacttarget-success.php"; //
		const errorFile = "exacttarget-failure.php"; //url for thi sfile used to pass error url to ExactTarget
		const exactTargetSuccessParameter = 'exacttarget_success_url';
		const exactTargetFailureParameter = 'exacttarget_error_url';
		
		public function __construct() {
			
			//Filters to add custom parameters to dynamically populate fields in Gravity Forms
			//http://www.gravityhelp.com/documentation/page/Using_Dynamic_Population
			add_filter('gform_field_value_' . self::exactTargetSuccessParameter, array( 'ExactTargetDEManager', 'exacttarget_demanager_success_url'));
			add_filter('gform_field_value_' . self::exactTargetFailureParameter, array( 'ExactTargetDEManager', 'exacttarget_demanager_error_url'));

		}//end __construct
	
		public static function exacttarget_demanager_response_url($response) {

			$file = "";
			$response_url = "";
			
			if ($response = "success") {
				$file = self::successFile;
			} else if ($response = "failure") {
				$file = self::errorURL;
			}
			$response_url = plugins_url( $file , __FILE__);
			
			return $response_url;
		}
		
		public static function exacttarget_demanager_success_url($value) {
			$success_url = self::exacttarget_demanager_response_url('success');
			return $success_url;
		}
		
		public static function exacttarget_demanager_error_url($value) {
			$error_url = self::exacttarget_demanager_response_url('failure');
			return $error_url;
		}
		
	}//END class creation ExactTargetDEManager
	
}//END check if class_exists('ExactTargetDEManager')

if (class_exists('ExactTargetDEManager')){
	//relic of trying to use javascript to process ExactTarget's response via which url it sends back
	//left in case we need javascript processing in the future
	//add_action('gform_enqueue_scripts_1', array('ExactTargetDEManager', 'enqueue_exacttarget_demanager_script'));
	
	$exactTargetDEManager = new ExactTargetDEManager(); //instantiate class

}

