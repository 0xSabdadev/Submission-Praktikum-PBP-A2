<!-- Nama: Fitra Syamli Yudhisaputra -->
<!-- NIM: 24060121140124 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi: Membuat fungsi print_mhs($array_mhs) untuk menampilkan data mahasiswa -->
<!-- Tanggal: 09/09/2023 -->

<?php
$array_mhs = array(
'Abdul' => array(89,90,54),
'Budi' => array (78,60,64),
'Nina' => array (67,56,84),
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
        echo "<td> $hasil </td>";
        echo "</tr>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<header>
    <title>Tugas Pertemuan 2</title>
    <style>
        th{
            text-align: left;
        }
    </style>
</header>

<body>
<table border="1">
    <tr>
        <tr>
            <td>Nama</td>
            <td>Nilai 1</td>
            <td>Nilai 2</td>
            <td>Nilai 3</td>
            <td>Rata2</td>
        </tr>
        <?php print_mhs($array_mhs) ?>
    </tr>
</table>
</body>

</html>