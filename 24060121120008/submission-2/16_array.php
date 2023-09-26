<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 10 September 2023
     Lab        : PBP A2
 -->
 
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
                'sep' => 'September',
                'okt' => 'Oktober',
                'nov' => 'November',
                'des' => 'Desember');

    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
?>