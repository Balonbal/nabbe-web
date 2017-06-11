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

if (!isset($_SESSION["service"]) || !isset($_SESSION["user_id"])):?>

<?php else: ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js'></script>
    <script type="text/javascript" src="http://<?=$_SERVER["HTTP_HOST"]?>/js/new_user.js"></script>
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form action="new_user.php" method="POST" id="newUserForm" class="form-horizontal">
                        <h2>Welcome to Nabbe</h2>
                        <p class="well">Give us some info pls</p>
                        <div class="form-group has-feedback">
                            <label class="control-label col-sm-2" for="username">Username:</label>
                            <div class="col-sm-10 input-group">
                                <input type="text" maxlength="16" minlength="1" pattern="^[_A-z0-9]{1,16}" data-remote="/api/users.php" class="form-control" name="username" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="help-block with-errors col-sm-offset-2">Please pick a alphanumeric username (1-16 chars)</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="tos" data-error="Please read and agree" required>You have read and agreed to our <a href="tos">Terms of service</a> and <a href="pp">Privacy policy</a></label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Create account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif;
include_once TEMPLATES_PATH . "/footer.php"
?>