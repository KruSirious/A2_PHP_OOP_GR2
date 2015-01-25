<?php require __DIR__ .'/header.php';

use KruSirious\PokemonBattle\Pokemon;
use KruSirious\PokemonBattle\Trainer;

$em = require __DIR__.'/bootstrap.php';


// Acceder à la base de la donnée
$TrainerRepo = $em->getRepository('KruSirious\PokemonBattle\Trainer');

//Permet de trouver quelques chose dans la bdd autre que l'id
$Trainer = $TrainerRepo->findOneBy([

    'username' =>  $_SESSION ['username'],

 ]);

//Permet de trouver le dresseur du pokémon, de le récupéré dans la base de donnée

/** @var \Doctrine\ORM\EntityRepository $pokemonRepo */

$pokemonRepo = $em->getRepository('KruSirious\PokemonBattle\Pokemon');
$pokemon = $pokemonRepo->findOneBy([
    'trainer' => $Trainer,
]);


if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['type']) && !empty($_POST['type'])) {

    /** @var  $pokemon */
    $pokemon = New pokemon();

// On crée les donnée
    $pokemon
        ->setName($_POST['name'])
        ->setTrainer($Trainer)
        ->setHP(100);
            if($_POST['type'] == 'fire'){
                $pokemon->setType(Pokemon::TYPE_FIRE);
            }
            elseif($_POST['type'] == 'plant'){
                $pokemon->setType(Pokemon::TYPE_PLANT);
            }
            elseif($_POST['type'] == 'water') {
                $pokemon->setType(Pokemon::TYPE_WATER);
            }

// On récupère les donnée du dessus
    $em->persist($pokemon);

// on envoie les données vers la base de donnée
    $em->flush();
}

require 'views/pokemon_creation.php';