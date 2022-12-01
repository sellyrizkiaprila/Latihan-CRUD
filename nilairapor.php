<?php 
      include('./nilairapor-config.php');
      if ( $_SESSION ["login"] != TRUE){
            header ('location:login.php');
      }

      echo "<div class='container'>";

      echo " SELAMAT DATANG, ".$_SESSION['username'] . "<br>";
      echo "ANDA SEBAGAI: ".$_SESSION['role'];
      echo "<hr>";



      echo "<a class='btn btn-sm btn-secondary' href='logout.php'>logout</a>";
      echo "<hr>";

      echo "<a class='btn btn-sm btn-primary' href='nilairapor-tambah.php'>Tambah Data</a>";
      echo "<hr>";
      
      echo "<a class='btn btn-sm btn-warning' href='nilairapor-pdf.php'>Cetak PDF</a>";
      echo "<hr>";

    // Menampilkan data nilai database
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli," SELECT * FROM datanilai ");
    while($row = mysqli_fetch_array($data)){

        $tabledata .= "
            <tr>
                <td>".$row["NIS"]."</td>
                <td>".$row["namalengkap"]."</td>
                <td>".$row["jeniskelamin"]."</td>
                <td>".$row["kelas"]."</td>
                <td>".$row["kehadiran"]."</td>
                <td>".$row["tugas"]."</td>
                <td>".$row["PTS"]."</td>
                <td>".$row["PAS"]."</td>
                <td>
                    <a href='nilairapor-edit.php?NIS=".$row["NIS"]."'>Edit</a>
                    &nbsp;-&nbsp;
                    <a href='nilairapor-hapus.php?NIS=".$row["NIS"]."'
                    onclick='return confirm(\"Hapus?\");'>Hapus</a>
                </td>
            </tr>
        ";
        $no++;
    }

    echo "
        <table cellpadding=5 border=1 cellspacing=0>
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Jenis kelamin</th>
                <th>Kelas</th>
                <th>Kehadiran</th>
                <th>Tugas</th>
                <th>PTS</th>
                <th>PAS</th>
                <th>Aksi</th>
            </tr>
            $tabledata
        </table>
    ";
?>