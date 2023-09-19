<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 8 September 2023
 -->
<html>

<head>
    <title>Belajar PHP</title>
</head>

<body>
    <?php
    //assignment menggunakan fungsi array
    $bulan = array(
        'jan' => 'Januari',
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
        'des' => 'Desember'
    );

    foreach ($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '"<br />';
    }
    ?>
</body>

</html>