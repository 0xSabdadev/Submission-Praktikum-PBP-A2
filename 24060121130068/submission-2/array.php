<?php
    // Nama : Mitslina
    // NIM  : 24060121130068
    
    // NUMERIC ARRAY********************************************
    echo '<br />NUMERIC ARRAY<br />';
    //assignment melalui array identifier
    for ($i=0;$i<10;$i++){
        $diskon[] = $i * 5;
    }

    //assignment menggunakan fungsi array
    // $diskon = array(0,10,20,30,40,50,60,70,80,90);
    
    //cek apakah sebuah variabel bertipe array
    if (is_array($diskon)){
        echo 'Array <br/>';
    } else{
        echo 'Not Array <br/';
    }

    //menampilkan isi array
    $n = sizeof($diskon);
    for($i=0;$i<=($n-1);$i++){
        echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
    }

    // percobaan============================================= 
    $disc = array(60,20,50,90,0,70,10,30,80,40);

    // Mengurutkan array asosiatif berdasarkan kunci secara ascending menggunakan ksort()
    echo '<br/> ksort() <br/>';
    ksort($disc);
    // Menampilkan isi array yang telah diurutkan
    foreach ($disc as $key => $value) {
        echo 'diskon hari ke-' . ($key + 1) . ' = ' . $value . ' % <br />';
    }

    // Mengurutkan array asosiatif secara ascending menggunakan asort()
    echo '<br/> asort() <br/>';
    asort($disc);
    // Menampilkan isi array yang telah diurutkan
    foreach ($disc as $key => $value) {
        echo 'diskon hari ke-' . ($key + 1) . ' = ' . $value . ' % <br />';
    }
    
    // Mengurutkan array secara ascending menggunakan sort()
    echo '<br/> sort() <br/>';
    sort($disc);
    // Menampilkan isi array yang telah diurutkan
    foreach ($disc as $key => $value) {
        echo 'diskon hari ke-' . ($key + 1) . ' = ' . $value . ' % <br />';
    }


    // ASSOSIATIVE ARRAY********************************************
    echo '<br />ASSOSIATIVE ARRAY<br />';
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
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // percobaan=============================================     
    // Mengurutkan associative array berdasarkan kunci secara ascending menggunakan ksort()
    echo '<br/>ksort()<br/>';
    ksort($bulan);
    // Menampilkan isi array yang telah diurutkan
    foreach ($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '"<br />';
    }

    // Mengurutkan associative array secara ascending menggunakan asort()
    echo '<br/>asort()<br/>';
    asort($bulan);
    // Menampilkan isi array yang telah diurutkan
    foreach ($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '"<br />';
    }

    // Mengurutkan associative array secara ascending menggunakan sort()
    echo '<br/>sort()<br/>';
    sort($bulan);
    // Menampilkan isi array yang telah diurutkan
    foreach ($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '"<br />';
    }

?>