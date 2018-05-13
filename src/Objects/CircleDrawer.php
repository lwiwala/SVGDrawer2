<?php
namespace lwiwala\SVGDrawer\Objects;

class CircleDrawer extends ObjectDrawer implements ObjectDrawerInterface {
	public function render() : string
	{
		$radiusPx = $this->getPxDistance($this->getObject()->getRadius());
		$centerPoint = $this->getPxPosition($this->getObject()->getCenterPoint());

		return $this->svgCircleOrEllipse($centerPoint, $radiusPx);
	}
}