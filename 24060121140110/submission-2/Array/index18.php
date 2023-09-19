<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : implementasi modul pertemuan 2 (dasar PHP - numeric array)
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
        'sep' => 'Sepetember',
        'okt' => 'Oktober',
        'nov' => 'November',
        'des' => 'Desember'
    );

    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
?>