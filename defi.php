<?php require __DIR__.'/header.php';
$em = require __DIR__ . '/bootstrap.php';

use KruSirious\PokemonBattle\Pokemon;
use KruSirious\PokemonBattle\Trainer;

// On récupère le dresseur attaquant bdd
/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('KruSirious\PokemonBattle\Trainer');
$trainer = $trainerRepo->findOneBy([
    'username' => $_SESSION['username']
]);
// On récupère le pokemon du dresseur dans la bdd
/** @var \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepo = $em->getRepository('KruSirious\PokemonBattle\Pokemon');
$pokemonattack = $pokemonRepo->findOneBy([
    'trainer' => $trainer
]);
// On va chercher le pokémon de l'opposant avec l'id de se dernier
/** @var \Doctrine\ORM\EntityRepository $pokemonRepodef */
$pokemonRepodef = $em->getRepository('KruSirious\PokemonBattle\Pokemon');
$pokemondef = $pokemonRepodef->find($_GET['id']);

    $pv = $pokemondef -> getHp();

if(($pokemonattack->getType() == Pokemon::TYPE_WATER) && ($pokemondef ->getType() == Pokemon::TYPE_PLANT)){

    $newPv = $pv - rand(5,10);

}
elseif(($pokemonattack->getType()== Pokemon::TYPE_WATER)&& ($pokemondef ->getType()== Pokemon::TYPE_FIRE)){

    $newPv = $pv - rand(15, 30);
}
elseif(($pokemonattack->getType() == Pokemon::TYPE_WATER) && ($pokemondef ->getType() == Pokemon::TYPE_WATER)){
    $newPv = $pv - rand(10,20);
}

if(($pokemonattack->getType() == Pokemon::TYPE_PLANT) && ($pokemondef ->getType() == Pokemon::TYPE_FIRE)){

    $newPv = $pv - rand(5,10);

}
elseif(($pokemonattack->getType()== Pokemon::TYPE_PLANT)&& ($pokemondef ->getType()== Pokemon::TYPE_WATER)){

    $newPv = $pv - rand(15, 30);
}
elseif(($pokemonattack->getType()== Pokemon::TYPE_PLANT)&& ($pokemondef ->getType()== Pokemon::TYPE_PLANT)){
    $newPv = $pv - rand(10,20);
}

if(($pokemonattack->getType() == Pokemon::TYPE_FIRE) && ($pokemondef ->getType() == Pokemon::TYPE_WATER)) {

    $newPv = $pv - rand(5, 10);

}
elseif(($pokemonattack->getType()== Pokemon::TYPE_FIRE)&& ($pokemondef ->getType()== Pokemon::TYPE_PLANT)){

    $newPv = $pv - rand(15, 30);
}
elseif(($pokemonattack->getType()== Pokemon::TYPE_FIRE)&& ($pokemondef ->getType()== Pokemon::TYPE_FIRE)){
    $newPv = $pv - rand(10,20);
}

if ($newPv< 0){
    $newPv = 0;
}

//On récupère la donnée
$pokemondef->setHp($newPv);

//On envoie la donnée vers la Bdd
$em->flush();

?>


<?php echo $pokemondef->getName(); ?> est à <?php echo $newPv; ?>  pv!
<br>
<td><button><a href="combat.php">Retourne à l\'écran!</a></button></td>

