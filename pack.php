<?php
include_once './Container.php';
include_once './Item.php';

// Make a Container
$containers = array();
$containers[0] = new Container("Container0", 20, 20, 20, 1500);
$current_container = 0; // Index from the $containers array

// Random Data.
$total_items = 15;
$items = array();

for($i = 0; $i < $total_items; $i++) {
	$items[$i] = new Item('item'.$i, 10, 10, 10, 15);
}

$total_volume = 0;
$total_weight = 0;

for($i = 0; $i < 15; $i++){
    $total_weight += $items[$i]->weight;
    $total_volume += $items[$i]->volume;
    
    if($total_weight <= $containers[$current_container]->weight && $total_volume <= $containers[$current_container]->volume) {
        $containers[$current_container]->pushItem($items[$i]->name, $items[$i]->length, $items[$i]->width, $items[$i]->height, $items[$i]->weight, $items[$i]->volume);
    }
    else {
        $current_container++;
        $containers[$current_container] = new Container("Container".$current_container, 100, 100, 100, 15000);
        $i--;
    }
}

$data = array();

for($i = 0; $i < count($containers); $i++) {
    $data['container'][] = array(
        'name' => $containers[$i]->name,
        'length' => $containers[$i]->length,
        'width' => $containers[$i]->width,
        'height' => $containers[$i]->height,
        'contentItems' => $containers[$i]->getContentItems()
    );
}

echo json_encode($data);