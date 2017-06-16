<?php
session_start();
require_once dirname(realpath(__FILE__)) . "/../../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/../../library/config/configuration.php";
require_once LIBRARY_PATH . "/userManager.php";
require_once LIBRARY_PATH . "/jwtManager.php";
$redirectUri = "http://" . $_SERVER["HTTP_HOST"] . "/api/google-callback.php";

$client = new Google_Client();
$client->setAuthConfig("../../library/config/google.json");
$client->setRedirectUri($redirectUri);
$client->setScopes(["email"]);

if(isset($_REQUEST["logout"]))
    unset($_SESSION["id_token_token"]);
    unset($_SESSION["nabbe-jwt"]);
if (isset($_GET["code"])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $client->setAccessToken($token);

    $_SESSION["id_token_token"] = $token;

    header("Location: " . filter_var($redirectUri));
}

if (
    !empty($_SESSION['id_token_token'])
    && isset($_SESSION['id_token_token']['id_token'])
) {
    $client->setAccessToken($_SESSION['id_token_token']);
} else {
    $authUrl = $client->createAuthUrl();
}

if ($client->getAccessToken()) {
    $token_data = $client->verifyIdToken();
}
?>

<div class="box">
    <?php if (isset($authUrl)): ?>
        <div class="request">
            <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
        </div>
    <?php else: ?>
        <?php if ($user = get_user_id("GOOGLE", $token_data["sub"])):
            $user=get_user_uuid($user);
            $jwt=createJWT($user);
            $_SESSION["nabbe-jwt"] = $jwt;
            header("Location: http://" . $_SERVER["HTTP_HOST"]);
        else:
            $_SESSION["service"] = "GOOGLE";
            $_SESSION["user_id"] = $token_data["sub"];
            //Redirect to sign in page
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/new_user.php");
        endif;
    endif ?>
</div>
