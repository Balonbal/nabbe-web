<div id="content">
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION["nabbe-jwt"])): ?>
            <div class="col-sm-6 col-xs-12 text-center">
                <h1>Stats for <span id="oldUsername" class="username"></span></h1>
                <p>You have in total <strong id="wins" class="text-success text">100000</strong> wins and <strong id="losses" class="text-danger">0</strong> defeats</p>
                <p>That is a <strong id="winrate" class="text-info">\infinity</strong>% winrate!</p>
                <h3>Match History</h3>
                <div class="list-group" id="match-history">
                </div>
                <div class="text-center">
                    <ul class="pagination" id="match-history-pagination">
                        <li class="disabled" id="match-history-prev"><a href="#"><span class="fa fa-arrow-left"></span> Prev</a></li>
                        <li class="disabled" id="match-history-next"><a href="#">Next <span class="fa fa-arrow-right"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <h3> Account Settings </h3>
                <div id="divSettingsBoxes">
                    <!-- Probably have to change new_user with change_user.php -->
                    <form action="http://<?=$_SERVER["HTTP_HOST"]?>/api/profile/edit" method="POST" id="nameChangeForm" class="form-horizontal">
                        <div class="form-group has-feedback">
                            <label class="control-label col-sm-4">Change display name:</label>
                            <div class="input-group col-sm-8">
                                <input id="username-field" type="text" maxlength="16" minlength="1" data-not-equals="username" pattern="^[_A-z0-9]{1,16}" data-remote="/api/users/valid" class="form-control" name="username" placeholder="New Username" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="help-block with-errors col-sm-offset-4">Please pick a alphanumeric username (1-16 chars)</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="submit" class="btn btn-success">Change Username</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-offset-4 col-sm-10">
                        <button type="button" class="btn btn-danger" id="btnDelete">Delete Account</button>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-offset-3 col-md-6">
                <?php include_once TEMPLATES_PATH . "/socialButtons.php" ?>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>