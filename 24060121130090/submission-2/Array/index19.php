<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar numeric array PHP
Tanggal    : 9/9/2023
Nama file  : index19.php
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
            'des' => 'Desember');
        //menampilkan isi array
foreach($bulan as $kode_bulan => $nama_bulan){
    echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
}
?>