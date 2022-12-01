<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./nilairapor-config.php');
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
            
        </tr> 
             
      ";
      $no++;
    }
    $waktu_cetak = date('d M Y - H:i:s');
    $table = "
    <h1>Laporan catatan nilai rapor</h1>
    <h6>Waktu Cetak : $waktu_cetak</h6>
        <table widht='100%' cellpadding=5 border=1 cellspacing=0>
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

    $mpdf->WriteHTML("$table");
    $mpdf->Output();