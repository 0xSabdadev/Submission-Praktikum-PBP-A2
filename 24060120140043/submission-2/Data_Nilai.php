/*
Nama : Farid Khoirur Rizal
NIM  : 24060120140043
Lab  : A2
*/
<?php
$array_mhs = array(
    'Abdul' => array(89,90,54),
    'Budi' => array(98,65,74),
    'Nina' => array(67,56,84),
    );
    
    function hitung_rata($nilai)
    {
        $nilai = array_sum($nilai)/3;
        return $nilai;
    }
    
    function print_mhs($array_mhs)
    {
        foreach ($array_mhs as $nama => $valuekolom)
        {
            echo"<tr>";
            echo "<td> $nama </td>";
            echo "<td> $valuekolom[0] </td>";
            echo "<td> $valuekolom[1] </td>";
            echo "<td> $valuekolom[2] </td>";
            $nilai = array($valuekolom[0],$valuekolom[1],$valuekolom[2]);
            $rata2 = hitung_rata($nilai);
            echo "<td> $rata2 </td>";
            echo"</tr>";
        }
    }
    ?>
    
    <html>
    <body>
    </body>
    </html>
    
    <?php
    echo '<table border="1">';
    echo '<tr>
    <td>Nama</td>
    <td>Nilai 1</td>
    <td>Nilai 2</td>
    <td>Nilai 3</td>
    <td>Rata2</td>
    </tr>';
    
    print_mhs($array_mhs)
    ?>