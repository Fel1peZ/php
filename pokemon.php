<?php 

//$nome = readline("Qual o seu pokemon?");

$short = "p";

$long = [
 "pokemon:"
];
 

$options = getopt($short, $long);
$nome = $options['pokemon'];
$dados_em_texto = file_get_contents("https://pokeapi.co/api/v2/pokemon/{$nome}");
$pokemon = json_decode($dados_em_texto,true);

print_r(strtoupper($pokemon['name']). "\n");
print_r("peso: ".$pokemon['weight']. "\n");
print_r("altura: ".$pokemon['height']. "\n");
print_r("movimentos: ");

foreach ($pokemon['moves']as $move) {
   print("\n - ".$move['move']['name']);
}
