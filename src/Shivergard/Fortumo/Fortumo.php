<?php namespace Shivergard\Fortumo;

class Fortumo{

	public function get(){
		  //set true if you want to use script for billing reports
		  //first you need to enable them in your account
		  $billing_reports_enabled = false;

		  // check that the request comes from Fortumo server
		  if(!in_array($_SERVER['REMOTE_ADDR'],array('81.20.151.38', '81.20.148.122', '79.125.125.1', '209.20.83.207'))) {
		    header("HTTP/1.0 403 Forbidden");
		    die("Error: Unknown IP");
		  }

		  // check the signature
		  $secret = ''; // insert your secret between ''
		  if(empty($secret) || !check_signature($_GET, $secret)) {
		    header("HTTP/1.0 404 Not Found");
		    die("Error: Invalid signature");
		  }

		  $sender = $_GET['sender'];
		  $message = $_GET['message'];
		  $message_id = $_GET['message_id'];//unique id
		  //hint:use message_id to log your messages
		  //additional parameters: country, price, currency, operator, keyword, shortcode 
		  // do something with $sender and $message
		  $reply = "Thank you $sender for sending $message";

		  // print out the reply
		  echo($reply);

		 //customize this according to your needs
		  if($billing_reports_enabled 
		    && preg_match("/Failed/i", $_GET['status']) 
		    && preg_match("/MT/i", $_GET['billing_type'])) {
		   // find message by $_GET['message_id'] and suspend it
		  }

	}

}