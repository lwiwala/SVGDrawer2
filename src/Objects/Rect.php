<?php
namespace lwiwala\SVGDrawer\Objects;

use lwiwala\SVGDrawer\Objects\ObjectInterface;
use lwiwala\SVGDrawer\Objects\Object;

class Rect extends Object {
	protected $point1;
	protected $point2;
	protected $XRadius;
	protected $YRadius;

	public function __construct(array $point1, array $point2, int $XRadius = 0, int $YRadius = 0)
	{
		$this->point1 = $point1;
		$this->point2 = $point2;
		$this->XRadius = $XRadius;
		$this->YRadius = $YRadius;
	}

	public function getPoint1() : array
	{
		return $this->point1;
	}

	public function getPoint2() : array
	{
		return $this->point2;
	}

	public function getXRadius() : int
	{
		return $this->XRadius;
	}

	public function getYRadius() : int
	{
		return $this->YRadius;
	}
}