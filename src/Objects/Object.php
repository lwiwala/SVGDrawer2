<?php
namespace lwiwala\SVGDrawer\Objects;

abstract class Object {
	protected $priority = 10;
	protected $color;
	protected $strokeWidth;
	protected $backgroundColor;
	protected $shapeRendering;

	public function setPriority(int $priority)
	{
		$this->priority = $priority;

		return $this;
	}

	public function getPriority()
	{
		return $this->priority;
	}

	public function setStrokeColor(string $color)
	{
		$this->color = $color;

		return $this;
	}

	public function getStrokeColor()
	{
		return $this->color;
	}

	public function setStrokeWidth(int $width)
	{
		$this->strokeWidth = $width;

		return $this;
	}

	public function getStrokeWidth()
	{
		return $this->strokeWidth;
	}

	public function setBackgroundColor(string $backgroundColor)
	{
		$this->backgroundColor = $backgroundColor;

		return $this;
	}

	public function getBackgroundColor()
	{
		return $this->backgroundColor;
	}

	public function setShapeRendering(string $shapeRendering)
	{
		$this->shapeRendering = $shapeRendering;

		return $this;
	}

	public function getShapeRendering()
	{
		return $this->shapeRendering;
	}
}