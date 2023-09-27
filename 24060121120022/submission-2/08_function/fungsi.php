<!DOCTYPE html>
<html>
    <head>
        <title>Function</title>
    </head>
    <body>
        <?php
            //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
            function print_mhs($nama, $nim, $prodi){
                echo 'Nama: '.$nama.'<br />';
                echo 'NIM: '.$nim.'<br />';
                echo 'Prodi: '.$prodi.'<br />';
                }

            print_mhs('Alfa','123456123','Ilmu Komputer/ Informatika');

            //contoh fungsi untuk menghitung harga setelah diskon

            //fungsi dengan parameter input: harga dan diskon
            /*User harus memberikan nilai pada kedua parameter 
            setiap kali memanggil fungsi ini.*/
        
            function hitung_diskon($harga, $diskon){
                $harga = $harga - ($harga* $diskon/100);
                return $harga;
            }

            //contoh pemanggilan fungsi
            $harga = 10000;
            $diskon = 20;
            $harga_diskon = hitung_diskon($harga,$diskon);
            echo 'Harga sebelum diskon = '.$harga.'<br />';
            echo 'Harga setelah diskon = '.$harga_diskon.'<br />';

            //parameter input: harga dan diskon (nilai default=10)
            /*jika pengguna tidak menyediakan nilai $diskon saat 
            memanggil fungsi ini, maka fungsi akan menggunakan 
            nilai default 10. Jika pengguna memberikan nilai 
            $diskon, maka nilai default akan digantikan */
            
            function hitung_diskon2($harga,$diskon=10){
                $harga = $harga - ($harga*$diskon/100);
                return $harga;
            }

            //contoh pemanggilan fungsi
            $harga = 10000;
            $harga_diskon = hitung_diskon2($harga);
            echo 'Harga sebelum diskon = '.$harga.'<br />';
            echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
            
            //harga sebagai parameter input dan output
            /*hasil perubahan $harga akan terlihat di luar fungsi 
            sehinnga mengizinkan perubahan variabel asli yang 
            dilewatkan ke dalam fungsi.*/

            function hitung_diskon3(&$harga,$diskon){
                $harga = $harga - ($harga*$diskon/100);
                return $harga;
            }

            //contoh pemanggilan fungsi
            $harga = 10000;
            $diskon = 20;
            echo 'Harga sebelum diskon = '.$harga.'<br />';
            hitung_diskon3($harga,$diskon);
            echo 'Harga setelah diskon = '.$harga.'<br />';
            
            //Fungsi Rekursif untuk menghitung nilai faktorial
            function faktorial($n) {
                if ($n == 0){
                    return 1;
                } else{
                    return $n * faktorial($n-1);
            }
            }
        ?>
    </body>
</html>