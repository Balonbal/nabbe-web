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
                    <ul class="list-group" id="currentFriendList">
                        
                    </ul>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>
<script src="getAndDeleteCurFriends.js"></script>
<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>