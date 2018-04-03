<?php
/**
 * Created by PhpStorm.
 * User: msen
 * Date: 3/10/16
 * Time: 11:55 AM
 */


global $apiConfig;
$apiConfig = array(
    'oauth2_client_id' => '',//assign your own office 365 app client id
    'oauth2_secret' => '',  // Generate key from Azure Management Portal
    'oauth2_redirect' => 'http://website.com/office365client/oauth2.php',   //example url
    'state' => '45d12e60b-8457-4d99-b20f-cfb612d1a138',  //any unquiue key to Check against CSRF attack
    'resource' => 'https://outlook.office365.com',
    'oauth2_auth_url' => 'https://login.windows.net/common/oauth2/authorize',
    'oauth2_token_url' => 'https://login.windows.net/common/oauth2/token',
);

?>