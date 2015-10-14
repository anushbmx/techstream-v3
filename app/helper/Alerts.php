<?php
/**
 * Alert Functions 
 * 
 * Used to pop out alert messages after action. Works basd on session.
 * Once alerted the session is distroyed.
 *
 * Wraps functions to throw Alert for alerting user.
 *
 * To initiat this alet use Session with name Alert
 * eg :  Session::flash( 'alert', 'success | error | info , <your message>' );
 *
 * @since 1.0.0
 * @package techstream v3
 */
class Alerts
{
	/**
	 * Alert Activate function
	 * 
	 * Triggers the alert box if a session is set on alert
	 */
	public static function activate () {

		if ( Session::exists('alert') ) {
			$alertRawData = session::flash('alert');
			$alertData = explode(',', $alertRawData);

			if ( count($alertData) === 3 ) {
				$data['eventType']		= $alertData[0];
				$data['alertTitle']		= $alertData[1];
				$data['alertMessage']	= $alertData[2];

				require_once APPPATH . 'views/alerts/alertMain.html.php';
			}
		}
	}
}
