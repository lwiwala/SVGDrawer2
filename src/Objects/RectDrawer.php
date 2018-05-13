<?php
namespace lwiwala\SVGDrawer\Objects;

use lwiwala\SVGDrawer\SVGDrawerException;

class RectDrawer extends ObjectDrawer implements ObjectDrawerInterface {
	public function render() : string
	{
		$point1 = $this->getObject()->getPoint1();
		$point2 = $this->getObject()->getPoint2();

		$x1 = $this->getPxPosition($point1)[0];
		$y1 = $this->getPxPosition($point1)[1];

		$x2 = $this->getPxPosition($point2)[0];
		$y2 = $this->getPxPosition($point2)[1];

		if ($x1 > $x2 || $y1 > $y2) {
			throw new SVGDrawerException("Wrong Rect params");
		}

		return $this->svgRect([
			'x' => $x1,
			'y' => $y1,
			'width' => $x2 - $x1,
			'height' => $y2 - $y1
		]);
	}
}