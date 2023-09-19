<!DOCTYPE html>
<html>
    <head>
        <title>Array</title>
    </head>
    <body>
        <?php
            //assignment melalui array identifier
            for ($i=0;$i<10;$i++){
                $diskon[] = $i * 5;
            }
            //assignment menggunakan fungsi array
            $diskon = array(0,10,20,30,40,50,60,70,80,90);

            //cek apakah sebuah variabel bertipe array
            if (is_array($diskon))
                echo 'Array<br><br>';
            else
                echo 'Not Array<br><br>';

            //menampilkan isi array
            $n = sizeof($diskon);
            for($i=0;$i<=($n-1);$i++){
                echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
            }
            echo '<br>';

            //sort()
            /*sort() mengurutkan nilai-nilai dalam array numerik 
            secara ascending (dari kecil ke besar).*/

            sort($diskon);
            echo '<br>sort():<br>';
            for($i=0;$i<=($n-1);$i++){
                echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
            }
            echo '<br>';

            //asort()
            /*asort() mengurutkan array secara ascending 
            berdasarkan nilai-nilai, tetapi tetap mempertahankan 
            hubungan antara indeks dan nilainya*/

            asort($diskon);
            echo '<br>asort():<br>';
            for($i=0;$i<=($n-1);$i++){
                echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
            }
            echo '<br>';

            //ksort()
            /*ksort() mengurutkan array berdasarkan indeks (kunci) 
            secara ascending (dari kecil ke besar).*/
            
            ksort($diskon);
            echo '<br>ksort():<br>';
            for($i=0;$i<=($n-1);$i++){
                echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
            }
            echo '<br>';
        ?>
    </body>
</html>