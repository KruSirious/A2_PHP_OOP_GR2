<?php require __DIR__ .'/header.php';

use KruSirious\PokemonBattle\Trainer;

$em = require __DIR__.'/bootstrap.php';

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

    /** @var  $trainer */
    $trainer = New Trainer();

// On crée les donnée
    $trainer
        ->setUsername($_POST['username'])
        ->setPassword($_POST['password']);
// On récupère les donnée SetUsername/ SetPassword
    $em->persist($trainer);

// on envoie les données vers la base de donnée
    $em->flush();

    echo "vous êtes un batard !";



}
require 'views/sign_up.php';
