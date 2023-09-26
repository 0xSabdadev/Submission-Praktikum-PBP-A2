<?php
    //assignment menggunakan fungsi array
    $bulan = array('jan' => 'Januari', 
    'feb' => 'Februari',
    'mar' => 'Maret',
    'apr' => 'April',
    'mei' => 'Mei',
    'jun' => 'Juni',
    'jul' => 'Juli',
    'agu' => 'Agustus',
    'sep' => 'Sepetember',
    'okt' => 'Oktober',
    'nov' => 'November',
    'des' => 'Desember');
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    //sort the array using sort()
    $bulan_sort = $bulan;
    sort($bulan_sort);
    echo "Sorted using sort(): ";
    foreach ($bulan_sort as $val) {
        echo "$val ";
    }

    //sort the array using asort()
    asort($bulan);
    echo "<br>Sorted using asort(): ";
    foreach ($bulan as $key => $val) {
        echo "$key: $val ";
    }

    //sort the array using ksort()
    ksort($bulan);
    echo "<br>Sorted using ksort(): ";
    foreach ($bulan as $key => $val) {
        echo "$key: $val ";
    }

?>