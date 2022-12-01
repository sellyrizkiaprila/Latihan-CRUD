<?php 
include ('./nilairapor-config.php');
$data=mysqli_query($mysqli,"DELETE FROM datanilai WHERE NIS='".$_GET["NIS"]."'");
header("location:nilairapor.php");
?>