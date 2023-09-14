<?php
require 'vendor/autoload.php'; // Include the Google PHP SDK
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Provider\Facebook;

$provider = $_GET['provider'];

if ($provider === 'facebook') {
    // Facebook login.
    $fb = new Facebook([
        'app_id' => APP_ID,
        'app_secret' => APP_SECRET,
        'redirectUri'  => FACEBOOK_REDIRECT_URI,
        'graphApiVersion' => 'v12.0', // Specify the desired API version
    ]);

    if (!isset($_GET['code'])) {
        $authUrl = $fb->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $fb->getState();
        header('Location: ' . $authUrl);
        exit;
    } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
        exit('Invalid state');
    } else {
        $token = $fb->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
    
        // Use $token to access user data and perform login.
    }
    exit();
} elseif ($provider === 'google') {
    // Implement Google login logic here.
    $provider = new Google([
        'clientId'     => CLIENT_ID,
        'clientSecret' => CLIENT_SECRET,
        'redirectUri'  => REDIRECT_URI,
    ]);
   
    if (!isset($_GET['code'])) {
        $authUrl = $provider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $provider->getState();
        header('Location: ' . $authUrl);
        exit;
    } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
        exit('Invalid state');
    } else {
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
    
        // Use $token to access user data and perform login.
    }

    // $authUrl = $client->createAuthUrl();
    // header('Location:'.$authUrl);
    // exit();
}