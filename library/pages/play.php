<!--
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <h3>Start a new match!</h3>
                <div id="currentMatches" class="list-group">

                    <div style="height: 41px">
                        <a href="ice_poseidon" class="list-group-item" style="width: 100%; float: left">
                            <span>Start a match against ice_poseidon</span>
                        </a>
                        <a href="cx_homie" class="list-group-item" style="width: 100%; float: left">
                            <span>Start a match against cx_homie</span>
                        </a>
                        <a href="dawg" class="list-group-item" style="width: 100%; float: left">
                            <span>Start a match against dawg</span>
                        </a>
                        <a href="dog" class="list-group-item" style="width: 100%; float: left">
                            <span>Start a match against dog</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <h3>Current matches:</h3>
                <div id="currentMatches" class="list-group">

                    <div style="height: 41px">
                        <a href="Sly" class="list-group-item" style="width: 100%; float: left">
                            <span>Match against Sly</span>
                            <span style="position: absolute; right: 10%">Score 13-2</span>
                        </a>
                        <a href="Sly/delete/" style="position: absolute; right: 5%; margin-top: 10px;">
                            <span class="glyphicon glyphicon-remove" style="font-size: 1.5em; color:black"></span>
                        </a>
                    </div>

                    <div style="height: 41px">
                        <a href="hakon" class="list-group-item" style="width: 100%; float: left">
                            <span>Match against hakon</span>
                            <span style="position: absolute; right: 10%">Score 3-11</span>
                        </a>
                        <a href="hakon/delete/" style="position: absolute; right: 5%; margin-top: 10px;">
                            <span class="glyphicon glyphicon-remove" style="font-size: 1.5em; color:black"></span>
                        </a>
                    </div>

                    <div style="height: 41px">
                        <a href="aksei" class="list-group-item" style="width: 100%; float: left">
                            <span>Match against aksei</span>
                            <span style="position: absolute; right: 10%">Score 4-4</span>
                        </a>
                        <a href="aksei/delete/" style="position: absolute; right: 5%; margin-top: 10px;">
                            <span class="glyphicon glyphicon-remove" style="font-size: 1.5em; color:black"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <?php include_once TEMPLATES_PATH . "/sidebar.php" ?>
            <?php include_once TEMPLATES_PATH . "/game_screen.php" ?>
            <div id="game_splash" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 text-center">
                <h1 class="page-header">Playing against <span class="opponent">{{}}</span></h1>
                <div class="row" id="question_stats">
                    <div class="col-sm-2 jumbotron wrong">Q1</div>
                    <div class="col-sm-2 jumbotron correct">Q2</div>
                    <div class="col-sm-2 jumbotron correct">Q3</div>
                    <div class="col-sm-2 jumbotron">Q4</div>
                    <div class="col-sm-2 jumbotron">Q5</div>
                    <div class="col-sm-2 jumbotron">Q6</div>
                </div>
                <div class="progress">
                    <div id="completeness" class="progress-bar progress-bar-striped active" role="progressbar" style="width: 50%">
                        3/6 Questions
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-danger btn-lg col-sm-2 col-sm-offset-2"><span class="fa fa-ban"></span> Forfeit match</button>
                    <button class="btn btn-success btn-lg col-sm-2 col-sm-offset-4">Next Question <span class="fa fa-forward"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>