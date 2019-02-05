<?php
function insertar_datos($ciudad, $sexo, $edad, $seguro, $asisteClases, $razon, $nivel_instru){
    
    global $conexion;
    $sentencia = "INSERT INTO `poblacion`(`ciudad`, `sexo`, `edad`, `seguro`,`asisteClases`, `razon`, `nivel_instru`) VALUES ('$ciudad', '$sexo', $edad, '$seguro', '$asisteClases', '$razon', '$nivel_instru')";
    $ejecutar= mysqli_query($conexion,$sentencia);
        return $ejecutar;
}
?>