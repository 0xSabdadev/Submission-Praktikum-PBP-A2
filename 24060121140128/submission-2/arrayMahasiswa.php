<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Mahasiswa</title>
</head>
<body>
    <h2>Array Mahasiswa</h2>
    <?php
        $array_mhs = array('Abdul' => array(89,90,54),
                        'Budi' => array(78,60,64),
                        'Nina' => array(67,56,84),
                        'Budi' => array(87,69,50),
                        'Budi' => array(98,65,74)
        );

        echo '<table border="2">';
        echo '<tr>
            <td>Nama</td>
            <td>Nilai1</td>
            <td>Nilai2</td>
            <td>Nilai3</td>
            <td>Rata2</td>
          </tr>';

        function hitung_rata($array) {
            $size = sizeof($array);
            $sum = 0;
            for($i = 0; $i < $size; $i++) {
                $sum = $sum + $array[$i];
            }
            return($sum/$size);
        }

        function print_mhs($array_mhs){
            foreach($array_mhs as $nama => $nilai) {
                echo '<tr>';
                echo '<td>'.$nama.'</td>';
                echo '<td>'.$nilai[0].'</td>';
                echo '<td>'.$nilai[1].'</td>';
                echo '<td>'.$nilai[2].'</td>';
                echo '<td>'.hitung_rata($nilai).'</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        print_mhs($array_mhs);
    ?>
</body>
</html>