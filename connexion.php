<?php require __DIR__ .'/header.php';


use KruSirious\PokemonBattle\Trainer;

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

    // Permet de récupéré des donnée dans la bdd autre que l'id//
    /**
     *
     */

    // Acceder à la base de la donnée
    $TrainerRepo = $em->getRepository('KruSirious\PokemonBattle\Trainer');
    //Permet de trouver quelques chose dans la bdd autre que l'id
    $Trainer = $TrainerRepo->findOneBy([

        'username' => $_POST['username'],
        'password' => $_POST['password']


    ]);

    if (is_object($Trainer)){
        $_SESSION['Statue'] = 'connected';

        $_SESSION ['username'] = $Trainer-> getUsername();

        echo "vous êtes bien connecté";
    }
        else{
            "Vous êtes pas connecté";
        }

}

require 'views/connexion.php';