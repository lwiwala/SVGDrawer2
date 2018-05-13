<?php
namespace lwiwala\SVGDrawer\Objects\Traits;

trait SvgRectTrait {
	protected function svgRect(array $params) : string
	{
		$defaults = [
			'rx' => $this->getObject()->getXRadius(),
			'ry' => $this->getObject()->getYRadius(),
			'stroke-width' => $this->getObject()->getStrokeWidth(),
			'stroke' => $this->getObject()->getStrokeColor(),
			'shape-rendering' => $this->getObject()->getShapeRendering(),
			'fill' => $this->getObject()->getBackgroundColor()
		];

		return $this->svg('rect', array_merge($defaults, $params));
	}
}