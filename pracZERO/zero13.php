

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <style>
        body,
        html {
            height: 100%;
            background-repeat: no-repeat;
            background-color: #d3d3d3;
            font-family: 'Oxygen', sans-serif;
        }

        .main {
            margin-top: 70px;
        }

        h1.title {
            font-size: 50px;
            font-family: 'Passion One', cursive;
            font-weight: 400;
        }

        hr {
            width: 10%;
            color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 15px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 11px;
            padding-top: 3px;
        }

        .main-login {
            background-color: #fff;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .main-center {
            margin-top: 30px;
            margin: 0 auto;
            max-width: 330px;
            padding: 40px 40px;
        }

        .login-button {
            margin-top: 5px;
        }

        .login-register {
            font-size: 11px;
            text-align: center;
        }
    </style>
</head>
<?php


?>
<?php 
          function isLogin ($name,$pass,$users){
            $mensaje="";
            foreach($users as $user){
                if($user["name"]===$name && $user["passwd"]===$pass){
                    $mensaje =$user["frase"];
                    $foto = $user["foto"]; 
                }   
            }
            return array("mensaje"=>$mensaje,"foto"=>$foto);
            
        }
?>


<?php
$users = array( 0 => array( "name" => "javi", 
                            "passwd" => "javi", 
                            "frase" => "todo es susceptible de empeorar", 
                            "foto"=>base64_encode(file_get_contents('https://nortegrancanaria.es/portal/components/com_k2/images/placeholder/user.png'))),
                1 => array( "name" => "raul",
                            "passwd" => "raul",
                            "frase" => "la vida son dos birras", 
                            "foto"=>base64_encode(file_get_contents('https://www.atomix.com.au/media/2015/06/atomix_user31.png'))),
                2 => array( "name" => "ismael", 
                            "passwd" => "ismael", 
                            "frase" => "si la vida te la limones....haz limonada",
                            "foto"=>base64_encode(file_get_contents('http://www.jampakbooks.com/images/avatar.png'))),
                3 => array( "name" => "ramses", 
                            "passwd" => "ramses", 
                            "frase" => "ya esta todo listo",
                            "foto"=>base64_encode(file_get_contents('https://cdn0.iconfinder.com/data/icons/PRACTIKA/256/user.png'))));

?>
<body>

<?php if($_POST['backLogin']=='backLogin'){
   unset($_POST);
   $host  = $_SERVER['HTTP_HOST'];
   $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   $extra = 'zero13.php';
   header("Location: http://$host$uri/$extra");

}?>
    <div class="container">
    <!--script src="../js/boral.js"></script-->
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Login</h1>
                </div>
            </div>
            <div class="main-login main-center">
                <form class="form-horizontal" method="post" action="zero13.php" enctype="multipart/form-data">
                <?php if(empty($_POST)){ ?>
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name" required placeholder="Escribe tu nombre" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Contraseña :</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Escribe tu contraseña" />
                            </div>
                        </div>
                    </div>
                        <div class="form-group ">
                        <input id="logear" type="submit" name="Logear" value="Logear" class="btn btn-primary btn-lg btn-block login-button">
                    </div>
               <?php     } ?>
               <?php 
               if(!empty($_POST['Logear'])){
               
                     $info = isLogin($_POST['name'],$_POST['password'],$users);
                     if($info['mensaje']==""){ ?> 
                     <input id="backLogin" type="submit" name="backLogin" value="backLogin" class="btn btn-primary btn-lg btn-block login-button">
                     <?php }
                     else{
                        ?><img width="50px" height="50px" src="data:image/png;base64,<?php echo $info['foto'] ?>">
                       <?php     echo "  Hola ".$_POST['name'].", tu frase de entrada es: ". $info['mensaje'];
                     }
               }
               
                    ?>
                </form>
                
            </div>

        </div>
    </div>
</body>

</html>