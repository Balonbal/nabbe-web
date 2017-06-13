<?php
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>,

<div id="content">
    <div class="container">
        <div class="row">
        <div class="col-sm-6 col-xs-12">
            <p>
                <?php if (isset($_SESSION["nabbe-jwt"])): ?>
                    <h3>
                        Stats for <span id="oldUsername"><?=decode_JWT(json_decode($_SESSION["nabbe-jwt"])->jwt)->sub;?></span>
                    </h3>
                <?php else: ?>
                You are not logged in
                <?php endif ?>
            </p>
            <p>You have in total x wins and y defeats</p>
            <p>That is a x/y * 100 % winrate!</p>
            <p>Previous 10 matches:</p>
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">
                    You defeated <a href="http://nabbe.gabeorama.org/profile/sly">sly</a> with a score of 16-2
                </li>
                <li class="list-group-item list-group-item-danger">
                    You lost against <a href="http://nabbe.gabeorama.org/profile/sly">sly</a> with a score of 13-16
                </li>
                <li class="list-group-item list-group-item-warning">
                    You tied against <a href="http://nabbe.gabeorama.org/profile/sly">sly</a> with a score of 16-16
                </li>
            </ul>
            </div>
            <div class="col-sm-6 col-xs-12">
                <h3> Account Settings </h3>
                <div id="divSettingsBoxes">
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">@</span>
                        <input type="text" class="form-control" placeholder="New Username" aria-describedby="sizing-addon2" id="inputUsername">
                    </div>
                    <button type="button" class="btn btn-default" id="btnChangeUN">Change Username</button>
                </div>

                <div id="divSettingsBoxes">
                    <button type="button" class="btn btn-danger" id="btnDelete">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="profile.js"></script>
<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>