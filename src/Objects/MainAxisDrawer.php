<?php
namespace lwiwala\SVGDrawer\Objects;

class MainAxisDrawer extends ObjectDrawer implements ObjectDrawerInterface {
	public function render() : string
	{
		$startPointX = $this->getPxPosition([$this->getCalc()['axisRange']['x'][0], 0]);
		$endPointX = $this->getPxPosition([$this->getCalc()['axisRange']['x'][1], 0]);
		$startPointY = $this->getPxPosition([0, $this->getCalc()['axisRange']['y'][0]]);
		$endPointY = $this->getPxPosition([0, $this->getCalc()['axisRange']['y'][1]]);

		return $this->svg('line', [
			'x1' => $startPointX[0],
			'y1' => $startPointX[1],
			'x2' => $endPointX[0],
			'y2' => $endPointX[1],
			'stroke-width' => $this->getObject()->getStrokeWidth(),
			'stroke' => $this->getObject()->getStrokeColor(),
			'shape-rendering' => 'crispEdges'
		]) . $this->svg('line', [
			'x1' => $startPointY[0],
			'y1' => $startPointY[1],
			'x2' => $endPointY[0],
			'y2' => $endPointY[1],
			'stroke-width' => $this->getObject()->getStrokeWidth(),
			'stroke' => $this->getObject()->getStrokeColor(),
			'shape-rendering' => 'crispEdges'
		]);
	}
}