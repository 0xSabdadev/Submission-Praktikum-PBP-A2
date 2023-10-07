<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : Membuat form sesuai modul praktikum 3
-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Form Tugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .bg-success {
            background: #D1E7DD !important;
        }

        .card-header {
            height: 50px !important;
        }

        .btn-success {
            background: #D1E7DD !important;
        }
    </style>
</head>

<body>
    <?php 
        error_reporting(0);
        $status_bg = array('bg-danger','bg-danger','bg-danger','bg-danger','bg-danger');
        if(isset($_POST['submit'])){
            $_NIS_ = inputTest($_POST['nis']);
                if(empty($_NIS_)){
                    $error_nis = 'NIS harus diisi';
                }else if(!preg_match('/^[0-9]*$/',$_NIS_)){
                    $error_nis = 'NIS harus berupa angka';
                }else if(strlen($_NIS_)!=10){
                    $error_nis = 'NIS harus 10 digit';
                }
            $_NAME_ = inputTest($_POST['nama']);
                if(empty($_NAME_)){
                    $error_nama = 'Nama harus diisi';
                }else if(!preg_match('/^[a-zA-Z ]*$/',$_NAME_)){
                    $error_nama = 'Nama harus berupa huruf dan spasi';
                }
            $_EKSKUL_ = $_POST['ekskul'];
                if(($_POST['kelas'] != 'XII')){
                    if (empty($_EKSKUL_)) {
                        $error_ekskul = "Ekskul harus dipilih minimal 1";
                    } 
                    else if(count($_EKSKUL_)>3){
                        $error_ekskul = "Ekskul hanya dapat dipilih maksimal 3";
                    }
                }
            if(!isset($_POST['jenis_kelamin'])){
                $error_jenis_kelamin = 'Jenis Kelamin Harus diisi';
            }
            if(!isset($_POST['kelas'])){
                $error_kelas = 'Kelas Harus diisi';
            }
        
        }
        function inputTest($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <section id="form-get">
        <div class="container">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">Form Input Siswa</div>
                        <div class="card-body">
                            <form method="POST" autocomplete="on" action="">
                                <div class="form-group">
                                    <label for="nis:">NIS</label>
                                    <input type="text"
                                        class="form-control <?php if(!isset($_POST['nis'])):echo 'bg-none';elseif(!isset($error_nis)):echo 'bg-success';endif;?>"
                                        id="nis" name="nis" maxlength="10"
                                        value="<?php if(isset($_NIS_)) {echo $_NIS_;} ?>">
                                    <div class="error text-danger mt-1">
                                        <?php if(isset($error_nis)): echo '<div class="alert alert-danger">'.$error_nis.'</div>';else:$status_bg[1] = 'bg-success';endif;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text"
                                        class="form-control <?php if(!isset($_POST['nama'])):echo 'bg-none';elseif(!isset($error_nama)):echo 'bg-success';endif;?>"
                                        id="nama" name="nama" maxlength="50"
                                        value="<?php if(isset($_NAME_)) {echo $_NAME_;} ?>">
                                    <div class="error text-danger mt-1">
                                        <?php if(isset($error_nama)): echo '<div class="alert alert-danger">'.$error_nama.'</div>';else:$status_bg[0] = 'bg-success';endif;?>
                                    </div>
                                </div>
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria"
                                            <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=='pria'
                                            ) echo 'checked' ?>>Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"
                                            <?php if (isset($_POST['jenis_kelamin']) &&
                                            $_POST['jenis_kelamin']=='wanita' ) echo 'checked' ?>>Wanita
                                    </label>
                                </div>
                                <div class="error text-danger mt-1">
                                    <?php if(isset($error_jenis_kelamin)): echo '<div class="alert alert-danger">'.$error_jenis_kelamin.'</div>';else:$status_bg[2] = 'bg-success';endif;?>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select onchange="setEkskul()"id="kelas" name="kelas"
                                        class="form-control <?php if(!isset($_POST['kelas'])):echo 'bg-none';elseif(!isset($error_kelas)):echo 'bg-success';endif;?>">
                                        <option value="" selected disabled>-- Pilih Kelas --</option>
                                        <option value="X" <?php if (isset($_POST['kelas'])&&$_POST['kelas']=='X' )
                                            echo 'selected' ?>>X</option>
                                        <option value="XI" <?php if (isset($_POST['kelas'])&&$_POST['kelas']=='XI' )
                                            echo 'selected' ?>>XI</option>
                                        <option value="XII" <?php if (isset($_POST['kelas'])&&$_POST['kelas']=='XII' )
                                            echo 'selected' ?>>XII
                                        </option>
                                    </select>
                                    <div class="error text-danger mt-1">
                                        <?php if(isset($error_kelas)): echo '<div class="alert alert-danger">'.$error_kelas.'</div>';else:$status_bg[3] = 'bg-success';endif;?>
                                    </div>
                                </div>
                                <label>Ektrakurikuler:</label>
                                <div id="ekskul_container" <?php if ((!isset($_POST['kelas'])) or (isset($_POST['kelas']) && $_POST['kelas'] != "XII")) echo 'class="d-block"';
                                                else echo 'class="d-none"' ?>>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="ekskul[]"
                                                value="Pramuka" <?php if (isset($_EKSKUL_) &&
                                                in_array('Pramuka',$_EKSKUL_)) echo 'checked' ; ?>>Pramuka
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="ekskul[]"
                                                value="SeniTari" <?php if (isset($_EKSKUL_) &&
                                                in_array('SeniTari',$_EKSKUL_)) echo 'checked' ; ?>>Seni
                                            Tari
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="ekskul[]"
                                                value="Sinematografi" <?php if (isset($_EKSKUL_) &&
                                                in_array('Sinematografi',$_EKSKUL_)) echo 'checked' ; ?>>Sinematografi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="ekskul[]"
                                                value="Basket" <?php if (isset($_EKSKUL_) &&
                                                in_array('Basket',$_EKSKUL_)) echo 'checked' ; ?>>Basket
                                        </label>
                                    </div>
                                </div>

                                <div class="error text-danger mt-1">
                                    <?php if(isset($error_ekskul)): echo '<div class="alert alert-danger">'.$error_ekskul.'</div>';else:$status_bg[4] = 'bg-success';endif;?>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Submit</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="document.location.href='tugaspbp3.php'">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($_POST["submit"])){
                        echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                        echo '<div class="card">';
                        echo '<div class="card-header">';
                        echo '<p>Your Input : </p>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<div class="row justify-content-center text-center"><div class="col-6"><a role="button" class="btn btn-danger" style="width:50%;"></a>
                            <p>Not Validated</p>
                            </div><div class="col-6"><a role="button" class="btn btn-success" style="width:50%;"></a>
                            <p>Validated</p>
                            </div>
                            </div>';
                        echo '<table class="table table-hover"><thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead><tbody>
                            <tr><th scope="row" class="'.$status_bg[0].'">Nama</th>';
                        echo '<td>';if(!isset($error_nama)):echo $_POST['nama'];else:echo'';endif;echo '</td></tr><tr><th scope="row" class="'.$status_bg[1].'">NIS</th>';
                        echo '<td>';if(!isset($error_nis)):echo $_POST['nis'];else:echo'';endif;echo '</td></tr><tr><th scope="row" class="'.$status_bg[2].'">Jenis Kelamin</th>';
                        echo '<td>'.$_POST['jenis_kelamin'].'</td></tr><tr><th scope="row" class="'.$status_bg[3].'">Kelas</th>';
                        echo '<td>'.$_POST['kelas'].'</td></tr><tr><th scope="row" class="'.$status_bg[4].'">Ekstrakurikuler</th><td><ol>';
                        if (!empty($_EKSKUL_)&&!isset($error_ekskul)){
                            foreach($_EKSKUL_ as $_EKSKUL_item){
                                echo '<li>'.$_EKSKUL_item.'</li>';
                            }
                        } else if ($_POST['kelas'] == 'XII') {
                            echo 'Kelas XII tidak ada ekstrakurikuler';
                        }
                        echo '</ol></td></tr></tbody></table>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </section>
    <script>
        const setEkskul = () => {
            const kelas = document.getElementById('kelas').value;
            const ekskul_container = document.getElementById('ekskul_container');
            const checkbox = document.getElementsByClassName('form-check-input-eks');
            if (kelas != 'XII') {
                ekskul_container.classList.remove('d-none');
                ekskul_container.classList.add('d-block');
            } else {
                ekskul_container.classList.add('d-none');
                ekskul_container.classList.remove('d-block');
                for (let index = 0; index < checkbox.length; index++) {
                    const element = checkbox[index];
                    element.checked = false;
                }
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>