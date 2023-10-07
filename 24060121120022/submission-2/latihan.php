<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : Latihan modul pertemuan 2 SINTAKS DASAR PHP
-->

<?php  
    $array_mhs = array('Abdul' => array(89,90,54),
                        'Budi' => array(78,60,64),
                        'Nina' => array(67,56,84),
                        'Budi' => array(87,69,50),
                        'Budi' => array(98,65,74));
    function hitung_rata($array){
        $rata = 0;
        foreach ($array as $nilai){
            $rata += $nilai;
        }
        $rata = $rata/count($array);
        return $rata;
    }

    echo '<table border="1">';
    echo '<tr><th>Nama</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata-rata</th></tr>';
    foreach ($array_mhs as $nama => $nilai){
        echo '<tr>';
        echo '<td>'.$nama.'</td>';
        foreach ($nilai as $nilai_per_mata_kuliah){
            echo '<td>'.$nilai_per_mata_kuliah.'</td>';
        }
        echo '<td>'.hitung_rata($nilai).'</td>';
        echo '</tr>';
    }
?>
