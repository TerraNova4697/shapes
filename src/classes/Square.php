<?php

namespace src\classes;

use src\classes\Shape;
use InvalidArgumentException;


/**
 * Represents a square that can calculate its area.
 */
class Square extends Shape
{
    /**
     * @var float The length of one side of the square.
     */
    private float $side;

    /**
     * Square constructor.
     *
     * @param float $side The length of one side of the square.
     */
    public function __construct(float $side)
    {
        if ($side <= 0) {
            throw new InvalidArgumentException("Длина стороны квадрата должна быть больше нуля.");
        }
        $this->side = $side;
    }

    /**
     * Calculate the area of the square if not in cache already.
     *
     * @return float The calculated area.
     */    
    public function calculateArea(): float
    {
        if ($this->isAreaCached()) {
            return $this->getCachedArea();
        }
        $area = round(pow($this->side, 2), 2);
        $this->cacheArea($area);
        return $area;
    }

    /**
     * Represent information about the Square.
     *
     * @return string The information about the rectangle.
     */
    public function getInfo()
    {
        return "Квадрат со стороной {$this->side}\n";
    }

    /**
     * Set the new side for the square.
     * 
     * @param float $side The side of the square.
     */    
    public function setSide(float $side): void
    {
        if ($side <= 0) {
            throw new InvalidArgumentException("Длина стороны квадрата должна быть больше нуля.");
        }
        $this->side = $side;
        $this->uncacheArea();
    }
}
