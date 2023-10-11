<?php

declare(strict_types=1);

use src\classes\Shape;
use src\classes\Circle;
use src\classes\Rectangle;
use src\classes\Square;

require_once __DIR__ . '/vendor/autoload.php';

$c = new Circle(17);

$c->printArea();
$c->printArea();
$c->setRadius(10);
$c->printArea();
echo $c->getInfo();

$s = new Square(5);
$s->printArea();
$s->setSide(10);
$s->printArea();
echo $s->getInfo();

$r = new Rectangle(3, 2);
$r->printArea();
$r->setLength(6);
$r->printArea();
echo $r->getInfo();
