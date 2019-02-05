<?php

if(isset($_POST["enviar"])){
    require_once("conexion.php");
    require_once("funcion.php");
    
    $archivo = $_FILES["archivo"]["name"];
    $archivo_copiado = $_FILES["archivo"]["tmp_name"]; 
    $archivo_guardado = "copia_".$archivo;
    //echo $archivo."esta en la ruta temporal: " .$archivo_copiado;
    
    if(copy($archivo_copiado, $archivo_guardado)){
        echo "se copio correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
    }else{
        echo "hubo un error<br/>";
    }
    
    if(file_exists($archivo_guardado)){
        
        $fp = fopen($archivo_guardado, "r");
        
        $rows = 0;
        while($datos = fgetcsv($fp, 24012, ";")){
            //echo $datos[0]." ".$datos[1]." ".$datos[2]." ".$datos[3]." ".$datos[4]." ".$datos[5]." ".$datos[6]."<br/>";
            $rows ++;
            
            if($rows > 1){
                $resultado = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6]);
            if($resultado){
                echo "se inserto <br/>";
            }else{
                echo "hubo un error no se inserto <br/>";
            }
        }
        }
    }else{
        echo("no existe el archivo copiado<br/>");
    }
    
   
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datos Abiertos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos_responsive.css">
    <link rel="stylesheet" href="CSS/estilo_fromlogin.css">
    <link rel="stylesheet" href="CSS/estilo_header.css">
</head>
<body>
    
       <header>
        <a href="#"><img src="IMAGENES/logo.jpg" alt=""   width="150px" height="80px" class="logo"></a>
        <nav>
            <ul>
            <li><a href="index.php" class="list-item">Inicio</a></li>
            <li><a href="PAGINAS/graficas.php" class="list-item">Graficas</a></li>
            </ul>
        </nav>
    </header>
 
        
    <div class="contenedor">
        <section class="main">
        <center><img src="IMAGENES/csv_mysql.jpg" alt=""   width="500px" height="200px"></center>
        <article>

        </article>
        <br>
        <br>

        </section>
     
        <aside>
            <div class="formulario">
               <form action="index.php" class="formulariocompleto" method="post" enctype="multipart/form-data">
                   <input type="file" name="archivo" class="form-control"/>
                   <br/>
                   <br/>
                   <br/>
                   <input type="submit" value="SUBIR ARCHIVO" name="enviar">
               </form>

            </div>
   
        </aside>

        

        <?php require 'PAGINAS/footer.php' ?>
    </div>

</body>
</html>