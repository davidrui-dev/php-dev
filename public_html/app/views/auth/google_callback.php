<?php
require 'vendor/autoload.php';
use League\OAuth2\Client\Provider\Google;

$provider = new Google([
    'clientId'     => CLIENT_ID,
    'clientSecret' => CLIENT_SECRET,
    'redirectUri'  => REDIRECT_URI,
]);

try {
    // After getting the access token
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Use the token to fetch user data
    $userData = $provider->getResourceOwner($token);

    # Check if user exists in the database
    $common = new Common();
    $email = $userData->getEmail();
    $emailcheck = $common->FindByEmail(trim($email));
    if($emailcheck)
    {
        # update of db
        $fields=[
            "fname"        => $userData->getName(),
            "email"        => $userData->getEmail(),
            "utype"        => 'User',
            "status"       => 1,
            "provider"     => 'google',
            "provider_id"  => $userData->getId(),
            "access_token" => $token->getToken(),
            "time"         => date('Y-m-d H:i:s')
        ];
        $lastid = $common->CP_Update('users',$emailcheck->id,$fields);
        // Redirect to your app's home page.
        $_SESSION['master_id']=$emailcheck->id;
        Router::Redirect('dashboard?success');
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
            "access_token" => $token->getToken(),
            "time"         => date('Y-m-d H:i:s')
        ];
        $lastid = $common->CP_Insert('users',$fields);
        // Redirect to your app's home page.
        $_SESSION['master_id']=$lastid;
        Router::Redirect('dashboard?success');
        exit();

    }
} catch (Exception $e) {
    // Handle errors
    echo 'Error: ' . $e->getMessage();
}
