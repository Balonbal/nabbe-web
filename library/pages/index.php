<div id="content">
    <?php
    if (isset($_SESSION["nabbe-jwt"])):?>
        ohai there <?=$_SESSION["nabbe-jwt"]?>
    <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?php include_once TEMPLATES_PATH . "/socialButtons.php" ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>