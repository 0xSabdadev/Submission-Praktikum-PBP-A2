<?php 
    $array_mhs = array('Abdul' => array(89,90,54),
                'Budi' => array(78,60,64),
                'Nina' => array(67,56,84),
                'Budi' => array(87,69,50),
                'Budi' => array(98,65,74)
                );
    
    // fungsi rata rata nilai
    function rataRataNilaiMhs($nilai){
        $sum = 0;
        for ($i = 0; $i <sizeof($nilai); $i++){
            $sum += $nilai[$i];
        }
        return $sum / sizeof($nilai);
    }

    function print_mhs($array_mhs){
        echo '<table border="1">';
        echo '<tr>
        <td>Nama</td>
        <td>Nilai 1</td>
        <td>Nilai 2</td>
        <td>Nilai 3</td>
        <td>Rata - Rata Nilai</td>
        </tr>';
        foreach ($array_mhs as $mahasiswa => $array_nilai){
            echo '<tr>';
            echo '<td>'.$mahasiswa.'</td>';
            for ($i = 0; $i <sizeof($array_nilai); $i++){
                echo '<td>'.$array_nilai[$i]. '</td>';
            }
            echo '<td>'.rataRataNilaiMhs($array_nilai).'</td>';
            echo '</tr>';
        }

    }

    print_mhs($array_mhs);
    // foreach ($array_mhs as $mahasiswa => $array_nilai){
    //     echo 'Nama Mahasiswa : ' .$mahasiswa. '<br />';
    //     for ($i = 0; $i <sizeof($array_nilai); $i++){
    //         echo 'Nilai ' .$i. '=' .$array_nilai[$i]. '<br />';
    //     }
    //     echo 'Rata - Rata Nilai :' .rataRataNilaiMhs($array_nilai). '<br />'; 
    // }


?>