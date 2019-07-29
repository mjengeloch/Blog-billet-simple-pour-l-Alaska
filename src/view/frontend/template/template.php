<?php
require "vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content=""> <!-- A compléter -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,500|Raleway:400,400i,700,700i&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <!--Ajouter les icon-->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

</head>

<body>
    <?php require 'navigation.php'; ?>
    <?php require 'header.php'; ?>
    <?= $content ?>
    <?php require 'footer.php'; ?>
</body>

</html>