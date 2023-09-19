<!DOCTYPE html>
<html>
    <head>
        <title>Looping</title>
    </head>
    <body>
        <?php
            $harga = 1000;
            
            // For loop
            echo '<h6>FOR LOOP</h6>';
            echo '<table border = "1">';
            echo '  <tr>
                    <td>No</td>
                    <td>Diskon</td>
                    <td>Harga Setelah Diskon</td>
                    </tr>   ';

            for ($i = 1; $i <= 10; $i++) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                $diskon = $i * 0.1;
                echo '<td>'.($diskon*100).' % </td>';
                $harga_diskon = $harga - ($harga * $diskon);
                echo '<td>'.$harga_diskon.'</td>';
                echo '</tr>';
            }
            echo '</table>';

            // While loop
            echo '<h6>WHILE LOOP</h6>';
            echo '<table border = "1">';
            echo '  <tr>
                    <td>No</td>
                    <td>Diskon</td>
                    <td>Harga Setelah Diskon</td>
                    </tr>   ';

            $i = 1;
            while ($i <= 10) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                $diskon = $i * 0.1;
                echo '<td>'.($diskon*100).' % </td>';
                $harga_diskon = $harga - ($harga * $diskon);
                echo '<td>'.$harga_diskon.'</td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';

            // Do-While loop
            echo '<h6>DO-WHILE LOOP</h6>';
            echo '<table border = "1">';
            echo '  <tr>
                    <td>No</td>
                    <td>Diskon</td>
                    <td>Harga Setelah Diskon</td>
                    </tr>   ';

            $i = 1;
            do {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                $diskon = $i * 0.1;
                echo '<td>'.($diskon*100).' % </td>';
                $harga_diskon = $harga - ($harga * $diskon);
                echo '<td>'.$harga_diskon.'</td>';
                echo '</tr>';
                $i++;
            } while ($i <= 10);
            echo '</table>';
            
        ?>
    </body>
</html>