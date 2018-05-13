<?php
namespace lwiwala\SVGDrawer\Objects;

class Circle extends Object {
	protected $radius;
	protected $centerPoint;

	public function __construct(float $radius, array $centerPoint)
	{
		$this->radius = $radius;
		$this->centerPoint = $centerPoint;
	}

	public function getRadius() : float
	{
		return $this->radius;
	}

	public function getCenterPoint() : array
	{
		return $this->centerPoint;
	}
}