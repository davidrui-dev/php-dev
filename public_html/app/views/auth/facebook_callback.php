<?php
require_once 'vendor/facebook/graph-sdk/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => APP_ID,
    'app_secret' => APP_SECRET,
    'default_graph_version' => 'v13.0', // Use the latest version
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
    $response = $fb->get('/me?fields=id,name,email', $accessToken);
    $userData = $response->getGraphUser();

    // Save user data to the database.
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
    // $userData->getId(), $userData->getName(), $userData->getEmail()
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    // Handle Facebook API errors
    echo 'Graph returned an error: ' . $e->getMessage();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    // Handle SDK errors
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
?>
