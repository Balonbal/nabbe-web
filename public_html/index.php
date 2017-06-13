<?php
include_once realpath(dirname(__FILE__)) . "/../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4 social-buttons">
                <div class="panel panel-default">
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
            </div>
        </div>
    </div>
</div>
<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>