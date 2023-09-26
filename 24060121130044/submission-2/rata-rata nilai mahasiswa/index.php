<!-- 
  Nama : Reza Hilmi Dafa 
  NIM  : 24060121130044
  Lab  : PBP A2
-->
<?php
  $array_mhs = ['Abdul' => [89,90,54],
                'Budi' => [78,60,64],
                'Nina' => [67,56,84],
                'Budi' => [87,69,50],
                'Budi' => [98,65,74]];

  function hitung_rata($nilai) {
    $jumlah = count($nilai);
    $total = array_sum($nilai);
    return $total / $jumlah;
  }

  function print_mhs($array_mhs) {
  echo '<table border="1">';
  echo '<tr>
          <td>Nama</td>
          <td>Nilai 1</td>
          <td>Nilai 2</td>
          <td>Nilai 3</td>
          <td>Rata-rata</td>
        </tr>';
  foreach($array_mhs as $Nama => $Nilai) {
    echo '<tr>';
    echo '<td>'.$Nama.'</td>';
    echo '<td>'.$Nilai[0].'</td>';
    echo '<td>'.$Nilai[1].'</td>';
    echo '<td>'.$Nilai[2].'</td>';
    echo '<td>'.hitung_rata($Nilai).'</td>';
  }
  echo '</table>';
  }
  print_mhs($array_mhs);
  ?>