<?php
session_start();
include_once realpath(dirname(__FILE__)) . "/../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
//Avoid unexpected behaviour
unset($_SESSION["service"]);
unset($_SESSION["user_id"]);
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>
<div id="content">
    <?php if (isset($_SESSION["nabbe-jwt"])):?>
        ohai there <?=$_SESSION["nabbe-jwt"]?>
    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <?php include_once TEMPLATES_PATH . "/socialButtons.php" ?>
            </div>
        </div>
    </div>
    <?php endif ?>
</div>
<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>