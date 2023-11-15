<!-- Agung Surya Permana
    2406021140167
    Lab PBP A2 -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agung Surya Permana</title>
</head>
<body>
    <?php
            echo"<table border = '1'>";
            echo"<tr>
                    <td> Nama </td>
                    <td> Nilai 1 </td>
                    <td> Nilai 2 </td>
                    <td> Nilai 3 </td>
                    <td> Rata-rata </td>
                </tr>";
            $array_mhs = array( 
                "Abdul" => array(89,90,54),
                "Budi" => array(78,60,64),
                "Nina" => array(67,56,84),
                "Budi" => array(87,69,50),
                "Budi" => array(98,65,74)
        );
            function hitung_rata($array){
                $array = array_sum($array) / count($array);
                return $array;
        }
            foreach($array_mhs as $key => $value){
                echo"<tr>";
                echo"<td>" .$key. "</td>";

                echo"<td>" .$value[0]."</td>";
                echo"<td>" .$value[1]. "</td>";
                echo"<td>" .$value[2]. "</td>";
                $array = array($value[0], $value[1], $value[2]);
                $rata2 = hitung_rata($array);
                echo"<td>" .$rata2. "</td>";
                echo"</tr>";
                }
      echo"</table>";
    ?>
</body>
</html>