<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars - Variante 1 - Carlos Sáez</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Star Wars ☆ Variante 1</h1>
    <?php
       /**
        * Programa para simular batallas entre naves Rebeldes e Imperiales.
        *
        * @author Kimo
        * @version 1.0
        */
        require 'ship.php';
        require 'functions.php';

        $rebelArmy = [];
        $imperialArmy = [];
        $battleResults = [];
        $rebel_wins = 0;
        $empire_wins = 0;
        $fights = 5; // Permite elegir el numero de batallas

        /**
        * Usa functions.php para crear las naves necesarias
        * 
        */

        for ($i = 1; $i <= $fights; $i++) {
            $rebelShip = createRebelShip();
            $imperialShip = createImperialShip();

            $rebelArmy[$i] = $rebelShip;
            $imperialArmy[$i] = $imperialShip;

            /**
            * Calcula el daño que hace cada nave, y quien es el ganador de la batalla individual
            * También devuelve unas variables con el numero de victorias de cada uno.
            * 
            */
            $diference = abs($rebelShip->damage() - $imperialShip->damage());
            switch ($rebelShip->damage() <=> $imperialShip->damage()) {
                case 1:
                    $battleResults[$i] = "<span class='rebelwin'>Ganan los <b>Rebeldes</b> por " . $diference . " puntos &emsp;<i class='fab fa-rebel'></i></span>";
                    $rebel_wins++;
                    break;
                case 0:
                    $battleResults[$i] = "<span class='nobodywin'><b>Empate</b>, todos muertos &emsp;💀</span>";
                    break;
                case -1:
                    $battleResults[$i] = "<span class='imperialwin'>Gana el <b>Imperio</b> por " . $diference . " puntos &emsp;<i class='fab fa-empire'></i></span>";
                    $empire_wins++;
                    break;
            }
        }

       /**
        * Imprime cada batalla individual en una tabla
        * 
        */
        echo "<table>";
        for ($i = 1; $i <= 3; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $fights; $j++) {
                switch ($i) {
                    case 1:
                        if (!str_contains($battleResults[$j], 'Rebelde')) {
                            echo "<td class='perdedor'>";
                        } else {
                            echo "<td>";
                        }
                        echo $rebelArmy[$j];
                        break;
                    case 2:
                        echo "<td>";
                        echo $battleResults[$j];
                        break;
                    case 3:
                        
                        if (!str_contains($battleResults[$j], 'Imperio')) {
                            echo "<td class='perdedor'>";
                        } else {
                            echo "<td>";
                        }
                        echo $imperialArmy[$j];
                        break;
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

       /**
        * Imprime el resultado general de todas las batallas
        * 
        */
        echo "<h1>";
        switch ($empire_wins <=> $rebel_wins) {
            case 1:
                echo "<span class='imperialwin'><i class='fab fa-empire'></i> Gana el Imperio <i class='fab fa-empire'></i></span>";
                break;
            case 0:
                echo "<span class='nobodywins'><i class='fas fa-peace'></i> En la guerra, todos pierden <i class='fas fa-peace'></i></span>";
                break;
            case -1:
                echo "<span class='rebelwin'><i class='fab fa-rebel'></i> Gana la Rebelión <i class='fab fa-rebel'></i></span>";
                break;
        }
        echo "</h1>";
    ?>
</body>
</html>
