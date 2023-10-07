<!-- Nama: Fitra Syamli Yudhisaputra -->
<!-- NIM: 24060121140124 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi: Implementasi Code Modul Praktikum 2 -->
<!-- Tanggal: 11/09/2023 -->

<?php
    function faktorial($n)
    {
        if($n == 0){
            return 1;
        }else{
            return $n * faktorial($n-1);
        }
    }
?>