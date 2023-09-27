<!DOCTYPE html>
<html>
    <head>
        <title>Array</title>
    </head>
    <body>
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
            foreach ($bulan as $kode_bulan => $nama_bulan){
                echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
            }

            /*sort() mengurutkan nilai-nilai dalam array numerik 
            secara ascending (dari kecil ke besar).*/

            sort($bulan);
            echo '<br>sort():<br>';
            foreach ($bulan as $kode_bulan => $nama_bulan){
                echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
            }
            echo '<br>';

            //asort()
            /*asort() mengurutkan array secara ascending 
            berdasarkan nilai-nilai, tetapi tetap mempertahankan 
            hubungan antara indeks dan nilainya*/

            asort($bulan);
            echo '<br>asort():<br>';
            foreach ($bulan as $kode_bulan => $nama_bulan){
                echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
            }
            echo '<br>';

            //ksort()
            /*ksort() mengurutkan array berdasarkan indeks (kunci) 
            secara ascending (dari kecil ke besar).*/
            
            ksort($bulan);
            echo '<br>ksort():<br>';
            foreach ($bulan as $kode_bulan => $nama_bulan){
                echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
            }
            echo '<br>';
        ?>
    </body>
</html>