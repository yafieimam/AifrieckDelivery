<?php
// session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '1013919506525-crnftnj9mjk7u914lbpcf5p62p8rab76.apps.googleusercontent.com';
$clientSecret = 'BZYZH_F4AcF9hCJNhNMu_2bR';
$redirectURL = 'http://localhost/aifrieckdelivery/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Aifrieck Delivery');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>