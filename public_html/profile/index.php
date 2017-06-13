<?php
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>

<div id="content">
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION["nabbe-jwt"])): ?>
                <p>
                    <div class="col-sm-6 col-xs-12">
                        <h3>
                            Stats for <span id="oldUsername"><?=decode_JWT(json_decode($_SESSION["nabbe-jwt"])->jwt)->sub;?></span>
                        </h3>
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
                        <!-- Probably have to change new_user with change_user.php -->
                        <form action="../new_user.php" method="POST" id="newUserForm" class="form-horizontal">
                        <div class="form-group has-feedback">
                                <input type="text" maxlength="16" minlength="1" pattern="^[_A-z0-9]{1,16}" data-remote="/api/users.php" class="form-control" name="username" placeholder="New Username" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors col-sm-offset-2">Please pick a alphanumeric username (1-16 chars)</div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="submit" class="btn btn-success">Change Username</button>
                            </div>
                        </div>

                    <div id="divSettingsBoxes">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="button" class="btn btn-danger" id="btnDelete">Delete Account</button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-offset-3 col-md-6">
                    <?php include_once TEMPLATES_PATH . "/socialButtons.php" ?>
            <?php endif ?>
        </div>
    </div>
</div>

<script src="profile.js"></script>
<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>