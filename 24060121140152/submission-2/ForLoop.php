<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 8 September 2023
 -->
<html>

<head>
    <title>For Loop</title>
</head>

<body>
    <?php
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr>
<td>No</td>
<td>Diskon</td>
<td>Harga Setelah Diskon</td>
</tr>';
    for ($i = 1; $i <= 10; $i++) {
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        $diskon = $i * 0.1;
        echo '<td>' . ($diskon * 100) . ' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>' . $harga_diskon . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>