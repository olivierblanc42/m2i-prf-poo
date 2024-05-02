<?php
// /index.php

// Chargement de l'autoloading
require 'vendor/autoload.php';

// Lien vers la classe utilisée
// Le require sera fait par l'autoloading
use App\classes\Member;
use Cocur\Slugify\Slugify;
// Instanciation
$member = new Member("John", "Doe");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de l'autoloading PSR-4</title>
</head>

<body>

    <h1>Page de test</h1>

    <h2>Fiche détaillée d'un membre :</h2>
    
    <dl>
        <dt>Prénom</dt>
        <dd><?= $member->getFirstName() ?></dd>
        <dt>Nom</dt>
        <dd><?= $member->getLastName() ?></dd>
        <dt>Date</dt>
        <dd><?= $member->getDate()->format('Y-m-d H:i:s') ?></dd>
    </dl>

    <h2>Display d'un membre : <?= $member->printMember() ?></h2>
    <h2>Test du slug par bundle externe</h2>
    <?php
        $slugify = new Slugify();
        echo $slugify->slugify($member->getFirstName() . ' ' . $member->getLastName() . ' ' . $member->getDate()->format('Y-m-d H:i:s')); 
    ?>
</body>
</html>