<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/validaciones.js"></script>

</head>
<body>
    <h1>FORMULARIO DE VOTACION</h1>

    <form method="post" onsubmit="return validarFormulario()">
        Nombre y Apellido: <input type="text" id="nombre_apellido" name="nombre_apellido"><br><br>

        Alias: <input type="text" id = "alias" name="alias"><br><br>

        Rut: <input type="text" id = "rut" name="rut"><br><br>

        Email: <input type="text" id = "email" name="email"><br><br>

        <label for="region">Región:</label>
    <select name="region">
    <option value="">Seleccione una región</option>
        <?php
            include("../config/conexion.php");
            $getregion = "SELECT * FROM region ORDER BY ID";
            $getregion1 = mysqli_query($conexion, $getregion);

            while($row = mysqli_fetch_array($getregion1)){
                $id = $row ['ID'];
                $nombre_region = $row['nombre'];
        ?>
        <option value="<?php echo  $id ?>"><?php echo  $nombre_region ?></option>
        <?php
            }
        ?>
    </select><br><br>

    <label for="comuna">Comuna:</label>
    <select name="comuna"></select><br><br>


        candidato :<select name="candidato">
        <option value="">Seleccione un candidato</option>

        <?php
        include("../config/conexion.php");
        $getcandidato = "SELECT * FROM candidato ORDER BY ID";
        $getcandidato1 = mysqli_query($conexion, $getcandidato);

        while($row = mysqli_fetch_array($getcandidato1)){
            $id = $row ['ID'];
            $nombre_candidato = $row['nombre'];
            ?>
            <option value="<?php echo $nombre_candidato ?>"><?php echo $nombre_candidato?></option>
            <?php
        }?>
        </select><br><br>

        como se entero :

        <?php
        include("../config/conexion.php");
        $getComoSeEntero = "SELECT * FROM como_se_entero ORDER BY ID";
        $getComoSeEntero1 = mysqli_query($conexion, $getComoSeEntero);

        while($row = mysqli_fetch_array($getComoSeEntero1)){
            $id = $row ['ID'];
            $metodo1 = $row['metodo'];
            ?>
            <input type="checkbox" name="metodo[]" value="<?php echo  $metodo1 ?>"><?php echo  $metodo1 ?>
            <?php
        }?>
        <br><br>
        <input type="submit" name = "guardar" value="votar">
    </form>

    <script>
    function validarRut(rut) {
        if (typeof rut !== 'string') {
            return false;
        }

        var regex = /^[0-9]+-[0-9kK]{1}$/;
        if (!regex.test(rut)) {
            return false;
        }

        var parts = rut.split('-');
        var dv = parts[1];
        var rutBody = parts[0];

        var suma = 0;
        var multiplo = 2;

        for (var i = rutBody.length - 1; i >= 0; i--) {
            suma += parseInt(rutBody.charAt(i)) * multiplo;
            multiplo = multiplo % 7 === 0 ? 2 : multiplo + 1;
        }

        var resto = suma % 11;
        var dvEsperado = 11 - resto;
        if (dvEsperado === 11) {
            dvEsperado = '0';
        } else if (dvEsperado === 10) {
            dvEsperado = 'K';
        }

        return dv.toString().toUpperCase() === dvEsperado.toString().toUpperCase();
    }

    function validarFormulario() {
        var rutInput = document.getElementById('rut').value;
        if (validarRut(rutInput)) {
            return true; // Permite enviar el formulario si el RUT es válido
        } else {
            alert('RUT inválido. Por favor, ingrese un RUT válido en el formato 12345678-9.');
            return false; // Evita que el formulario se envíe si el RUT es inválido
        }
    }
</script>



    <?php
    
        include("registrar.php");
    ?>




</body>
</html>