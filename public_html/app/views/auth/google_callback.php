<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->addScope(['openid','email']); // Requested scope

$authCode = $_GET['code'];

try {
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);

    $service = new Google_Service_Oauth2($client);
    $userData = $service->userinfo->get();

    # Check if user exists in the database

    # object of db
    $fields=[
        "fname"        => $userData->getName(),
        "email"        => $userData->getEmail(),
        "utype"        => 'User',
        "status"       => 1,
        "provider"     => 'google',
        "provider_id"  => $userData->getId(),
        "access_token" => !empty($accessToken) ? $accessToken : null,
        "time"         =>date('Y-m-d H:i:s')
    ];

    $lastid = $this->CommonModel->CP_Insert('users',$fields);
    echo '<pre>';
    var_dump($accessToken);
    var_dump($userData);
    var_dump($userData->getId(), $userData->getName(), $userData->getEmail());
    echo '</pre>';
    die();

    // Save user data to the database.
    // $userData->getId(), $userData->getName(), $userData->getEmail()

    // Redirect to your app's home page.
    header('Location: /');
} catch (Exception $e) {
    // Handle errors
    echo 'Error: ' . $e->getMessage();
}
?>
