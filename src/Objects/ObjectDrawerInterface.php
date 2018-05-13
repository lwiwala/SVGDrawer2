<?php
namespace lwiwala\SVGDrawer\Objects;

interface ObjectDrawerInterface {
	public function render() : string;
}