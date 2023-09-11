<!-- Nama: Sheva Ivanda Pratama
NIM : 24060120140089
Lab : A2 -->
<?php
$array_mhs = array('Abdul' => array(89,90,54),
'Budi' => array(78,60,64),
'Nina' => array(67,56,84),
'Budi' => array(87,69,50),
'Budi' => array(98,65,74)
);

function hitung_rata($array){
//menghitung nilai rata-rata dari elemen array
    $hasil = 0;
    for($i=0;$i<count($array);$i++){
        $hasil += $array[$i];
    }
    return $hasil/count($array);
}

function print_mhs($array_mhs){
//menampilkan nilai dalam bentuk tabel
    foreach($array_mhs as $nama => $nilai){
        echo '<tr>';
        echo '<td>'.$nama.'</td>';
        for ($j=0; $j<count($array_mhs[$nama]); $j++){
            echo '<td>'.$array_mhs[$nama][$j].'</td>';
        }
        echo '<td>'.hitung_rata($array_mhs[$nama]).'</td>';
        echo '</tr>';
    }
}

echo '<table border = "1">';
echo '<tr> 
        <td>Nama</td>
        <td>Nilai 1</td>
        <td>Nilai 2</td>
        <td>Nilai 3</td>
        <td>Rata2</td>
</tr>';

print_mhs($array_mhs);
?>