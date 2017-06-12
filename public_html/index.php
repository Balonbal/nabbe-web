<?php
session_start();
include_once realpath(dirname(__FILE__)) . "/../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
if (isset($_SESSION["nabbe-jwt"])):?>
<script type="text/javascript">
    var store = store || {};

    //You can now make authorized requests in pure js, nice :)
    store.JWT = <?=$_SESSION["nabbe-jwt"]?>;
    $.ajaxSetup({
        headers: {"Authorization": "Bearer " + store.JWT.jwt}
    });
</script>
<?php endif; ?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>
<div id="content">
    <?php if (isset($_SESSION["nabbe-jwt"])):?>
        ohai there <?=$_SESSION["nabbe-jwt"]?>
    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 social-buttons">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Please log in to continue
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-large btn-block btn-social btn-facebook" href="<?php include_once LIBRARY_PATH . "/fb-login.php"; ?>">
                            <span class="fa fa-facebook"></span>Continue with Facebook
                        </a>
                        <a class="btn btn-large btn-block btn-social btn-google" href="<?php include_once LIBRARY_PATH . "/google-login.php"; ?>">
                            <span class="fa fa-google"></span>Contiue with Google
                        </a>
                    </div>
                </div>
                <div class="alert alert-info">
                    <strong>Note:</strong> We only use this for authentication, no user data is stored.
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
</div>
<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>