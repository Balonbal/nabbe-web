<form action="http://<?=$_SERVER["HTTP_HOST"]?>/new_user/" method="POST" id="newUserForm" class="form-horizontal">
    <h2>Welcome to Nabbe</h2>
    <p class="well">Give us some info pls</p>
    <div class="form-group has-feedback">
        <label class="control-label col-sm-2" for="username">Username:</label>
        <div class="col-sm-10 input-group">
            <input type="text" maxlength="16" minlength="1" pattern="^[_A-z0-9]{1,16}" data-remote="/api/users/both" class="form-control" name="username" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="help-block with-errors col-sm-offset-2">Please pick a alphanumeric username (1-16 chars)</div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label><input type="checkbox" name="tos" data-error="Please read and agree" required>You have read and agreed to our <a href="tos">Terms of service</a> and <a href="pp">Privacy policy</a></label>
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Create account</button>
        </div>
    </div>
</form>