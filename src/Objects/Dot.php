<?php
namespace lwiwala\SVGDrawer\Objects;

class Dot extends Circle {
	public function __construct(array $centerPoint)
	{
		parent::__construct(0.1, $centerPoint);
	}

	public function setSize(float $size)
	{
		$this->radius = $size / 2;

		return $this;
	}

	public function getSize() : float
	{
		return $this->radius;
	}
}