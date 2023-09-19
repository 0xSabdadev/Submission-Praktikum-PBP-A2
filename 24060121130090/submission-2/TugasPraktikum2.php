<!-- 
    // $harga =1000;
    // echo '<table border = "1">';
    // echo '<tr>
    //         <td>Namao</td>
    //         <td>Nilai 1</td>
    //         <td>Nilai 2</td>
    //         <td>Nilai 3</td>
    //         <td>Rata - Rata</td>
    //     </tr>';

    // $nama = ['Abdul','Budi','Nina'];
    // $datanilai = [
    //     ['nama'=>'Abdul','nilai1'=>89,'nilai2'=>90,'nilai3'=>54],
    //     ['nama'=>'Budi','nilai1'=>98,'nilai2'=>65,'nilai3'=>74],
    //     ['nama'=>'Nina','nilai1'=>67,'nilai2'=>56,'nilai3'=>54]
    // ];
    // function rata_rata($nilai1,$nilai2,$nilai3){
    //     $rata = ($nilai1+$nilai2+$nilai3)/3;
    //     return $rata;
    // }

    // for ($i=0;$i<count($nama);$i++){
    //     echo '<tr>';
    //     echo '<td>'.$datanilai[$i]['nama'].'</td>';
    //     echo '<td>'.$datanilai[$i]['nilai1'].'</td>';
    //     echo '<td>'.$datanilai[$i]['nilai2'].'</td>';
    //     echo '<td>'.$datanilai[$i]['nilai3'].'</td>';
    //     $rata = rata_rata($datanilai[$i]['nilai1'],$datanilai[$i]['nilai2'],$datanilai[$i]['nilai3']);
    //     echo '<td>'.$rata.'</td>';
    //     echo '</tr>';
    // }
    // echo '</table>';
-->

<html>
    <head>
        <title>Praktikum ke-2</title>
    </head>
    <body>
        <?php
            $array_mhs = array('Abdul' => array(89,90,54),
                        'Budi' => array(78,60,64),
                        'Nina' => array(67,56,84),
                        'Budi' => array(87,69,50),
                        'Budi' => array(98,65,74)
                    );
            function hitung_rata($array) {
                $jml = (($array[0]+$array[1]+$array[2])/3);
                echo '<td>'.$jml.'</td>';
            }

            function print_mhs($array_mhs) {
                echo '<table border="1">';
                echo '<tr>
                    <td>Nama</td>
                    <td>Nilai 1</td>
                    <td>Nilai 2</td>
                    <td>Nilai 3</td>
                    <td>Rata2</td>
                </tr>';

            foreach($array_mhs as $mahasiswa => $value){
                echo '<tr>';
                echo '<td>'.$mahasiswa.'</td>';
                echo '<td>'.$value[0].'</td>';
                echo '<td>'.$value[1].'</td>';
                echo '<td>'.$value[2].'</td>';
                hitung_rata($value);
                echo '</tr>';
                }
                echo '</table>';
                echo '<br>';
            }
            print(print_mhs($array_mhs));
        ?>
    </body>
</html>