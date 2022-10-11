<html lang=”en”>
<head>
<title>Svg drawer</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<a href="http://localhost:2281/?num=1" class="button">Circle</a>
<a href="http://localhost:2281/?num=2" class="button">Square</a>



<?php

if(isset($_GET['num'])) {
    $num = (int)$_GET["num"];

    $form = $num & 3;
    $color = $num >> 1 & 3;
    $p_x = $num >> 2 & 3;
    $p_y = $num >> 3 & 3;

    $p_x = 100 + $p_x * 100;
    $p_y = 100 + $p_y * 100;


    $brush = 'black';
    switch ($color) {
        case 0:
            $brush = 'red';
            break;
        case 1:
            $brush = 'yellow';
            break;
        case 2:
            $brush = 'blue';
            break;
        case 3:
            $brush = 'green';
            break;
        default:
            break;
    }

    $svg_code = '<svg width = "' . $p_x . '" height= "' . $p_y . '">';
    switch ($form) {
        case 0:
            if($p_x > $p_y) {
                $p_x = $p_y;
            } else {
                $p_y = $p_x;
            }
            $svg_code .= '<circle cx="' . $p_x / 2 . '" cy ="' . $p_y / 2 . '" r="' . $p_x / 2 . '" fill = "' . $brush . '" />';
            break;
        case 1:
            $svg_code .= '<ellipse cx="' . $p_x / 2 . '" cy ="' . $p_y / 2 . '" rx="' . $p_x / 2 . '" ry="' . $p_y / 2 . '" fill = "' . $brush . '" />';
            break;
        case 2:
            $svg_code .= '<rect x="0" y="0" width="' . $p_x . '" height="' . $p_y . '" fill="' . $brush . '" />';
            break;
        case 3:
            if ($p_x > $p_y) {
                $p_x = $p_y;
            } else {
                $p_y = $p_x;
            }
            $svg_code .= '<rect x="0" y="0" width="' . $p_x . '" height="' . $p_y . '" fill="' . $brush . '" />';
            break;
    }
    $svg_code .= '</svg>';
    echo $svg_code;
}
?>

</body>
</html>
