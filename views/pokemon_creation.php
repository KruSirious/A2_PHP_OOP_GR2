<?php if($pokemon == null){?>

<form method="post" action="">
    <input type="text" name="name" id="name" placeholder="name" />
    <br />
    <input type="radio" name="type" value="fire">Feu<br />
    <input type="radio" name="type" value="plant">Plante<br />
    <input type="radio" name="type" value="water">Eau<br />
    <input type="submit" value="Valider" />
</form>

<?php
}else{
    /** @var \KruSirious\PokemonBattle\Pokemon $pokemon */
    echo "Nom du pokemon : ".$pokemon->getName()."<br />HP : ".
        $pokemon->getHP()."<br /><a href='combat.php'>Un petit duel cela vous dis ?</a>";
} ?>