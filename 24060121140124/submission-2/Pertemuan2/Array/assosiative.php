<!-- Nama: Fitra Syamli Yudhisaputra -->
<!-- NIM: 24060121140124 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi: Implementasi Code Modul Praktikum 2 -->
<!-- Tanggal: 11/09/2023 -->

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