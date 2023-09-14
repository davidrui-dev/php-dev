<?php
require 'vendor/autoload.php'; // Include the Google PHP SDK
use League\OAuth2\Client\Provider\Facebook;

$fb = new Facebook([
    'app_id' => APP_ID,
    'app_secret' => APP_SECRET,
    'redirectUri'  => FACEBOOK_REDIRECT_URI,
    'graphApiVersion' => 'v12.0', // Specify the desired API version
]);

try {

    // After getting the access token
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Use the token to fetch user data
    $userData = $provider->getResourceOwner($token);

    // Save user data to the database.
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
            "provider"     => 'facebook',
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
            "provider"     => 'facebook',
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
    // $userData->getId(), $userData->getName(), $userData->getEmail()
}  catch (Exception $e) {
    // Handle SDK errors
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
?>
