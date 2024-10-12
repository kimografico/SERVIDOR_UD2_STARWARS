<?php
    /**
     * Archivo de funciones para usar en la clase principal
     * 
     * @author Kimo
     * @version 1.0
     */


    /**
    * Imprime una nave rebelde
    * 
    */

    function createRebelShip() {

        switch (rand(1,4)){
            case 1:
                $rebelShip = new Nave("X-Wing", 2, [1, 2], [1, 10], "img/X-Wing.png");
                break;
            case 2:
                $rebelShip = new Nave("BTL-Wing-Bomber", 3, [1, 4], [1, 6], "img/BTL-Wing-Bomber.png");
                break;
            case 3:
                $rebelShip = new Nave("YT-Spacecraft", 5, [1, 10], [1, 4], "img/YT-Spacecraft.png");
                break;
            case 4:
                $rebelShip = new Nave("Millenium-Falcon", 5, [1, 6], [1, 10], "img/Millenium-Falcon.png");
                break;
        }
        
        return $rebelShip;
    }

    /**
    * Imprime una nave imperial
    * 
    */

    function createImperialShip() {
        // Crear una instancia de la nave imperial
        switch (rand(1,3)){
            case 1:
                $imperialShip = new Nave("TIE Fighter", 2, [1, 2], [1, 8], "img/TIE-Fighter.png");
                break;
            case 2:
                $imperialShip = new Nave("Bulk-Freighter", 3, [1, 4], [1, 6], "img/BFF-Bulk-Freighter.png");
                break;
            case 3:
                $imperialShip = new Nave("Assault-Ship", 3, [1, 20], [1, 2], "img/Assault-Ship.png");
                break;
            }
        return $imperialShip;
    }

?>