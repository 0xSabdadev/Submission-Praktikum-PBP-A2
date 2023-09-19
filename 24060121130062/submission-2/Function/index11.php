<!-- 
File      : index11.php		10/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - function)
-->

<?php
    //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
    function print_mhs($nama,$nim,$prodi){
        echo 'Nama: '.$nama.'<br />';
        echo 'NIM: '.$nim.'<br />';
        echo 'Prodi: '.$prodi.'<br />';
    }

    print_mhs('Varrel','24060121130062','Ilmu Komputer/ Informatika');
?>