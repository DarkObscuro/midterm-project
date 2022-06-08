<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="public/css/LoginStyle.css" rel="stylesheet" />
    <link rel="icon" type="image/gif" href="public/images/im.gif" />

</head>

<body>
    <div id="main">
        <div id="entete">
            <?php menu(); ?>
        </div>

        <div id="core">
            <?= $content ?>
        </div>
        <div id="pied">
            <?php require("view/frontend/footer.php"); ?>


        </div>
    </div>
</body>

</html>