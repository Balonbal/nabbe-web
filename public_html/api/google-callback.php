<?php
session_start();
require_once dirname(realpath(__FILE__)) . "/../../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/../../library/config/configuration.php";
require_once LIBRARY_PATH . "/userManager.php";
$redirectUri = "http://" . $_SERVER["HTTP_HOST"] . "/api/google-callback.php";

$client = new Google_Client();
$client->setAuthConfig("../../library/config/google.json");
$client->setRedirectUri($redirectUri);
$client->setScopes(["email"]);

if(isset($_REQUEST["logout"]))
    unset($_SESSION["id_token_token"]);
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
        <div class="data">
            <p>Here is the data from your Id Token:</p>
            <pre><?php var_export($token_data) ?></pre>
            <?php if ($user = get_user("GOOGLE", $token_data["sub"])):?>
            <h3>Nabbe data</h3>
            <p><?=$user?></p>
            <?php else: ?>
            <h3>No nabbe found</h3>
            <?php endif ?>
        </div>
    <?php endif ?>
</div>
