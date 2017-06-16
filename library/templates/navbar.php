<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once LIBRARY_PATH . "/jwtManager.php"; ?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?=$_SERVER["HTTP_HOST"]?>">Nabbe Lyrics Quiz</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://<?=$_SERVER["HTTP_HOST"]?>/">Home</a></li>
                <li><a href="http://<?=$_SERVER["HTTP_HOST"]?>/about/">About Nabbe</a></li>
            </ul>
            <p class="navbar-text navbar-right">
                <?php if (isset($_SESSION["nabbe-jwt"])): ?>
                    Logged in as <a class="navbar-link" href="http://<?=$_SERVER["HTTP_HOST"]?>/profile/"><?=decode_JWT(json_decode($_SESSION["nabbe-jwt"])->jwt)->sub;?></a>
                <?php else: ?>
                You are not logged in
                <?php endif ?>
            </p>
            <?php if (isset($_SESSION["nabbe-jwt"])): ?>
            <form action="http://<?=$_SERVER["HTTP_HOST"]?>/logout/"><button type="submit" class="btn btn-info navbar-btn navbar-right">Log out</button></form>
            <?php endif ?>
        </div>
    </div>
</nav>