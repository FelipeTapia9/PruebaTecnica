<?php
include("../config/conexion.php");

if (isset($_GET['region_id'])) {
    $regionId = $_GET['region_id'];
    $getcomuna = "SELECT * FROM comuna WHERE region_id = $regionId ORDER BY ID";
    $getcomuna1 = mysqli_query($conexion, $getcomuna);

    $comunaOptions = "";
    while($row = mysqli_fetch_array($getcomuna1)){
        $id = $row ['ID'];
        $nombre_comuna = $row['nombre'];
        $comunaOptions .= "<option value='$id'>$nombre_comuna</option>";
    }
    echo $comunaOptions;
}
?>
