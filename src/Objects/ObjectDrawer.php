<?php
namespace lwiwala\SVGDrawer\Objects;

abstract class ObjectDrawer {
	use Traits\SvgLineTrait;
	use Traits\SvgCircleOrEllipseTrait;
	use Traits\SvgRectTrait;

	const EPSILON = 0.00001;

	private $config;
	private $object;
	private $calc;

	public function __construct(Object $object, array $config, array $calc)
	{
		$this->object = $object;
		$this->config = $config;
		$this->calc = $calc;
	}

	protected function isEqual(float $var1, float $var2) : bool
	{
		return abs($var1 - $var2) < SELF::EPSILON;
	}

	protected function getObject() : Object
	{
		return $this->object;
	}

	protected function getPxDistance(float $divLength) : array
	{
		return [
			$divLength * $this->config['axisDistance'][0],
			$divLength * $this->config['axisDistance'][1]
		];
	}

	protected function getPxPosition(array $point) : array
	{
		return [
			$this->calc['centerAxisPosition'][0] + $this->config['axisDistance'][0] * $point[0],
			$this->calc['centerAxisPosition'][1] - $this->config['axisDistance'][1] * $point[1]
		];
	}

	protected function getConfig() : array
	{
		return $this->config;
	}

	protected function getCalc() : array
	{
		return $this->calc;
	}

	protected function svg(string $name, array $attributes) : string
	{
		$html = '<' . $name . ' ';

		foreach ($attributes as $key => $value) {
			$html .= $key . '="' . $value . '" ';
		}

		return $html . '/>';
	}
}