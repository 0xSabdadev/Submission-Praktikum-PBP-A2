<!DOCTYPE html>
<html>
<head>
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <?php
        //Diketahui sebuah array mahasiswa :
        $array_mhs = array(
            'Abdul' => array(89,90,54),
            'Budi' => array(98,65,74),
            'Nina' => array(67,56,84)
        );

        //fungsi menghitung rata-rata nilai tiap mahasiswa :
        function hitung_rata($array){
            $a = sizeof($array);
            $jml = 0;
            for ($i=0; $i < $a; $i++) { 
                $jml = $jml + $array[$i];
            }
            $rataan = $jml / $a;
            return $rataan;

        }
        echo '<h1 align="center">Data Nilai Mahasiswa</h1>';
        //Membuat kolom tabel nilai mahasiswa :
        echo '<table border = "1" width=500 align="center">';
            echo '<tr align="center" style="background-color:lightblue;">
                <td> Nama    </td>
                <td> Nilai 1 </td>
                <td> Nilai 2 </td>
                <td> Nilai 3 </td>
                <td> Rata2   </td>
            </tr>';

            //fungsi menampilkan data mahasiswa yang ada pada array_mhs
            function print_mhs($array_mhs){
                foreach($array_mhs as $nama => $nilai){
                    echo '<tr align="center" style="background-color:lightyellow;">';
                    echo '<td>'.$nama.'</td>';
                    $a = sizeof($nilai);
                    for ($i = 0; $i < $a; $i++) { 
                        echo '<td>'.$nilai[$i].'</td>';
                    }
                    echo '<td>'.hitung_rata($nilai).'</td>';
                    echo '</tr>';
                }
            }

            print_mhs($array_mhs);
        echo '</table>';
        
    ?>
</body>
</html>