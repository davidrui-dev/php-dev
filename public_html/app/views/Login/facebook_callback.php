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
    print_r($accessToken);
    $response = $fb->get('/me?fields=id,name,email', $accessToken);
    $userData = $response->getGraphUser();

    // Save user data to the database.
    // $userData->getId(), $userData->getName(), $userData->getEmail()

    // Redirect to your app's home page.
    header('Location: http://yourwebsite.com/home.php');
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    // Handle Facebook API errors
    echo 'Graph returned an error: ' . $e->getMessage();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    // Handle SDK errors
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
?>
