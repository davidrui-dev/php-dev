<?php

require_once 'vendor/facebook/graph-sdk/src/Facebook/autoload.php';
require 'vendor/autoload.php'; // Include the Google PHP SDK

$provider = $_GET['provider'];

if ($provider === 'facebook') {
    // Facebook login.
    $fb = new Facebook\Facebook([
        'app_id' => APP_ID,
        'app_secret' => APP_SECRET,
        'default_graph_version' => 'v13.0', // Use the latest version
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email']; // Requested permissions

    $loginUrl = $helper->getLoginUrl(PROOT .'Login/facebook_callback.php', $permissions); // Redirect URL after login
    header('Location:'.$loginUrl);
    exit();
} elseif ($provider === 'google') {
    // Implement Google login logic here.
    $client = new Google_Client();
    $client->setClientId(CLIENT_ID);
    $client->setClientSecret(CLIENT_SECRET);
    $client->setRedirectUri(REDIRECT_URI);
    $client->addScope('email'); // Requested scope

    $authUrl = $client->createAuthUrl();
    header('Location:'.$authUrl);
    exit();
}