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