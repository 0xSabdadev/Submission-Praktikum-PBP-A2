<?php
    for ($i=0;$i<10;$i++) {
        $diskon[] = $i * 5;
    }

    //$diskon = array(0,10,20,30,40,50,60,70,80,90);

    if (is_array($diskon)) {
        echo 'Array';
    } else {
        echo 'Not Array';
    }
    
    $n = sizeof($diskon);
    for($i=0;$i<=($n-1);$i++) {
        echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
    }

    sort($diskon);
    echo 'Setelah diurutkan menggunakan sort(): <br />';
    foreach ($diskon as $value) {
        echo $value . ' % <br>';
    }

    asort($diskon);
    echo 'Setelah diurutkan menggunakan asort(): <br />';
    foreach ($diskon as $key => $value) {
        echo 'Diskon hari ke-' . ($key + 1) . ' = ' . $value . ' % <br>';
    }

    ksort($diskon);
    echo 'Setelah diurutkan menggunakan ksort(): <br />';
    foreach ($diskon as $key => $value) {
        echo 'Diskon hari ke-' . ($key + 1) . ' = ' . $value . ' % <br>';
    }
?>