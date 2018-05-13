# SVGDrawer2
Simply drawer in SVG for PHP

![alt text](http://lwiwala.ct8.pl/images/svg-drawer2.PNG)

```php
<?php
declare(strict_types=1);

use lwiwala\SVGDrawer\SVGDrawer;
use lwiwala\SVGDrawer\Color;
use lwiwala\SVGDrawer\SVGDrawerException;
use lwiwala\SVGDrawer\Objects\Circle;
use lwiwala\SVGDrawer\Objects\Line;
use lwiwala\SVGDrawer\Objects\Ruller;
use lwiwala\SVGDrawer\Objects\Dot;
use lwiwala\SVGDrawer\Objects\MainAxis;
use lwiwala\SVGDrawer\Objects\Axis;
use lwiwala\SVGDrawer\Objects\Rect;
use lwiwala\SVGDrawer\Objects\Object;

require __DIR__ . '/vendor/autoload.php';

echo '<!DOCTYPE html>
<html>
<head>
    <title>SVGDrawer2 test</title>
<head>
<body>';

try {
    $drawer = new SVGDrawer([
            'axisDistance' => [30, 30],
            'debug' => true
        ]);

    $drawer
        ->callback(function (Object &$object, SVGDrawer &$drawer, int $offset) {
            if (get_class($object) === 'lwiwala\SVGDrawer\Objects\Line') {
                $object->setStrokeColor(Color::GREEN);
            }
        })
        ->add((new Axis)->setStrokeColor(Color::SILVER)->setPriority(0))
        ->add((new MainAxis)->setStrokeColor(Color::BLACK)->setPriority(1))
        ->add((new Ruller)->setStep(5))
        ->add((new Circle(2.5, [2, 5]))->setStrokeColor(Color::GREEN))
        ->add(new Line([5, 5], [6, 3]))
        ->add(new Line([5, 5], [6, 7]))
        ->add((new Dot([8, 8]))->setSize(0.3))
        ->add((new Rect([-2, 2], [2, -2]))->setPriority(100));

    echo $drawer->render();
} catch (SVGDrawerException $e) {
    echo $e->getMessage();
}

echo '</body></html>';
```
