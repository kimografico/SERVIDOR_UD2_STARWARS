<?php
    /**
     * Clase que representa una nave en el juego de Star Wars
     * 
     * @author Kimo
     * @version 1.0
     */

    class Nave {
        private $shipName;
        private $cannons;
        private $crew;
        private $speed;
        private $image; // Aquí tengo que poner la ruta de la imagen
        private $crewMembers;
        private $shipSpeed;

        /**
         * Constructor
         *
         * @param string $shipName Nombre de la nave
         * @param int $cannons Número de cañones
         * @param array $crew Rango de tripulación(array con mínimo y máximo)
         * @param array $speed Rango de velocidad (array con mínimo y máximo)
         * @param string $image Ruta de la imagen de la nave
         */

        public function __construct(string $shipName, int $cannons, array $crew, array $speed, string $image) {
            $this->shipName = $shipName;
            $this->cannons = $cannons; // Damos por hecho que es un numero entero positivo correcto, si me da tiempo haré una validación
            $this->crew = $crew; // Damos por hecho que es un array de dos números enteros positivos correctos, si me da tiempo haré una validación
            $this->speed = $speed; // Damos por hecho que es un array de dos números enteros positivos correctos, si me da tiempo haré una validación
            $this->image = $image; // Damos por hecho que es una ruta correcta y existe, si me da tiempo veré si puedo gestionar la excepción (ya que no se podría validar por código).
            $this->crewMembers = rand($this->crew[0], $this->crew[1]);
            $this->shipSpeed = rand($this->speed[0], $this->speed[1]);
        }

        
        /**
         * Calcula el daño que inflinge la nave
         *
         * @return int El daño que inflinge la nave
         */

        public function damage() {
            $damage = min($this->crewMembers, $this->cannons) * $this->shipSpeed;

            return $damage;
        }


        /**
         * Muestra los datos de la nave.
         */

        public function __toString(): string {
            $shipData = "";
            $shipData .= "<b class='nombrenave'>" . $this->shipName . "</b><br><br>";
            $shipData .= "Cañones:&emsp;<b> " . $this->cannons . "</b><br>";
            $shipData .= "Tripulación:&emsp;<b> " . $this->crewMembers . "</b><br>";
            $shipData .= "Velocidad:&emsp;<b> " . $this->shipSpeed . "</b><br>";
            $shipData .= "Ataque:&emsp;<b> " . $this->damage() . "</b><br>";
            $shipData .= "<br><img src='" . $this->image . "'><br><br>";


            return $shipData;
        }
    }
?>