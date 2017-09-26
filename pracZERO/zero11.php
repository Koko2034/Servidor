<?php
    function calcular($altPersona,$altExtra){
        $vision =(sqrt((2 * ($altPersona+$altExtra) * _RADIO) + pow(($altPersona+$altExtra),2))/1000);
        return round($vision,2);
    }
    function clean(){
        if($_POST['calcular']=='calcular'){
            unset($altExtra);
            unset($altPersona);
            unset($_POST['calcular']);
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <style>
    .divDatos{
        width: 65%;
        margin: 0 auto;
        margin-top:50px;
        
    }
    .titulo{
        font-size: 26px;
        margin-bottom: 10px;
    }
    .btnEnviar{
        margin:0 auto;
        width: 30%;
    }
    .divResult{
        width: 65%;
        margin-top:25px;
        font-size:20px;
       
    }
    
    </style>
    <title>Zero11</title>
</head>
<body>
    <div class= "container divDatos">
        <label class="control-label titulo text-center">Calcula tu distancia al horizonte</label>
        <form action="" method="POST">
            <div class="form-group">
                <label for="txtAltura" class="control-label">Altura Persona ( metros )</label>
                <input type="number" step="0.01" min="0" required="required" class="form-control" id="txtAltura" name="txtAltura">
            </div>  
        <div class="form-group"> 
            <label for="txtExtra" class="control-label">Altura Extra</label>
            <input type="number"  step="0.01" class="form-control" id="txtExtra" name="txtExtra">
        </div>
        <div class="form-group text-center"> 
            <input type="submit" class="btn btn-primary btnEnviar" name="calcular" id="calcular" value="calcular">
        </div>
        </form> 
    <div>
        <?php define(_RADIO,63710000);?>
        <?php $altPersona=$_POST['txtAltura']; ?>
        <?php $altExtra =$_POST['txtExtra']; ?>
        <?php if($_POST['calcular']=='calcular' && $_POST['txtAltura']!=''){?>
                <div class="container text-center divResult">
            <br><label for="txtResultado" class="control-label">La distancia que 
                podra ver una persona que mida <?php echo $altPersona ?> metros
            <?php if($altExtra!=''){?>
                    con una altura extra de <?php echo $altExtra ?> metros
            <?php } ?>
                es de <?php echo calcular($altPersona,$altExtra) ?>
                Km</div>
                <?php  clean()?>
       <?php } ?>  
           
        
</body>

</html>