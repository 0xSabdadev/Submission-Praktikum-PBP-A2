<html>

<head>
    <title>Fungsi Mahasiswa</title>
</head>

<body>
    <?php
    require('ArrayMahasiswa.php');

    function hitung_rata($array)
    {
        return ($array[0] + $array[1] + $array[2]) / 3;
    }

    function print_mhs($array_mhs)
    {
        foreach ($array_mhs as $key => $array) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            for ($i = 0; $i <= 2; $i++) {
                echo '<td>' . $array[$i] . '</td>';
            }
            echo '<td>' . hitung_rata($array) . '</td>';
            echo '<br/>';
            echo '</tr>';
        };
    }
    ?>
</body>

</html>