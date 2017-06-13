<?php
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>

<div id="content">
    <div class="container"> 
        <div class="row">
            <h3 class="text-center">
                <strong>Nabbe.io</strong> is a game created by:<br>
            </h3>
            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Olav Bech Bråten</h3>
                    </div>
                        <div class="panel-body">
                        Our master
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Tinus Flagstad</h3>
                    </div>
                        <div class="panel-body">
                        our slave
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Aksel Slettemark</h3>
                    </div>
                        <div class="panel-body">
                        backend master
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Håkon Wardeberg</h3>
                    </div>
                        <div class="panel-body">
                        our krenger-kreiger
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>