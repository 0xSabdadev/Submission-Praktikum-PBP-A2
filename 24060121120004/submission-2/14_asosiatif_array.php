<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
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
                        'sep' => 'September',
                        'okt' => 'Oktober',
                        'nov' => 'November',
                        'des' => 'Desember');

        foreach($bulan as $kode_bulan => $nama_bulan){
            echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
        }
        echo '<br />';

        // //Penggunaan fungsi sort() pada array $diskon
        // echo 'Array bulan diurutkan dengan fungsi sort()<br />';
        // sort($bulan);
        // foreach($bulan as $kode_bulan => $nama_bulan){
        //     echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
        // }
        // echo '<br />';

        // //Penggunaan fungsi asort() pada array $diskon
        // echo 'Array bulan diurutkan dengan fungsi asort()<br />';
        // asort($bulan);
        // foreach($bulan as $kode_bulan => $nama_bulan){
        //     echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
        // }
        // echo '<br />';

        // //Penggunaan fungsi ksort() pada array $diskon
        // echo 'Array bulan diurutkan dengan fungsi ksort()<br />';
        // ksort($bulan);
        // foreach($bulan as $kode_bulan => $nama_bulan){
        //     echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
        // }
        // echo '<br />';

    ?>
</body>
</html>