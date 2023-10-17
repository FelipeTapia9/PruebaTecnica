<?php
include("conexion.php");


if (isset($_POST['guardar'])){
    if(
    
        strlen($_POST['nombre_apellido']) >= 1 &&
        strlen($_POST['alias']) >= 1 &&
        strlen($_POST['rut']) >= 1 &&
        strlen($_POST['email']) >= 1 && 
        strlen($_POST['region']) >= 1 &&
        strlen($_POST['comuna']) >= 1 &&
        strlen($_POST['candidato']) >= 1
        
    ){
            $nombre_apellido = trim($_POST['nombre_apellido']);
            $alias = trim($_POST['alias']);
            $rut = trim($_POST['rut']);
            $email = trim($_POST['email']);
            $region = trim($_POST['region']);
            $comuna = trim($_POST['comuna']);
            $candidato = trim($_POST['candidato']);
            $ComoSeEntero = is_array($_POST['metodo']) ? implode(", ", $_POST['metodo']) : '';

            
            $consulta = "INSERT INTO persona(nombre_apellido, alias, rut, email, region, comuna, candidato, como_se_entero	)
                values ('$nombre_apellido','$alias','$rut','$email','$region','$comuna','$candidato','$ComoSeEntero')";
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado){
                ?>
                <h3 class = "success">registro completado</h3>
                <?php
            }else{
                ?>
                <h3 class="error">ocurrio un error</h3>
                <?php }
        }else{
            ?>
            <h3 class="error">llena todos los campos</h3>
            <?php
        
    }
}

?>