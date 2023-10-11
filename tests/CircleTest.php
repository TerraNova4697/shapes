<?php declare(strict_types=1);

use src\classes\Circle;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


final class CircleTest extends TestCase
{
    public function testCalculateArea(): void
    {
        $circle = new Circle(10);
        $area = $circle->calculateArea();
        $this->assertEquals(round(pi() * pow(10, 2), 2), $area);
    }

    public function testCacheUpdatesAfterCircleModified(): void
    {
        $circle = new Circle(10);
        $area = $circle->calculateArea();
        $circle->setRadius(15);
        $this->assertFalse($area === $circle->calculateArea());
    }

    public function testCanUpdateRadius(): void
    {
        $circle = new Circle(10);
        $circle->calculateArea();
        $circle->setRadius(15);
        $this->assertEquals(round(pi() * pow(15, 2), 2), $circle->calculateArea());
    }

    public function testExcThrownWhenInitWithNegativeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Circle(-1);
    }

    public function testExcThrownWhenModifyRadiusWithNegativeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Circle(10);
        $circle->setRadius(-1);
    }
}
