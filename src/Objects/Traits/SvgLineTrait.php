<?php
namespace lwiwala\SVGDrawer\Objects\Traits;

trait SvgLineTrait {
	protected function svgLine(array $startPoint, array $endPoint) : string
	{
		return $this->svg('line', [
			'x1' => $startPoint[0],
			'y1' => $startPoint[1],
			'x2' => $endPoint[0],
			'y2' => $endPoint[1],
			'stroke-width' => $this->getObject()->getStrokeWidth(),
			'stroke' => $this->getObject()->getStrokeColor(),
			'shape-rendering' => $this->getObject()->getShapeRendering()
		]);
	}
}