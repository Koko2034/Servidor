


    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Zero012</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #idDatos{
            float: left;
            width: 100%;
        }
        #idMunicipios{
            display: none;
            width: 50%;
            margin:0 auto;
        }
        #idProvincias{
            width: 50%;
            margin:0 auto;
        
        }
        #provincias{
            text-align:center;
            width:50%;
            margin:0 auto;
        }
    </style>
    </head>
    <?php 
    define(RUTA, __DIR__ . DIRECTORY_SEPARATOR);
        function getPronvicias() {
        $provincias = getCSV('provincias2.csv');
        return $provincias;
    }
    
    function getMunicipios($cdProvincia) {
        $municipios = getCSV('municipios2.csv');
        $municipios = array_filter($municipios, function($element) use ($cdProvincia) {
            return ($cdProvincia === substr($element["cd"], 0, 2));
        });
        return $municipios;
    }
    
    function getCSV($csv) {
        return array_map(function($value) {
            $columns = str_getcsv($value, ",");
            return array("cd" => $columns[0],
                "name" => $columns[1],
                "wiki" => $columns[2]);
        }, file($csv));
    }
    
    function getMunicipio($img) {
        if (!file_exists("./escudos/" . replaceCharacters($img) . "png")) {
            $resp = getImage($img);
           
            return ($resp["status"] === "ko") ? $resp["ruta"] : createImage($img);
        }
        return "./escudos/$img.png";
    }
    
    function getImage($img) {
        $html = file_get_contents("https://commons.wikimedia.org/wiki/File:Escudo_de_$img.svg");
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $nodeSrc = $xpath->evaluate("//img[contains(@src,'Escudo') and @srcset]");
        if ($nodeSrc->length === 0) {
            return array("status" => "ko",
                "ruta" => "./escudos/notfound.png");
        }
        
        file_put_contents(RUTA . "./escudos/$img.png", file_get_contents($nodeSrc->item(0)->getAttribute('src')));
    }
    
    function createImage($img) {
        $logo = ImageCreateFromPng("./escudos/header.png");
        $png_escudo = ImageCreateFromPng("./escudos/$img.png");
        $withEscudo = imagesx($png_escudo);
        $heightEscudo = imagesy($png_escudo);
        $heightLogo = imagesy($logo);
    
        $baseimagen = imagecreatetruecolor($withEscudo, $heightEscudo + $heightLogo);
        imagesavealpha($baseimagen, true);
        imagesavealpha($logo, true);
        imagesavealpha($png_escudo, true);
    
        $trans_background = imagecolorallocatealpha($baseimagen, 0, 0, 0, 127);
        imagefill($baseimagen, 0, 0, $trans_background);
        $black = ImageColorAllocate($baseimagen, 0, 0, 0);
        imagecolortransparent($baseimagen, $black);
        $text = str_replace("_", " ", $img);
        $text = replaceCharacters($text);
        imagestring($logo, imageloadfont('./latin2.gdf'), ($withEscudo / 4), 15, $text, $black);
        imagecopy($baseimagen, $logo, 0, 0, 0, 0, $withEscudo, $heightLogo);
        imagecopy($baseimagen, $png_escudo, 0, $heightLogo, 0, 0, $withEscudo, 900);
    
        $file = "./escudos/$text.png";
        imagepng($baseimagen, $file);
        ImageDestroy($logo);
        ImageDestroy($png_escudo);
        ImageDestroy($baseimagen);
        return $file;
    }
    
    function replaceCharacters($str) {
        $unwanted_array = array('Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');
        return strtr($str, $unwanted_array);
    }
    
    
    $provincias = getPronvicias();
    $pos_provincias= array_rand($provincias,1);
    $municipios = getMunicipios($provincias[$pos_provincias]['cd']);
    $pos_municipios = array_rand($municipios,5);
    ?>
    <body>
        <div class="container-fluid text-center" id="idDatos">
            <h1>Generador de escudos</h1>
            <div class="row">
                <div class="col-6 form-group" id="idProvincias">
                        <label>Provincias</label>
                    <input disabled class="form-control" id="provincias" value="<?php echo $provincias[$pos_provincias]['name'] ?>">  
            </div>
            </div> 
            <div class="row">
                <div class="col-6 form-group" id="idProvincias">
                       <br> <label>Municipios</label><br>
                <?php 
                    foreach($pos_municipios as $key => $value){
                       echo $municipios[$value]["name"]."................";
                        $imagen = str_replace(" ","_",$municipios[$value]["name"]);
                        $imagen = str_replace("-","_",$imagen);
                        ?><img width="60px" height="60px" src="<?php echo getMunicipio($imagen) ?>"><br><br><br><?php
                    }
               ?>
                      
            </div>
            </div> 
        </div>  
    </body>
    
    </html>