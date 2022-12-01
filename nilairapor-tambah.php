<h1>Tambah Data</h1>
<form action="nilairapor-tambah.php" method="POST">
    <label for="NIS">NIS : </label>
    <input type="number" name="NIS" placeholder="Ex. 12003102" /> <br>

    <label for="namalengkap">Nama Lengkap  : </label>
    <input type="text" name="namalengkap" placeholder="Ex. Alyael" /> <br>
    
    <label for="jeniskelamin">jenis Kelamin :</label>
    <input type="text" name="jeniskelamin" placeholder="Perempuan" /><br>

    <label for="kelas">Kelas :</label>
    <input type="text" name="kelas" placeholder="Ex. 11 RPL 1"><br>

    <label for="kehadiran">Nilai Kehadiran :</label>
    <input type="number" name="kehadiran" placeholder="Ex. 80"><br>

    <label for="tugas">Tugas :</label>
    <input type="number" name="tugas" placeholder="Ex. 80"><br>

    <label for="PTS">PTS :</label>
    <input type="number" name="PTS" placeholder="Ex. 80"><br>

    <label for="PTS">PAS :</label>
    <input type="number" name="PAS" placeholder="Ex. 80"><br>

    <input type="submit" name="simpan" value="Simpan Data" /> 
    <a href="nilairapor.php">Kembali</a>
</form>

<?php
    if( isset($_POST["simpan"]) ){
        $NIS = $_POST["NIS"];
        $namalengkap = $_POST["namalengkap"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $kelas = $_POST["kelas"];
        $kehadiran = $_POST["kehadiran"];
        $tugas = $_POST["tugas"];
        $PTS = $_POST["PTS"];
        $PAS = $_POST["PAS"];


        // CREATE - Menambahkan Data ke Database
        $query = "
                INSERT INTO datanilai VALUES
                ('$NIS', '$namalengkap', '$jeniskelamin', '$kelas', '$kehadiran', '$tugas', '$PTS', '$PAS');
            ";

            include ('./nilairapor-config.php');
            $insert = mysqli_query($mysqli, $query);


            if ($insert){
                echo "
                    <script>
                            alert('Data berhasil ditambahkan');
                            window.location='nilairapor.php';
                    </script>
                ";
            }
    }
?>