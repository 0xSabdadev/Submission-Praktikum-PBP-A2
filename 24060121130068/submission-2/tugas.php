<?php
    // Nama : Mitslina
    // NIM  : 24060121130068

    function hitung_rata($array) {
        if (count($array) === 0) {
            return 0;
        }

        $total = array_sum($array);
        $rata_rata = $total / count($array);
        return number_format($rata_rata, 2); // Mengembalikan nilai rata-rata dengan 2 angka desimal
    }

    function print_mhs($array_mhs) {
        echo "<table border='1'>";
        echo "<tr><th>Nama</th><th>Nilai1</th><th>Nilai2</th><th>Nilai3</th><th>Rata2</th></tr>";

        foreach ($array_mhs as $nama => $nilai) {
            echo "<tr>";
            echo "<td>" . $nama . "</td>";
            echo "<td>" . $nilai[0] . "</td>";
            echo "<td>" . $nilai[1] . "</td>";
            echo "<td>" . $nilai[2] . "</td>";
            $rata_rata = hitung_rata($nilai);
            echo "<td>" . $rata_rata . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    // Array data mahasiswa
    $array_mhs = [
        'Abdul' => [89, 90, 54],
        'Budi' => [78, 60, 64],
        'Nina' => [67, 56, 84],
    ];

    // Menampilkan data mahasiswa dalam bentuk tabel
    print_mhs($array_mhs);
?>
