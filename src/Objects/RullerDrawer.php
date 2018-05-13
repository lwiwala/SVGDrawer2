<?php
namespace lwiwala\SVGDrawer\Objects;

class RullerDrawer extends ObjectDrawer implements ObjectDrawerInterface {
	private $svg = '';

	public function render() : string
	{
		$step = $this->getObject()->getStep();
		$this->rullerX($step);
		$this->rullerY($step);

		return $this->svg;
	}

	private function rullerX(float $step)
	{
		$startX = round($this->getCalc()['axisRange']['x'][0] / $step) * $step;
		$endX = round($this->getCalc()['axisRange']['x'][1] / $step) * $step;

		for ($x = $startX; $x <= $endX; $x += $step) { 
			$startPoint = $this->getPxPosition([$x, 0.3]);
			$endPoint = $this->getPxPosition([$x, -0.3]);

			$this->svg .= $this->svgLine($startPoint, $endPoint);
		}
	}

	private function rullerY(float $step)
	{
		$startY = round($this->getCalc()['axisRange']['y'][0] / $step) * $step;
		$endY = round($this->getCalc()['axisRange']['y'][1] / $step) * $step;

		for ($y = $startY; $y <= $endY; $y += $step) { 
			$startPoint = $this->getPxPosition([0.3, $y]);
			$endPoint = $this->getPxPosition([-0.3, $y]);

			$this->svg .= $this->svgLine($startPoint, $endPoint);
		}
	}
}