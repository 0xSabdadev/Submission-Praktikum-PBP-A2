<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 9 September 2023 */

$harga = 1000;
echo '<table border="1">';
echo '<tr>
    <td>No</td>
    <td>Diskon</td>
    <td>Harga Setelah Diskon</td>
</tr>';

$i = 1;
while ($i <= 10) {
    echo '<tr>';
    echo '<td>' . $i . '</td>';
    $diskon = $i * 0.1;
    echo '<td>' . ($diskon * 100) . '% </td>';
    $harga_diskon = $harga - ($harga * $diskon);
    echo '<td>' . $harga_diskon . '</td>';
    echo '</tr>';

    $i++;
}

echo '</table>';