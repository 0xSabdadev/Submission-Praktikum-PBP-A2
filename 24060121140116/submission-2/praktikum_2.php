<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <?php
    // Fungsi untuk menghitung rata-rata dari sebuah array
    function hitung_rata($array) {
        $total = array_sum($array);
        $count = count($array);

        if ($count > 0) {
            return $total / $count;
        } else {
            return 0;
        }
    }

    // Fungsi untuk menampilkan data mahasiswa dalam tabel HTML
    function print_mhs($array_mhs) {
        // Header tabel
        echo '<table border="1">';
        echo '<tr>
                <th>Nama</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Rata-rata</th>
              </tr>';

        // Loop melalui array mahasiswa
        foreach ($array_mhs as $nama => $nilai) {
            // Menghitung rata-rata nilai mahasiswa
            $rata_rata = hitung_rata($nilai);

            // Menampilkan data mahasiswa dalam baris tabel
            echo '<tr>';
            echo '<td>' . $nama . '</td>';
            echo '<td>' . $nilai[0] . '</td>';
            echo '<td>' . $nilai[1] . '</td>';
            echo '<td>' . $nilai[2] . '</td>';
            echo '<td>' . $rata_rata . '</td>';
            echo '</tr>';
        }

        // Tutup tabel
        echo '</table>';
    }

    // Array data mahasiswa
    $array_mhs = array(
        'Abdul' => array(89, 90, 54),
        'Budi' => array(98, 65, 74),
        'Nina' => array(67, 56, 84)
    );

    // Memanggil fungsi untuk menampilkan data mahasiswa
    print_mhs($array_mhs);
    ?>
</body>

</html>