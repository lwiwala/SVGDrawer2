<?php
namespace lwiwala\SVGDrawer\Objects;

use lwiwala\SVGDrawer\Objects\ObjectInterface;
use lwiwala\SVGDrawer\Objects\Object;

class Ruller extends Object {
	protected $color = '#000000';
	protected $strokeWidth = 1;
	private $step;

	public function setStep(float $step) : self
	{
		$this->step = $step;

		return $this;
	}

	public function getStep() : float
	{
		return $this->step;
	}
}