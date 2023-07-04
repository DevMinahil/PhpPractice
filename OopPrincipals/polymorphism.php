<?php
interface Shape {
    public function calculateArea();
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        echo "Calculating the area of a circle: ";
        echo 3.14 * $this->radius**2;
        echo "<br>";
    }
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        echo "Calculating the area of a rectangle: ";
        echo $this->width * $this->height;
        echo "<br>";
    }
}

class Triangle implements Shape {
    private $base;
    private $height;

    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        echo "Calculating the area of a triangle: ";
        echo 0.5 * $this->base * $this->height;
        echo "<br>";
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
$triangle = new Triangle(3, 8);

$shape = $circle; // Assigning a Circle object to the Shape variable
$shape->calculateArea();

$shape = $rectangle; // Assigning a Rectangle object to the Shape variable
$shape->calculateArea();

$shape = $triangle; // Assigning a Triangle object to the Shape variable
$shape->calculateArea();



?>
