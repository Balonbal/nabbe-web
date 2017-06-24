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
            <div class="col-sm-3 col-md-2 panel-group sidebar collapse in" id="sidebar">
                <!--
                <h4><a data-toggle="collapse" href="#sidebar">Navbar</a></h4>
                -->
                <div class="panel panel-default">
                    <button class="btn btn-success btn-block btn-lg" type="button">New Match</button>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#matches">Matches<span class="fa fa-chevron-right down"></span></a>
                        </h4>
                    </div>
                    <div id="matches" class="panel-collapse collapse in">
                        <div class="list-group">
                            <a href="#" class="list-group-item">Geir</a>
                            <a href="#" class="list-group-item">Tiniuses</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#game-requests"><span class="fa fa-chevron-right"></span> Game Requests</a>
                        </h4>
                    </div>
                    <div id="game-requests" class="panel-collapse collapse">
                        <div class="list-group">
                            <a href="#" class="list-group-item">Geir</a>
                            <a href="#" class="list-group-item">Tiniuses</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#game-rooms"><span class="fa fa-chevron-right"></span> Game Rooms</a>
                        </h4>
                    </div>
                    <div id="game-rooms" class="panel-collapse collapse">
                        <div class="list-group">
                            <a href="#" class="list-group-item">Geir</a>
                            <a href="#" class="list-group-item">Tiniuses</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-3 col-md-2 sidebar">
                <div class="panel">
                    <div class="panel-header" data-toggle="collapse" data-target="#h1">
                        Header 1
                    </div>
                    <div class="panel-body collapse" id="h1">
                        <ul class="nav nav-sidebar">
                            <li><a href="#">Reports</a></li>
                            <li><a href="#">Analytics</a></li>
                            <li><a href="#">Export</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Start a new match<span class="sr-only">(current)</span></a></li>

                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">Nav item</a></li>
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="">Another nav item</a></li>
                    <li><a href="">More navigation</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="">Another nav item</a></li>
                </ul>
            </div>-->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 text-center">
                <!-- TODO find a better place to put this
                <h1 class="page-header">Match against <span class="opponent">Geir</span> <small>Question <span class="question-number">1</span> of <span class="question-total">3</span></small></h1>
                -->
                <h1><span class="question-header">Which song contains these lyrics?</span></h1>
                <div class="jumbotron">
                    <p class="question-body"></p>
                </div>
                <div class="progress">
                    <div id="timebar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        30:00
                    </div>
                </div>
                <div class="flexify">
                    <div class="col-sm-5 jumbotron answer-box media">
                        <div class="media-left"><span class="fa fa-question media-object"></span></div>
                        <div class="media-body">
                            A: <span id="option-1" class="option-text">g</span>
                        </div>
                        <div class="media-right"><span class="fa fa-question media-object"></span></div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-5 jumbotron answer-box media">
                        <div class="media-left"><span class="fa fa-question media-object"></span></div>
                        <div class="media-body">
                            B: <span id="option-2" class="option-text"></span>
                        </div>
                        <div class="media-right"><span class="fa fa-question media-object"></span></div>
                    </div>
                </div>
                <div class="flexify">
                    <div class="col-sm-5 jumbotron answer-box media">
                        <div class="media-left"><span class="fa fa-question media-object"></span></div>
                        <div class="media-body">
                            C: <span id="option-3" class="option-text"></span>
                        </div>
                        <div class="media-right"><span class="fa fa-question media-object"></span></div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-5 jumbotron answer-box media">
                        <div class="media-left"><span class="fa fa-question media-object"></span></div>
                        <div class="media-body">
                            D: <span id="option-4" class="option-text"></span>
                        </div>
                        <div class="media-right"><span class="fa fa-question media-object"></span></div>
                    </div>
                </div>

                <!--<div class="row placeholders">
                    <div class="col-sm-6 col-xs-12">
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <!-- Do we want pictures for each alternative? or maybe we could make them all like questionmarks and have an animation when you choose one of the alternatives. turn them into like a checkmark if it was right or something? idk fam.
                            <p>?</p>
                            <!--
                            <img src="http://www.clker.com/cliparts/d/c/0/d/1259089297665068165question%20mark%20clkerdotcom-md.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">

                            <h4>Alternative 1</h4>
                            <span class="text-muted">Chop Suey</span>
                        </div>
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Alternative 2</h4>
                            <span class="text-muted">Numb</span>
                        </div>
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Alternative 3</h4>
                            <span class="text-muted">Baby</span>
                        </div>
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Alternative 4</h4>
                            <span class="text-muted">Ora jeska bena</span>
                        </div>
                    </div>
                </div>-->
                <a href="#">Report error</a>
            </div>
        </div>
    </div>
</div>