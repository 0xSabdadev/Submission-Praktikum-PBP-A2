<?php

$array_mhs = array('Abdul' => array(89,90,54),
    'Budi' => array(78,60,64),
    'Nina' => array(67,56,84),
    'Budi' => array(87,69,50),
    'Budi' => array(98,65,74)
);

function hitung_rata($array){
    $array = array_sum($array)/3;
    return $array;
}

function print_mhs($array_mhs){
    foreach($array_mhs as $key => $value){
        echo "<tr>";
        echo "<td> $key </td>";
        echo "<td> $value[0] </td>";
        echo "<td> $value[1] </td>";
        echo "<td> $value[2] </td>";
        $array = array($value[0],$value[1],$value[2]);
        $hasil = hitung_rata($array);
        echo "<td style='text-align: left;'> $hasil </td>";
        echo "</tr>";


    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas pertemuan 2</title>
    <style>
        th {
            text-align: left;
        }
    </style>
</head>

<body>
<table border="1">
    <tr>
        <tr>
            <th>Nama</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th>Nilai 3</th>
            <th>Rata2</th>
        </tr>
        <?php print_mhs($array_mhs) ?>
    </tr>
</table>
</body>

</html>