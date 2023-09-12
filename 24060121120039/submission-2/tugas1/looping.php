<?php 
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr>
    <td>No</td>
    <td>Diskon</td>
    <td>Harga Setelah Diskon</td>
    </tr>';
    for ($i=1;$i<=10;$i++){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<br />While-do';
    echo '<table border="1">';
    echo '<tr>
    <td>No</td>
    <td>Diskon</td>
    <td>Harga Setelah Diskon</td>
    </tr>';
    $a = 1;
    while ($a<=10){
        echo '<tr>';
        echo '<td>'.$a.'</td>';
        $diskon = $a * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
        $a++;
    }
    echo '</table>';


    echo '<br />Do - While';
    echo '<table border="1">';
    echo '<tr>
    <td>No</td>
    <td>Diskon</td>
    <td>Harga Setelah Diskon</td>
    </tr>';
    $a = 1;
    do {
        echo '<tr>';
        echo '<td>'.$a.'</td>';
        $diskon = $a * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
        $a++;
    }while ($a <= 10);
    echo '</table>';
?>

