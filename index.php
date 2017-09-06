<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bin Packing</title>
        <script src="jquery.min.js"></script>
        <script src="three.min.js"></script>
        
        <!-- Dependencies -->
        <script src="Container.js"></script>
        
        
        <style>
            body { margin: 0; }
			canvas { width: 100%; height: 100% }
        </style>
    </head>
    <body>
        <!-- Three.js stuff -->
        <script src="render.js"></script>
        <script>
            var containers = [];
            $.ajax({
                url: './pack.php',
                type: "get",
                async: false,
                success: function(response) {
                    var data = JSON.parse(response);
                    for(var i = 0; i < data.container.length; i++) {
                        containers.push(new Container(data.container[i].name,
                                                     data.container[i].length,
                                                     data.container[i].width,
                                                     data.container[i].height,
                                                    data.container[i].contentItems));
                    }
                }
            })
            console.log(containers);
        </script>
        <script>
            /* Rendering */
            scene.add(containers[1].box);
        </script>
        <!-- Keyboard Control -->
        <script>
            window.onkeydown = function(event) {
                switch(event.keyCode) {
                    case 37: scene.rotation.y -= 0.1;
                        break;
                    case 38: scene.rotation.x += 0.1;
                        break;
                    case 39: scene.rotation.y += 0.1;
                        break;
                    case 40: scene.rotation.x -= 0.1;
                        break;
                    case 219: camera.position.z -= 1;
                        break;
                    case 221: camera.position.z += 1;
                        break;
                }
                console.log("--------------");
                console.log("Rotation: ");
                console.log("X = " + scene.rotation.x);
                console.log("Y = " + scene.rotation.y);
                
                console.log("Camera Position Z: " + camera.position.z);
            }
        </script>
    </body>
</html>
