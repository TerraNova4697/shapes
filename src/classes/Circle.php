<?php

namespace src\classes;

use src\classes\Shape;
use InvalidArgumentException;


/**
 * Represents a circle that can calculate its area.
 */
class Circle extends Shape
{
    /**
     * @var float The radius of the circle.
     */
    private float $radius;

    /**
     * Circle constructor.
     *
     * @param float $radius The radius of the circle.
     */
    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException("Радиус круга должен быть больше нуля.");
        }
        $this->radius = $radius;
    }
    
    /**
     * Calculate the area of the circle if not in cache already.
     *
     * @return float The calculated area.
     */
    public function calculateArea(): float
    {
        if ($this->isAreaCached()) {
            return $this->getCachedArea();
        }
        $area = round(pi() * pow($this->radius, 2), 2);
        $this->cacheArea($area);
        return $area;
    }

    /**
     * Represent information about the Circle.
     *
     * @return string The information about the circle.
     */
    public function getInfo(): string
    {
        return "Круг с радиусом {$this->radius}\n";
    }

    /**
     * Set the new radius for the circle.
     * 
     * @param float $radius set the radius for the circle.
     */    
    public function setRadius(float $radius): void
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException("Радиус круга должен быть больше нуля.");
        }
        $this->radius = $radius;
        $this->uncacheArea();
    }
}
