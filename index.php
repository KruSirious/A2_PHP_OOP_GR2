<?php

require __DIR__.'/header.php';
require __DIR__.'/vendor/autoload.php';

if ($_SESSION == TRUE){
echo "Bonjour ".$_SESSION['username'];
require 'pokemon_creation.php';
}else{
echo 'Merci de vous connecter';
require 'views/connexion.php';
}
?>