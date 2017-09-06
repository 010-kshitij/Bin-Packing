<?php

class Container {
	public $name;
	public $length;
	public $width;
	public $height;
	public $weight;
	public $volume;
    
    private $remain_weight;
    private $remain_volume;
    
    private $content_items = array();

	public function __construct($name, $length, $width, $height, $weight) {
		$this->name = $name;
		$this->length = $length;
		$this->width = $width;
		$this->height = $height;
		$this->weight = $weight;
        $this->remain_weight = $this->weight;

		// Calculating Volume of the Container
		$this->volume = floatval($this->length * $this->width * $this->height);
        $this->remain_volume = $this->volume;
	}
    
    public function pushItem($name, $length, $width, $height, $weight, $volume) {
		$this->content_items[] = array(
            'name' => $name,
            'length' => $length,
            'width' => $width,
            'height' => $height,
            'weight' => $weight,
            'volume' => $volume
        );
        
        // Get remaining weight and volume of the container.
        $this->remain_weight -= $weight;
        $this->remain_volume -= $volume;
	}
    
    public function getContentItems() {
        return $this->content_items;
    }
}
