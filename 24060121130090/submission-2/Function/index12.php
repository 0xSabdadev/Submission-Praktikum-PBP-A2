<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar fungsi PHP
Tanggal    : 9/9/2023
Nama file  : index12.php
-->

<?php
    //contoh prosedur
    function print_mhs($nama, $nim, $prodi){
        echo 'Nama : '.$nama.'<br />';
        echo 'NIM : '.$nim.'<br />';        
        echo 'Prodi : '.$prodi.'<br />';
    }

    print_mhs('Alfa', '123456', 'Ilmu Komputer/ Informatika');
?>