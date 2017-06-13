<?php
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once TEMPLATES_PATH . "/header.php";
?>
<body>
<?php include_once TEMPLATES_PATH . "/navbar.php"; ?>,

<div id="content">
    <div class="container"> 
        <h3>
            <strong>Nabbe.io</strong> is a game created by:<br>
        </h3>
        <ul class="list-group">
            <li class="list-group-item">Olav Bech Bråten - our master</li>
            <li class="list-group-item">Tinus Flagstad - our slave</li>
            <li class="list-group-item">Aksel Slettemark - backend master</li>
            <li class="list-group-item">Håkon Wardeberg - our krenger-kreiger</li>
        </ul>
    </div>
</div>

<?php include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>