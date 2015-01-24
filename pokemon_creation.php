<?php require __DIR__ .'/header.php';

use KruSirious\PokemonBattle\Pokemon;

$em = require __DIR__.'/bootstrap.php';


if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['type']) && !empty($_POST['type'])) {

    /** @var  $pokemon */
    $pokemon = New pokemon();

// On crée les donnée
    $pokemon
        ->setName($_POST['name'])
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