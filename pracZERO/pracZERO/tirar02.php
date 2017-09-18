<?php
$str = "";
for ($i = 0; $i < 100; $i++) {
    $str .= $i . " ";
}
$n = $_GET['n'];
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
            echo "hola mundo";
            echo $str;
            ?></div>
        <?php if ($n < 6) { ?>
            <div style="background-color: aqua">menor que seis</div>
        <?php } else { ?>
            <div style="background-color: red">mayor que seis</div>
        <?php } ?>
    </body>
</html>
