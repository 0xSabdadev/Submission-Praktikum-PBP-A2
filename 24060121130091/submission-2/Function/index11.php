<!-- 
File      : index11.php		11/09/23
Penulis   : Fa'iq Rindha Maulana / 24060121130091
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - function)
-->

<?php
    //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
    function print_mhs($nama,$nim,$prodi){
        echo 'Nama: '.$nama.'<br />';
        echo 'NIM: '.$nim.'<br />';
        echo 'Prodi: '.$prodi.'<br />';
    }

    print_mhs('Faiq Rindha Maulana','24060121130091','Ilmu Komputer/ Informatika');
?>