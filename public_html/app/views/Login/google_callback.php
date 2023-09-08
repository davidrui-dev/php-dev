<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri('http://localhost:8000/Login/facebook_callback.php');
$client->addScope('email'); // Requested scope

$authCode = $_GET['code'];

try {
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);

    $service = new Google_Service_Oauth2($client);
    $userData = $service->userinfo->get();

    // Save user data to the database.
    // $userData->getId(), $userData->getName(), $userData->getEmail()

    // Redirect to your app's home page.
    header('Location: /');
} catch (Exception $e) {
    // Handle errors
    echo 'Error: ' . $e->getMessage();
}
?>
