<?php
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>,

<div id="content">
    <div class="container"> 
        <p>
            <?php if (isset($_SESSION["nabbe-jwt"])): ?>
                Stats for <?=decode_JWT(json_decode($_SESSION["nabbe-jwt"])->jwt)->sub;?>
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
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">Change Password</button>
            <button type="button" class="btn btn-default">Change Username</button>
            <button type="button" class="btn btn-default">Delete Account</button>
        </div>
    </div>
</div>

<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>