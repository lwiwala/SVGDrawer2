<?php
namespace lwiwala\SVGDrawer\Objects\Traits;

trait SvgCircleOrEllipseTrait {
	protected function svgCircleOrEllipse(array $centerPoint, array $radiusPx) : string
	{
		if ($this->isEqual($radiusPx[0], $radiusPx[1])) {
			return $this->svg('circle', [
				'cx' => $centerPoint[0],
				'cy' => $centerPoint[1],
				'r' => $radiusPx[0],
				'fill' => $this->getObject()->getBackgroundColor(),
				'stroke' => $this->getObject()->getStrokeColor()
			]);
		}

		return $this->svg('ellipse', [
			'cx' => $centerPoint[0],
			'cy' => $centerPoint[1],
			'rx' => $radiusPx[0],
			'ry' => $radiusPx[1],
			'fill' => $this->getObject()->getBackgroundColor(),
			'stroke' => $this->getObject()->getStrokeColor()
		]);
	}
}