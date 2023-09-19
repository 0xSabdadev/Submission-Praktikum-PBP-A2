<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 8 September 2023
 -->
<html>

<head>
    <title>Main Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('FungsiMahasiswa.php');
    echo '<table border="1">';
    echo '<tr>
    <td>Nama</td>
    <td>Nilai1</td>
    <td>Nilai2</td>
    <td>Nilai3</td>
    <td>Rata2</td>
    </tr>';
    print_mhs($array_mhs);
    echo '</table>';
    ?>
</body>

</html>