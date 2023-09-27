<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <?php
        //assignment melalui array identifier
        for ($i=0; $i < 10; $i++) { 
            $diskon[] = $i * 5;
        }

        //assignment menggunakan fungsi array
        //$diskon = array(1, 10, 20, 30, 40, 50, 60, 70, 80, 90);

        //cek apakah sebuah varibel bertipe array
        if (is_array($diskon)) 
            echo 'Array <br />';
        else
            echo 'Not Array <br />';

        //menampilkan isi array
        $n = sizeof($diskon);
        for($i=0; $i <= ($n-1); $i++){
            echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].'%<br />';
        }
        echo '<br />';

        // // Penggunaan fungsi sort() pada array $diskon
        // echo 'Array diskon diurutkan dengan fungsi sort()<br />';
        // sort($diskon);
        // $n = sizeof($diskon);
        // for($i=0; $i <= ($n-1); $i++){
        //     echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].'%<br />';
        // }
        // echo '<br />';

        // // Penggunaan fungsi asort() pada array $diskon
        // echo 'Array diskon diurutkan dengan fungsi asort()<br />';
        // asort($diskon);
        // $n = sizeof($diskon);
        // for($i=0; $i <= ($n-1); $i++){
        //     echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].'%<br />';
        // }
        // echo '<br />';

        // // Penggunaan fungsi ksort() pada array $diskon
        // echo 'Array diskon diurutkan dengan fungsi ksort()<br />';
        // ksort($diskon);
        // $n = sizeof($diskon);
        // for($i=0; $i <= ($n-1); $i++){
        //     echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].'%<br />';
        // }
    ?>
</body>
</html>