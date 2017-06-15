<?php
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>

<div id="content">
    <div class="container"> 
        <div class="row">
            <!-- Search bar and results -->
            <div class="col-sm-6 col-xs-12">
                <h3>Search new friends</h3>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

            <!-- Current Friends -->
            <div class="col-sm-6 col-xs-12">
            <h3>Friend list</h3>
                <div class="panel panel-default">
                    <ul class="list-group">
                        <li class="list-group-item">Sly
                        <a href="nabbe.gabeorama.org/sly/delete/"><span class="glyphicon glyphicon-trash" style="float: right"></span></a>
                        </li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>

<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>