<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="validaciones.js"></script>

    <script>
        $(document).ready(function(){
            $("select[name='region']").change(function(){
                var regionId = $(this).val();
                $.ajax({
                    url: 'get_comunas.php', // Ruta a tu script PHP que obtiene comunas
                    type: 'GET',
                    data: { region_id: regionId },
                    success: function(response) {
                        $("select[name='comuna']").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    

</head>
<body>
    <h1>FORMULARIO DE VOTACION</h1>

    <form method="post">
        Nombre y Apellido: <input type="text" id="nombre_apellido" name="nombre_apellido"><br><br>

        Alias: <input type="text" id = "alias" name="alias"><br><br>

        Rut: <input type="text" id = "rut" name="rut"><br><br>

        Email: <input type="text" id = "email" name="email"><br><br>

        <label for="region">Región:</label>
    <select name="region">
    <option value="">Seleccione una región</option>
        <?php
            include("conexion.php");
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

        <?php
        include("conexion.php");
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
        include("conexion.php");
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

    <?php
    
        include("registrar.php");
    ?>


</body>
</html>