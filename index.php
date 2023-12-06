<?php
    
    $pokemons_api = file_get_contents("https://pokeapi.co/api/v2/pokemon/");
    $pokemons = json_decode($pokemons_api, true);
     for ($i=0; $i < 20; $i++) { 
        $pokemon = $pokemons['results'][$i];
        $todas_infos_api = file_get_contents($pokemon['url']);
        $pokemons['results'][$i] = json_decode($todas_infos_api, true);
     }
     $encontrados = [];
     if(isset( $_GET['campo_busca']))
     foreach ($pokemon as $poke => $value) {
       if(str_contains($poke['name'],  $_GET['campo_busca'])){
            $encontrados[] = $poke;
       }
     }
    $pokemon = $encontrados
//     print '<pre>';
//     print_r(['results']);
//     print '</pre>';

// die

?>
<html>

<head>
    <title>Pokedex</title>

    <style>

        #pesquisa {
            background: #d62929;
            font-family:Arial  ;
            padding: 10px;
            text-align: center;
            border: solid 2px #333;
        }

        .pokemon {
            width: 20%;
            border: solid 2px #555;
            padding: 15px;/* margem interna  */
            margin: 10px 10px 10px 10px;
            float: left;
            
        }

        .pokemon img {
            max-width: 100%;
        }

            

        #pesquisa input[type="text"]{
            widt: 500px;
            padding-top:10px;
            padding-bottom:10px;
            border-radius: 15px;

        }
        #pesquisa input[type="submit"]{
        
            padding-top:10px;
            padding-bottom:10px;
            border-radius: 15px;

        }


    </style>

</head>

<body>

    
 <div id="pesquisa">
    <form method="get">
        <input type="text" name="campo_busca" placeholder= "Digite o Pokémon">
        <input type="submit" value="buscar">
    </form>
 </div> 

 <div id="pokemons">
     <?php 

     for($i = 0;$i < 20; $i++): ?>
    <div class="pokemon">


    <img src="<?= $pokemons['results'][$i]['sprites']['other']['official-artwork']['front_default']?>" alt="Rayquaza"
    width="200px">

    <h1><?php print $pokemons['results'][$i]['name'];    ?></h1>
    <p><?php print "altura: " .$pokemons['results'][$i]['height']/10 . " m";    ?></p>
    <p><?php print "peso: " . $pokemons['results'][$i]['weight'];    ?></p>

    </div>
    <?php endfor; ?>
        
   
 </div>

</body>
</html>
