<?php
session_start();
require_once dirname(realpath(__FILE__)) . "/../../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/../../library/config/configuration.php";
require_once LIBRARY_PATH . "/userManager.php";
require_once LIBRARY_PATH . "/jwtManager.php";
$conf = json_decode(file_get_contents(dirname(realpath(__FILE__)) . "/../../library/config/fb.json"), true);

$fb = new Facebook\Facebook($conf);

$helper = $fb->getRedirectLoginHelper();

try {
$accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
echo 'Graph returned an error: ' . $e->getMessage();
exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
echo 'Facebook SDK returned an error: ' . $e->getMessage();
exit;
}

if (! isset($accessToken)) {
if ($helper->getError()) {
header('HTTP/1.0 401 Unauthorized');
echo "Error: " . $helper->getError() . "\n";
echo "Error Code: " . $helper->getErrorCode() . "\n";
echo "Error Reason: " . $helper->getErrorReason() . "\n";
echo "Error Description: " . $helper->getErrorDescription() . "\n";
} else {
header('HTTP/1.0 400 Bad Request');
echo 'Bad request';
}
exit;
}

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId($conf["app_id"]); // Replace {app-id} with your app id

if ($user = get_user_id("FACEBOOK", $tokenMetadata->getUserId())) {
    $user=get_user_uuid($user);
    $jwt=createJWT($user);
    $_SESSION["nabbe-jwt"] = $jwt;
    header("Location: http://" . $_SERVER["HTTP_HOST"]);
} else {
    $_SESSION["service"] = "FACEBOOK";
    $_SESSION["user_id"] = $tokenMetadata->getUserId();
    //Redirect to sign in page
    header("Location: http://" . $_SERVER["HTTP_HOST"] . "/new_user.php");
}


// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
//$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
// Exchanges a short-lived access token for a long-lived one
try {
$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
} catch (Facebook\Exceptions\FacebookSDKException $e) {
echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
exit;
}
}