<?php
namespace lwiwala\SVGDrawer;
use lwiwala\SVGDrawer\Objects\Object;

class SVGDrawer {
	const TOP = 0x1;
	const MIDDLE = 0x2;
	const BOTTOM = 0x4;

	const LEFT = 0x8;
	const CENTER = 0x16;
	const RIGHT = 0x32;

	const BLACK = '#000000';
	const WHITE = '#FFFFFF';
	const RED = '#FF0000';
	const SILVER = '#C0C0C0';

	private $objectsStack = [];
	private $callbacksStack = [];
	private $config = [];
	private $calc = [];

	public function __construct(array $config = [])
	{
		$this->config([
			'width' => 800,
			'height' => 500,
			'axisDistance' => [20, 20],
			'axisCenter' => SELF::CENTER | SELF::MIDDLE,
			'mainBackgroundColor' => Color::WHITE,
			'debug' => false,
			'defaults' => [
				'strokeWidth' => 1,
				'strokeColor' => Color::BLACK,
				'backgroundColor' => Color::WHITE,
				'shapeRendering' => 'auto',
			]
		]);

		$this->config = array_merge($this->config, $config);
	}

	public function callback(callable $callable) : self
	{
		$this->callbacksStack[] = $callable;

		return $this;		
	}

	public function determineCallbacks()
	{
		foreach ($this->callbacksStack as $callback) {
			foreach ($this->objectsStack as $offset => &$object) {
				$callback($object, $this, $offset);
			}
		}
	}

	private function calculate()
	{
		if ($this->config['axisCenter'] & SELF::LEFT) {
			$centerAxisPosition[0] = 0;
		}
		else if ($this->config['axisCenter'] & SELF::CENTER) {
			$centerAxisPosition[0] = $this->config['width'] / 2;
		}
		else if ($this->config['axisCenter'] & SELF::RIGHT) {
			$centerAxisPosition[0] = $this->config['width'];
		}

		if ($this->config['axisCenter'] & SELF::TOP) {
			$centerAxisPosition[1] = 0;
		}
		else if ($this->config['axisCenter'] & SELF::MIDDLE) {
			$centerAxisPosition[1] = $this->config['height'] / 2;
		}
		else if ($this->config['axisCenter'] & SELF::BOTTOM) {
			$centerAxisPosition[1] = $this->config['height'];
		}

		$axisRange['x'][0] = -($centerAxisPosition[0] / $this->config['axisDistance'][0]);
		$axisRange['x'][1] = 
			$axisRange['x'][0] + $this->config['width'] / $this->config['axisDistance'][0];

		$axisRange['y'][0] = -($centerAxisPosition[1] / $this->config['axisDistance'][1]);
		$axisRange['y'][1] =
			$axisRange['y'][0] + $this->config['height'] / $this->config['axisDistance'][1];

		$this->calc = [
			'centerAxisPosition' => $centerAxisPosition,
			'axisRange' => $axisRange
		];
	} 

	public function config(array $config) : self
	{
		$this->config = array_merge($this->config, $config);

		return $this;
	}

	public function add(Object $object) : self
	{
		$this->objectsStack[] = $object;

		return $this;
	}

	public function render() : string
	{
		$this->calculate();
		$rendered = '<svg width="'.$this->config['width'].'" height="'.$this->config['height'].'">';

		usort($this->objectsStack, function (Object $object1, Object $object2) {
			return $object1->getPriority() <=> $object2->getPriority();
		});

		$this->determineCallbacks();

		foreach ($this->objectsStack as $object) {
			$objectDrawerClassName = get_class($object) . 'Drawer';

			if (!class_exists($objectDrawerClassName)) {
				$ex = explode('\\', get_class($object));
				throw new SVGDrawerException('Drawer for "' . end($ex) . '" does not exists!');
			}

			foreach ($this->config['defaults'] as $key => $value) {
				$getterName = 'get'.ucfirst($key);
				$setterName = 'set'.ucfirst($key);
				if (!method_exists($object, $getterName)) {
					continue;
				}
				$val = $object->{$getterName}();
				if ($val === null && method_exists($object, $setterName)) {
					$val = $object->{$setterName}($value);
				}
			}

			$objectDrawer = new $objectDrawerClassName($object, $this->config, $this->calc);
			$rendered .= $objectDrawer->render();
		}

		$rendered .= '</svg>';

		return $rendered;
	}
}