<?php
include_once LIBRARY_PATH . "/jwtManager.php";
include_once LIBRARY_PATH . "/userManager.php";

if (isset($_SESSION["nabbe-jwt"])) {?>
    <div id="content" class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="alert alert-danger">
                    You are already logged in, maybe you wanted to <a href="http://<?=$_SERVER["HTTP_HOST"]?>/logout/" class="alert-link">Log out</a>?
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
?>
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
?>