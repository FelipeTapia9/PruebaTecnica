<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>FORMULARIO DE VOTACION</h1>

    <form method="post">
        Nombre y Apellido: <input type="text" name="nombre_apellido" required ><br><br>

        Alias: <input type="text" name="alias"><br><br>

        Rut: <input type="text" name="rut"><br><br>

        Email: <input type="text" name="email"><br><br>

        region :<select name="region">
        <?php
        include("conexion.php");
        $getregion = "SELECT * FROM region ORDER BY ID";
        $getregion1 = mysqli_query($conexion, $getregion);

        while($row = mysqli_fetch_array($getregion1)){
            $id = $row ['ID'];
            $nombre_region = $row['nombre'];
            ?>
            <option value="<?php echo  $nombre_region ?>"><?php echo  $nombre_region ?></option>
            
            <?php
        }?>
        </select><br><br>

        comuna :<select name="comuna">
        <?php
        include("conexion.php");
        $getcomuna = "SELECT * FROM comuna ORDER BY ID";
        $getcomuna1 = mysqli_query($conexion, $getcomuna);

        while($row = mysqli_fetch_array($getcomuna1)){
            $id = $row ['ID'];
            $nombre_comuna = $row['nombre'];
            ?>
            <option value="<?php echo  $nombre_comuna?>"><?php echo $nombre_comuna?></option>
            <?php
        }?>
        </select><br><br>

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