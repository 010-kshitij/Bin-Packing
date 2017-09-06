function Container(name, length, width, height, contentItems) {
    var instance = this;
    
    instance.name = name;
    instance.length = length;
    instance.width = width;
    instance.height = height;
    
    instance.contentItems = contentItems;
	
	/* 
		Associated Coordinates:
		X : width
		Y : height
		Z : length 
	*/
    
    // Creating 3D object for rendering.
    instance.box = new THREE.LineSegments( new THREE.EdgesGeometry(  new THREE.BoxBufferGeometry(instance.width, instance.height, instance.length) ),
                                          new THREE.LineBasicMaterial( { color: 0xff0000, linewidth: 2 } ) );    
	
	instance.items = [];
	
	for(var i = 0; i < instance.contentItems.length; i++) {
		instance.items.push(new Item(instance.contentItems[i].name,
							instance.contentItems[i].length, 
							instance.contentItems[i].width,
							instance.contentItems[i].height));
	}
	// Setting position for items.
	var position_x = -(instance.width/2);
	var position_y = -(instance.height/2);
	var position_z = -(instance.length/2);
	
	var total_length = 0;
	var total_width = 0;
	var total_height = 0;
	
	var max_length = instance.items[0].length;
	var max_width = instance.items[0].width;
	var max_height = instance.items[0].height;
	
	for(var i = 0; i < instance.items.length; i++) {
		instance.items[i].box.position.x = (position_x + (instance.items[i].width/2));
		instance.items[i].box.position.y = (position_y + (instance.items[i].height/2));
		instance.items[i].box.position.z = (position_z + (instance.items[i].length/2));
		
		total_width += instance.items[i].width;
		
		if(instance.items[i].height >= max_height) {
			max_height = instance.items[i].height;
		}
		if(instance.items[i].length >= max_length) {
			max_length = instance.items[i].length;
		}
		
		if(total_width < instance.width) {
			position_x += (instance.items[i].width);
		}
		else if(total_height < instance.height - total_height) {
			position_x = -(instance.width/2);
			position_y += max_height;
			total_width = 0;
			total_height += max_height;
			max_height = 0;
		}
		else if(total_length < instance.length - total_length) {
			var position_x = -(instance.width/2);
			var position_y = -(instance.height/2);
			position_z += max_length;
			total_width = 0;
			total_height = 0;
			total_length += max_length;
			max_height = 0;
			max_length = 0;
		}
	}
	
	instance.renderItems = function() {
		for(var i = 0; i < instance.items.length; i++) {
			scene.add(instance.items[i].box);
		}
	}
}