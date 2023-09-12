<?php
    function print_mhs($nama,$nim,$prodi){
        echo 'Nama: '.$nama.'<br />';
        echo 'NIM: '.$nim.'<br />';
        echo 'Prodi: '.$prodi.'<br />';
        }
        print_mhs('Alfa','123456123','Ilmu Komputer/ Informatika');
?>

<?php
    function hitung_diskon($harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
        }
        
        $harga = 10000;
        $diskon = 20;
        $harga_diskon = hitung_diskon($harga,$diskon);
        echo 'Harga sebelum diskon = '.$harga.'<br />';
        echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
?>

<?php
    function hitung_diskon2($harga,$diskon=10){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
        }
        
        $harga = 10000;
        $harga_diskon = hitung_diskon2($harga);
        echo 'Harga sebelum diskon = '.$harga.'<br />';
        echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
?>

<?php
    function hitung_diskon3(&$harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
        }
        
        $harga = 10000;
        $diskon = 20;
        echo 'Harga sebelum diskon = '.$harga.'<br />';
        hitung_diskon3($harga,$diskon);
        echo 'Harga setelah diskon = '.$harga.'<br />';
?>

<?php
    function faktorial($n) {
        if($n == 0){
            return 1;
        }else{
            return $n * faktorial($n-1);
        }
    }
?>