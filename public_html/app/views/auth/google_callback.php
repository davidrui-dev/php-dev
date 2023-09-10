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
//    echo '<pre>';
//    var_dump($accessToken);
//    echo '</pre>';
//    exit();
    $client->setAccessToken($accessToken);

    $service = new Google_Service_Oauth2($client);
    $userData = $service->userinfo->get();

    # Check if user exists in the database
    $common = new Common();
    $email = $userData->getEmail();
    $emailcheck = $common->FindByEmail(trim($email));
    if($emailcheck)
    {
        // Redirect to your app's home page.
        header('Location:'.PROOT.'dashboard');
        exit();
    }else{
        # object of db
        $fields=[
            "fname"        => $userData->getName(),
            "email"        => $userData->getEmail(),
            "utype"        => 'User',
            "status"       => 1,
            "provider"     => 'google',
            "provider_id"  => $userData->getId(),
            "access_token" => !empty($accessToken) ? $accessToken["access_token"] : null,
            "time"         => date('Y-m-d H:i:s')
        ];
        $lastid = $common->CP_Insert('users',$fields);
        // Redirect to your app's home page.
        header('Location:'.PROOT.'dashboard');
        exit();

    }
} catch (Exception $e) {
    // Handle errors
    echo 'Error: ' . $e->getMessage();
}
?>