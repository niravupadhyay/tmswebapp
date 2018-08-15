<?php
define('FRESHDESK_SHARED_SECRET','3a58be9ca934c8487c031163bfabbe7b');
define('FRESHDESK_BASE_URL','http://udave123.freshdesk.com/');	//With Trailing slashes

function getSSOUrl($strName, $strEmail) {
	$timestamp = time();
	$to_be_hashed = $strName . FRESHDESK_SHARED_SECRET . $strEmail . $timestamp;
	$hash = hash_hmac('md5', $to_be_hashed, FRESHDESK_SHARED_SECRET);
	return FRESHDESK_BASE_URL."login/sso/?name=".urlencode($strName)."&email=".urlencode($strEmail)."&timestamp=".$timestamp."&hash=".$hash;
}
header("Location: ".getSSOUrl("urvashi","urvashidave123@gmail.com"));