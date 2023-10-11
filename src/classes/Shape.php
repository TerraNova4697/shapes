<?php

namespace src\classes;


/**
 * Abstract class for shapes that can calculate their area.
 */
abstract class Shape
{
    /**
     * @var float The cached area.
     */
    private float $cachedArea;
    
    /**
     * Calculate the area of the shape.
     *
     * @return float The calculated area.
     */
    abstract public function calculateArea();

    /**
     * Get info about the shape.
     */
    abstract public function getInfo();

    /**
     * Check if area is in cache.
     * 
     * @return bool True if cached.
     */
    protected function isAreaCached(): bool
    {
        return isset($this->cachedArea);
    }

    /**
     * Get cached area.
     * 
     * @return float The cached area.
     */
    protected function getCachedArea(): float
    {
        return $this->cachedArea;
    }
    
    /**
     * Save current area in cache.
     */
    protected function cacheArea(float $area): void
    {
        $this->cachedArea = $area;
    }


    /**
     * Revode cached area.
     */
    protected function uncacheArea(): void
    {
        unset($this->cachedArea);
    }

    /**
     * Print area.
     */
    public function printArea(): void
    {
        $area = $this->isAreaCached() ? $this->getCachedArea() : $this->calculateArea();
        echo 'Площадь: ' . $area . "см.\n";
    }
}
