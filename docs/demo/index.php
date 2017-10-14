<?php
require_once('../../vendor/autoload.php');
use Jijoel\RandomImage\RandomImage;
function public_path($folder) {
    return __DIR__ . DIRECTORY_SEPARATOR . $folder;
}
?>
<!DOCTYPE html>
<html lang="en"
  class="has-wallpaper"
  style="<?php echo RandomImage::style('/images/files'); ?>"
>
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
    <p id="top">
        This is a demonstration of a random background image.
        The boxes below each have one of the available background images.
    </p>

<script>
window.images = <?php echo json_encode(RandomImage::files('/images/files')); ?>;

const myTop = document.getElementById("top");

for(var i = 0; i < window.images.length; i++) {
    const image = window.images[i].replace(/&quot;/g,'\"');
    var p = document.createElement('p');
    p.appendChild(document.createTextNode(image));
    var element = document.createElement('div');
    element.appendChild(p);
    element.style = "border:1px solid black;padding:0px 10px;margin:10px;width:400px;height:60px;background-image:url('"+image+"')";
    myTop.appendChild(element);
}
</script>

</body>
</html>
