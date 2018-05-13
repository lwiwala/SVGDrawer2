<?php
namespace lwiwala\SVGDrawer\Objects;

class LineDrawer extends ObjectDrawer implements ObjectDrawerInterface {
	public function render() : string
	{
		$startPoint = $this->getPxPosition($this->getObject()->getStartPoint());
		$endPoint = $this->getPxPosition($this->getObject()->getEndPoint());

		return $this->svgLine($startPoint, $endPoint);
	}
}