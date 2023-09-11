<!-- 
File      : mahasiswa.php		10/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : Latihan modul pertemuan 2 (dasar PHP - implementasi modul khususnya loop dan function)
-->



<?php
    $array_mhs = array('Abdul' => array(89,90,54),
        'Budi' => array(78,60,64),
        'Nina' => array(67,56,84),
        'Budi' => array(87,69,50),
        'Budi' => array(98,65,74)
    );

    echo '<table border="1">';
    echo '<tr>
        <td>Nama</td>
        <td>Nilai 1</td>
        <td>Nilai 2</td>
        <td>Nilai 3</td>
        <td>Rata2</td>
    </tr>';

    function hitung_rata($array) {
        $rata2 = ($array[0] + $array[1] + $array[2]) / 3;
        echo '<td>'.$rata2.'</td>';
    }

    foreach ($array_mhs as $nama => $nilai){
        echo '<tr>';
        echo '<td>'.$nama.'</td>';
        echo '<td>'.$nilai[0].'</td>';
        echo '<td>'.$nilai[1].'</td>';
        echo '<td>'.$nilai[2].'</td>';
        $rata2 = hitung_rata($nilai); // Hitung rata-rata untuk setiap mahasiswa
        echo '<td>'.$rata2.'</td>';
        echo '</tr>';
    }
?>

