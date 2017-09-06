function Container(name, length, width, height, contentItems) {
    var instance = this;
    
    instance.name = name;
    instance.length = length;
    instance.width = width;
    instance.height = height;
    
    instance.contentItems = contentItems;
    
    // Creating 3D object for rendering.
    instance.box = new THREE.LineSegments( new THREE.EdgesGeometry(  new THREE.BoxBufferGeometry(instance.length, instance.width, instance.height) ),
                                          new THREE.LineBasicMaterial( { color: 0xffffff, linewidth: 1 } ) );    
}