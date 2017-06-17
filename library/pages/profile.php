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
                    <div class="list-group-item list-group-item-success text-center">
                        <div class="row">
                            <div class="col-sm-9">You defeated <a href="http://nabbe.gabeorama.org/profile/sly">sly</a> with a score of 16-2</div>
                            <small class="col-sm-3">Just now</small>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-danger text-center">
                        <div class="row">
                            <div class="col-sm-9">You lost against <a href="http://nabbe.gabeorama.org/profile/sly">sly</a> with a score of 13-16</div>
                            <small class="text-muted p-2 col-sm-3">3 minutes ago</small>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-warning text-center">
                        <div class="row">
                            <div class="col-sm-9">You tied against <a href="http://nabbe.gabeorama.org/profile/sly">sly</a> with a score of 16-16</div>
                            <small class="col-sm-3">A week ago</small>
                        </div>

                    </div>
                </div>
                <div class="text-center">
                    <ul class="pagination" id="match-history-pagination">
                        <li class="disabled" id="match-history-prev"><a href="#"><span class="fa fa-arrow-left"></span> Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" id="match-history-next">Next <span class="fa fa-arrow-right"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <h3> Account Settings </h3>
                <div id="divSettingsBoxes">
                    <!-- Probably have to change new_user with change_user.php -->
                    <form action="http://<?=$_SERVER["HTTP_HOST"]?>/api/profile.php?change=username" method="POST" id="nameChangeForm" class="form-horizontal">
                        <label class="control-label col-sm-2">Change display name:</label>
                        <div class="input-group col-sm-10">
                            <input type="text" maxlength="16" minlength="1" pattern="^[_A-z0-9]{1,16}" data-remote="/api/users.php" class="form-control" name="username" placeholder="New Username" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="help-block with-errors col-sm-offset-2">Please pick a alphanumeric username (1-16 chars)</div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="button" class="btn btn-success">Change Username</button>
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