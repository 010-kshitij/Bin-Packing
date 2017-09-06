<?php

class Item {
	public $name;
	public $length;
	public $width;
	public $height;
	public $weight;

	public $volume;

	public function __construct($name, $length, $width, $height, $weight) {
		$this->name = $name;
		$this->length = $length;
		$this->width = $width;
		$this->height = $height;
		$this->weight = $weight;

		// Calculating the volume of the Item.
		$this->volume = floatval($this->length * $this->width * $this->height);
	}
}
