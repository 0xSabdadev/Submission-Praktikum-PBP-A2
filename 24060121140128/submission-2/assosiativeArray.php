<?php
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
    
    foreach($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    asort($bulan);
    echo '<br>Setelah diurutkan berdasarkan nilai menggunakan asort():<br>';
    foreach ($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    ksort($bulan);
    echo '<br>Setelah diurutkan berdasarkan kunci menggunakan ksort():<br>';
    foreach ($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
?>