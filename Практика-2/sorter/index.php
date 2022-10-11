<html lang="en">
<head>
    <title>Sorter page</title>
    <link rel="stylesheet" href="../src/style.css" type="text/css"/>
</head>
<body>
<form>
    <div class="controls">
        <label for="id">Введите массив</label>
        <input type="text" id="a" name="array">
        <input type="submit" value="Submit">
    </div>
</form>
<?php

function shell_Sort($my_array)
{
    $x = round(count($my_array)/2);
    while($x > 0)
    {
        for($i = $x; $i < count($my_array);$i++){
            $temp = $my_array[$i];
            $j = $i;
            while($j >= $x && $my_array[$j-$x] > $temp)
            {
                $my_array[$j] = $my_array[$j - $x];
                $j -= $x;
            }
            $my_array[$j] = $temp;
        }
        $x = round($x/2.2);
    }
    return $my_array;
}


if(isset($_GET['array']))
{
    $array_str = $_GET['array'];
    $array = explode(",", $array_str);

    if ($array[0] == 0){
        echo 'Некорректный ввод';
        exit(0);
    }

    for($i = 0; $i < count($array); $i++){
        $array[$i] = (int)$array[$i];
    }

    $new_array = shell_Sort($array);

    echo 'Дано: ' . implode(',', $array) . '<br>Отсортировано: ' . implode(',', $new_array);
}
?>

<p>
</body>
</html>

