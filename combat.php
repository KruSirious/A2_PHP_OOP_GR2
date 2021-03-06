<?php require __DIR__ .'/header.php';
$em = require __DIR__.'/bootstrap.php';

use KruSirious\PokemonBattle\Pokemon;
use KruSirious\PokemonBattle\Trainer;



// Acceder à la base de la donnée
/** @var Doctrine\ORM\EntityRepository $TrainerRepo */
$TrainerRepo = $em->getRepository('KruSirious\PokemonBattle\Trainer');

//Permet de trouver quelques chose dans la bdd autre que l'id
$Trainer = $TrainerRepo->findOneBy([

    'username' =>  $_SESSION ['username'],

]);

//Acceder à la bdd
/** @var \Doctrine\ORM\EntityRepository $pokemonRepo */

$pokemonRepo = $em->getRepository('KruSirious\PokemonBattle\Pokemon');

/** @var \KruSirious\PokemonBattle\Pokemon $pokemon */
$pokemon = $pokemonRepo->findAll(); ?>

Choissisez votre Adversaire :
        <table >
            <tbody> <?php foreach ($pokemon as $pok) {
             $pok->getTrainer(); ?>
                <tr>
                    <td>
                        <?php echo $pok->getName(); ?>
                    </td>
                    <td><?php echo $pok->getHp(); ?></td>
                    <td>
                        <?php
                        if ($pok->getType() == "0")
                            echo "Fire";
                        elseif ($pok->getType() == "1")
                            echo "Plant";
                        elseif ($pok->getType() == "2")
                            echo "Water";
                        ?>
                    </td>
                    <td><button><a href="defi.php?id=<?php echo $pok->getId();?>">Defie-le !</a></button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

