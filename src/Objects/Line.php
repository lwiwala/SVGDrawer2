<?php
namespace lwiwala\SVGDrawer\Objects;

use lwiwala\SVGDrawer\Objects\Object;

class Line extends Object {
	protected $startPoint;
	protected $endPoint;

	public function __construct(array $startPoint, array $endPoint)
	{
		$this->startPoint = $startPoint;
		$this->endPoint = $endPoint;
	}

	public function getStartPoint() : array
	{
		return $this->startPoint;
	}

	public function getEndPoint() : array
	{
		return $this->endPoint;
	}
}