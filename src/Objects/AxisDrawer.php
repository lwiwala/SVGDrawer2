<?php
namespace lwiwala\SVGDrawer\Objects;

class AxisDrawer extends ObjectDrawer implements ObjectDrawerInterface {
	public function render() : string
	{
		$svg = '';

		$axisRangeXStart = $this->getCalc()['axisRange']['x'][0];
		$axisRangeXEnd = $this->getCalc()['axisRange']['x'][1];
		$axisRangeYStart = $this->getCalc()['axisRange']['y'][0];
		$axisRangeYEnd = $this->getCalc()['axisRange']['y'][1];

		// X axis
		$startX = ceil($axisRangeXStart); 
		$endX = ceil($axisRangeXEnd);

		for ($i = $startX; $i < $endX; $i++) {
			$startPoint = $this->getPxPosition([$i, $axisRangeYStart]);
			$endPoint = $this->getPxPosition([$i, $axisRangeYEnd]);
			
			$svg .= $this->svgLine($startPoint, $endPoint);
		}

		// Y axis
		$startY = ceil($axisRangeYStart); 
		$endY = ceil($axisRangeYEnd);

		for ($i = $startY; $i < $endY; $i++) {
			$startPoint = $this->getPxPosition([$axisRangeXStart, $i]);
			$endPoint = $this->getPxPosition([$axisRangeXEnd, $i]);
			
			$svg .= $this->svgLine($startPoint, $endPoint);
		}

		return $svg;
	}
}