<?php
    function calcular($altPersona,$altExtra){
        $vision =(sqrt((2 * ($altPersona+$altExtra) * _RADIO) + pow(($altPersona+$altExtra),2))/1000);
        return round($vision,2);
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
    
    </style>
    <title>Zero11</title>
</head>
<body>
    <div class= "container divDatos">
        <label class="control-label titulo text-center">Calcula tu distancia al horizonte</label>
        <form action="" method="POST">
            <div class="form-group"> <!-- Full Name -->
                <label for="txtAltura" class="control-label">Altura Persona( metros )</label>
                <input type="number" min="0" required="required" class="form-control" id="txtAltura" name="txtAltura">
            </div>  
        <div class="form-group"> <!-- Street 1 -->
            <label for="txtExtra" class="control-label">Altura Extra</label>
            <input type="number" class="form-control" id="txtExtra" name="txtExtra">
        </div>
        <div class="form-group text-center"> <!-- Submit Button -->
            <input type="submit" class="btn btn-primary btnEnviar" name="calcular" id="calcular" value="Calcular">
        </div>
        </form> 
    <div>
        <?php define(_RADIO,63710000);?>
        <?php $altPersona=$_POST['txtAltura']; ?>
        <?php $altExtra =$_POST['txtExtra']; ?>
        <?php if($_POST['calcular']!='calcular' && $_POST['txtAltura']!=''){?>
        <br><label for="txtResultado" class="control-label">La distancia que 
            podra ver una persona que mida <?php echo $altPersona ?>
        <?php if($altExtra!=''){?>
            con una altura extra de <?php echo $altExtra ?>

        <?php } ?>
            es de <?php echo calcular($altPersona,$altExtra) ?>
             Km
       <?php } ?>        
        
</body>

</html>