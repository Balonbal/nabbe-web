<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once realpath(dirname(__FILE__)) . "/../vendor/autoload.php";
include_once realpath(dirname(__FILE__)) . "/../library/config/configuration.php";
include_once LIBRARY_PATH . "/jwtManager.php";
include_once LIBRARY_PATH . "/userManager.php";

if (isset($_SESSION["nabbe-jwt"])) {
    include_once TEMPLATES_PATH . "/header.php";
    include_once TEMPLATES_PATH . "/navbar.php";?>
    <div id="content" class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="alert alert-danger">
                    You are already logged in, maybe you wanted to <a href="logout.php" class="alert-link">Log out</a>?
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once TEMPLATES_PATH . "/footer.php";
    die();
}

if (isset($_POST["username"]) &&
    isset($_POST["tos"]) &&
    isset($_SESSION["service"]) &&
    isset($_SESSION["user_id"]) &&
    username_available($_POST["username"]) &&
    valid_username($_POST["username"]) &&
    $_POST["tos"] == "on") {
    $username = createUser($_SESSION["service"], $_SESSION["user_id"], $_POST["username"]);
    unset($_SESSION["service"]);
    unset($_SESSION["user_id"]);
    $_SESSION["nabbe-jwt"] = createJWT($username);
    header("Location: http://" . $_SERVER["HTTP_HOST"]);
    die();
}

include_once TEMPLATES_PATH . "/header.php";
include_once TEMPLATES_PATH . "/navbar.php";
?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js'></script>
    <script type="text/javascript" src="http://<?=$_SERVER["HTTP_HOST"]?>/js/new_user.js"></script>
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?php
                    if (isset($_SESSION["service"]) && isset($_SESSION["user_id"])) {
                        //User needs to create an account
                        include_once TEMPLATES_PATH . "/newUserForm.php";
                    } else {
                        //Request login
                        include_once TEMPLATES_PATH . "/socialButtons.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
include_once TEMPLATES_PATH . "/footer.php"
?>