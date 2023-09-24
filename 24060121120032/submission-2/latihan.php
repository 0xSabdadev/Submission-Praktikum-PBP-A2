<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan ke-2</title>
</head>
<body>
<?php
    $array_mhs = array ('Abdul' => array(89,90,54),
                'Budi' => array(78,60,64),
                'Nina' => array(67,56,84),
                'Budi' => array(87,69,50),
                'Budi' => array(98,65,74),
    );
    function hitung_rata($array) {
        $jml = (($array[0]+$array[1]+$array[2])/3);
        echo '<td>'.$jml.'</td>';
    }
    function print_mhs($array_mhs) {
        echo '<table border="1">';
        echo '<tr>
                <td>Nama</td>
                <td>Nilai 1</td>
                <td>Nilai 2</td>
                <td>Nilai 3</td>
                <td>Rata2</td>
            </tr>';

            foreach($array_mhs as $mahasiswa => $value){
                echo '<tr>';
                echo '<td>'.$mahasiswa.'</td>';

                echo '<td>'.$value[0].'</td>';
                echo '<td>'.$value[1].'</td>';
                echo '<td>'.$value[2].'</td>';
                hitung_rata($value);
                echo '</tr>';
            }
            echo '</table>';
            echo '<br>';
    }
    print(print_mhs($array_mhs));
?>
</body>
</html>