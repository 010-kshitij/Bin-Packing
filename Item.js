function Item(name, length, width, height, contentItems) {
    var instance = this;
    
    instance.name = name;
    instance.length = length;
    instance.width = width;
    instance.height = height;
    
    // Creating 3D object for rendering.
	var geometry = new THREE.BoxGeometry( instance.width, instance.height, instance.length );
	var material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
	instance.box = new THREE.Mesh( geometry, material );

	
    var wireframe = new THREE.LineSegments( new THREE.EdgesGeometry(  new THREE.BoxBufferGeometry(instance.width, instance.height, instance.length) ),
                                          new THREE.LineBasicMaterial( { color: 0xffffff, linewidth: 1 } ) );    
	instance.box.add(wireframe);
}