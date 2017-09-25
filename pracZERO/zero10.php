<?php
ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_errors', 'on');

/*if (isset($_GET['datos'])) {
    $ahora=new DateTime();
    $html='<div id="dialog" title="Basic dialog">
            <p>'.$ahora->format('Y-m-d H:i:s').'</p>
        </div';
    $str = '<script>  $( function() { $( "#dialog" ).dialog(); } ) </script>';
}*/

function cuadrado($lado) {
    $resultado = $lado * $lado;
    return $resultado;
}

function triangulo($base, $altura) {
    $resultado = ($base * $altura) / 2;
    return $resultado;
}

function circunferencia($radio) {
    $resultado = 3.1416 * ($radio * $radio);
    return $resultado;
}

function rectangulo($ladoM, $ladom) {
    $resultado = $ladoM * $ladom;
    return $resultado;
}
?>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Funciones calculadora</title>
        <script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>     
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">        
        <link rel="stylesheet" href="../css/estilos.css">         
    </head>
    <body>
        <?=$html?>
        <div class="divContent">         
            <h2>Formulario</h2>
            <form action="zero10.php" method="GET">
                <label for="selArea">Áreas</label>
                <select id="selArea" name="selArea" >
                    <option value="">seleccione 1</option>
                    <option <?= ($_GET['selArea'] == 'cuadrado' ? 'selected' : '') ?> value="cuadrado">cuadrado</option>
                    <option <?= ($_GET['selArea'] == 'triangulo' ? 'selected' : '') ?> value="triangulo">triangulo</option>
                    <option <?= ($_GET['selArea'] == 'circunferencia' ? 'selected' : '') ?> value="circunferencia">circunferencia</option>
                    <option <?= ($_GET['selArea'] == 'rectangulo' ? 'selected' : '') ?> value="rectangulo">rectangulo</option>
                </select>
                <input type="submit" id="datos" name="datos" value="datos">
                <?php if($_GET['datos'] == 'datos'){ ?>
                    
                       <?php if($_GET['selArea'] == 'cuadrado'){ ?>
                            
                           <br><label for="txtLadoCuadrado">Lado del cuadrado</label>
                            <input type="number" name="txtLadoCuadrado" id="txtLadoCuadrado">

                        <?php } ?>
                       
                        <?php if($_GET['selArea'] == 'triangulo'){ ?>
                            
                           <br><label for="txtBase">Base del triangulo</label>
                            <input type="number" name="txtBaseTriangulo" id="txtBaseTriangulo">
                            <br><label for="txtAltura">Altura del triangulo</label>
                            <input type="number" name="txtAlturaTriangulo" id="txtAlturaTriangulo">

                        <?php } ?>

                        <?php if($_GET['selArea'] == 'circunferencia'){ ?>
                            
                           <br><label for="txtRadio">Radio de la circunferencia</label>
                            <input type="number" name="txtRadioCircunferencia" id="txtRadioCircunferencia">

                        <?php } ?>

                        <?php if($_GET['selArea'] == 'rectangulo'){ ?>
                            
                           <br><label for="txtBase">Base del rectangulo</label>
                            <input type="number" name="txtBaseRectangulo" id="txtBaseRectangulo">
                            <br><label for="txtAltura">Altura del rectangulo</label>
                            <input type="number" name="txtAlturaRectangulo" id="txtAlturaRectangulo">

                        <?php } ?>
                       
                        <input type="submit" id="calcular" name="calcular" value="calcular">

                        <?php } ?>
                        <?php if($_GET['calcular'] == 'calcular'){ ?>
                    
                       <?php if($_GET['txtLadoCuadrado'] !='' && $_GET['txtLadoCuadrado']!=''){ ?>
                            
                           <?php $lado = $_GET['txtLadoCuadrado']; ?>
                              <?php  $result = cuadrado($lado); ?>
                              <input type="text"  value="<?php echo $result ?>">
                        <?php } ?>
                       
                        <?php if($_GET['txtBaseTriangulo'] != '' && $_GET['txtAlturaTriangulo'] != ''){ ?>
                            
                            <?php $base = $_GET['txtBaseTriangulo']; ?>
                            <?php $altura = $_GET['txtAlturaTriangulo']; ?>
                              <?php  $result = triangulo($base,$altura); ?>
                              <input type="text" value="<?php echo $result ?>">
                        <?php } ?>

                        <?php if($_GET['txtRadioCircunferencia'] != ''){ ?>
                            <?php $radio = $_GET['txtRadioCircunferencia']; ?>
                              <?php  $result = circunferencia($radio); ?>
                              <input type="text" value="<?php echo $result ?>">
                        <?php } ?>

                        <?php if($_GET['txtAlturaRectangulo'] != '' && $_GET['txtBaseRectangulo'] != ''){ ?>
                            
                            <?php $base = $_GET['txtBaseRectangulo']; ?>
                            <?php $altura = $_GET['txtAlturaRectangulo']; ?>
                              <?php  $result = rectangulo($base,$altura); ?>
                              <input type="text" value="<?php echo $result ?>">

                        <?php } ?>

                        <?php } ?>
                
                   
            </form>
        </div>
    </body>
</html>
