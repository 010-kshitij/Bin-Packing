/* 
    Three.js stuff, require three.js file
*/

var scene = new THREE.Scene();
var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );

var renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth-100, window.innerHeight-100 );
document.body.appendChild( renderer.domElement );

camera.position.z = 60;

var animate = function () {
    requestAnimationFrame( animate );

    renderer.render(scene, camera);
};

animate();