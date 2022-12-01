<?php
    if ( isset($_GET["NIS"]) ){
        $NIS = $_GET["NIS"];
        $check_NIS = "SELECT * FROM datanilai WHERE NIS = '$NIS';";
        include('./nilairapor-config.php');
        $querry = mysqli_query($mysqli, $check_NIS);
        $row = mysqli_fetch_array($querry);
    }
?>

<h1>Edit Data</h1>
<form action="nilairapor-edit.php" method="POST">
    <label for="NIS"> NIS:</label>
    <input value="<?php echo $row["NIS"]; ?>" readonly type="number" name="NIS" placeholder="Ex. 12001142" /><br>

    <label for="namalengkap">Nama Lengkap :</label>
    <input value="<?php echo $row["namalengkap"]; ?>" type="text" name="namalengkap" placeholder="Ex. Alyael" /><br>

    <label for="jeniskelamin"> Jenis Kelamin:</label>
    <input value="<?php echo $row["jeniskelamin"]; ?>" type="text" name="jeniskelamin" placeholder="Perempuan" /><br>

    <label for="kelas"> Kelas :</label>
    <input value="<?php echo $row["kelas"]; ?>" type="number" name="kelas" placeholder="11 RPL 1" /><br> 

    <label for="kehadiran">  Kehadiran :</label>
    <input value="<?php echo $row["kehadiran"]; ?>" type="number" name="kehadiran" placeholder="Ex. 80" /><br>

    <label for="tugas"> Tugas :</label>
    <input value="<?php echo $row["tugas"]; ?>" type="number" name="tugas" placeholder="Ex. 80" /><br>

    <label for="PTS"> PTS:</label>
    <input value="<?php echo $row["PTS"]; ?>" type="number" name="PTS" placeholder="Ex. 80" /><br>

    <label for="PAS"> PAS:</label>
    <input value="<?php echo $row["PAS"]; ?>" type="number" name="PAS" placeholder="Ex. 80" /><br>

    <input type="submit" name="simpan" value="Simpan Data" />
    <a href="nilairapor.php">kembali</a>
</form>

<?php

    if (isset($_POST["simpan"])) {
        $NIS = $_POST["NIS"];
        $namalengkap = $_POST["namalengkap"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $kelas = $_POST["kelas"];
        $kehadiran = $_POST["kehadiran"];
        $tugas = $_POST["tugas"];
        $PTS = $_POST["PTS"];
        $PAS = $_POST["PAS"];


        $query ="
        UPDATE datanilai SET namalengkap = '$namalengkap',
        jenis kelamin = '$jeniskelamin',
        kelas = '$kelas',
        kehadiran = '$kehadiran',
        tugas = '$tugas',
        PTS = '$PTS'
        PAS = '$PAS'
        WHERE NIS = '$NIS';
    ";
        
        include ('./nilairapor-config.php');
        $update = mysqli_query ($mysqli, $query);


        if ($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='nilairapor.php';
                </script>
            ";
        }else {
            echo "
            <script>
                alert('Data Gagal');
                window.location='nilairapor-edit.php?NIS=$NIS';
            </script>
            ";
        }
    }
?>