<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="http://<?= $_SERVER["HTTP_HOST"] ?>/css/nabbe.css"/>
    <link rel="stylesheet" href="http://<?= $_SERVER["HTTP_HOST"] ?>/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="http://<?= $_SERVER["HTTP_HOST"] ?>/bootstrap/dist/css/bootstrap-social.css"/>
    <?php if (isset($page) && file_exists(LIBRARY_PATH . "/../public_html/css/" . $page . ".css")):?>
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/css/<?=$page?>.css">
    <?php endif?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://<?= $_SERVER["HTTP_HOST"] ?>/js/nabbe.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js'></script>
    <?php if (isset($page) && file_exists(LIBRARY_PATH . "/../public_html/js/" . $page . ".js")):?>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/js/<?=$page?>.js"></script>
    <?php endif?>
    <?php if (isset($_SESSION["nabbe-jwt"])):?>
    <script type="text/javascript">
        var store = store || {};

        //You can now make authorized requests in pure js, nice :)
        store.JWT = <?=$_SESSION["nabbe-jwt"]?>;
        $.ajaxSetup({
            headers: {"Authorization": "Bearer " + store.JWT.jwt}
        });
        populate();
    </script>
    <?php endif; ?>
    <title><?=ucfirst($page)?> - Nabbe</title>
</head>