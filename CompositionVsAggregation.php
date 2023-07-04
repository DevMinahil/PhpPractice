<?php

// Composition: A car is composed of an engine and wheels.

class Engine {

    public function start() {
        echo "Engine started.<br>";
    }

    public function stop() {
        echo "Engine stopped.<br>";
    }
}

class Wheel {
    private $position;
    //aggregation $ position can exist independently

    public function __construct($position) {
        $this->position = $position;
    }

    public function rotate() {
        echo "Wheel at position {$this->position} rotating.<br>";
    }
}
class Car {
    private $engine;
    private $wheels;

    //composition wheel and engine will be destroyed with Car

    public function __construct() {
        $this->engine = new Engine();

        $this->wheels = [];
        for ($i = 1; $i <= 4; $i++) {
            $this->wheels[] = new Wheel($i);
        }
    }

    public function startCar() {
        $this->engine->start();
        foreach ($this->wheels as $wheel) {
            $wheel->rotate();
        }
    }

    public function stopCar() {
        $this->engine->stop();
    }
}

$car = new Car();
$car->startCar();
$car->stopCar();

?>