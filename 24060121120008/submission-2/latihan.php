<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 10 September 2023
     Lab        : PBP A2
 -->

<?php
    //array mahasiswa
    $array_mhs = array('Abdul' => array(89,90,54),
                        'Budi' => array(78,60,64),
                        'Nina' => array(67,56,84),
                        'Budi' => array(87,69,50),
                        'Budi' => array(98,65,74)
                        );

    //fungsi menghitung rata-rata nilai mahasiswa
    function hitung_rata($array){
        $n = sizeof($array);
        $mean = 0;
        for ($i = 0;$i <= ($n-1);$i++){
            $mean = $array[$i] + $mean;
        }
        $mean = $mean / $n;
        return $mean;
    }

    //fungsi untuk menampilkan table nilai dan rata rata setiap mahasiswa dalam tabel
    function print_mhs($array_mhs){
        echo '<table border = "1">';
        echo '<tr>
                <td>Nama</td>
                <td>Nilai 1</td>
                <td>Nilai 2</td>
                <td>Nilai 3</td>
                <td>Rata2</td>
        </tr>';

        foreach ($array_mhs as $nama_mhs => $nilai){
            echo '<tr>';
            echo '<td>'.$nama_mhs.'</td>';
            echo '<td>'.$nilai[0].'</td>';
            echo '<td>'.$nilai[1].'</td>';
            echo '<td>'.$nilai[2].'</td>';
            $nilai_rata = hitung_rata($nilai);
            echo '<td>'.$nilai_rata.'</td>';
            echo '</tr>';
            }
            echo '</table>';
    }

    //pemanggilan fungsi print_mahasiswa
    print_mhs($array_mhs);

?>