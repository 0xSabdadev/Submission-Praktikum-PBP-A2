<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .form-group {
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 8px;
        }
    </style>

    <title>Form Mahasiswa</title>
</head>

<body>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Form Mahasiswa</h5>
                <form method="POST" autocomplete="on" action="">
                    <!-- Masukkan element form disini -->
                    <div class="form-group">
                        <label for="nama">Nama: </label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota/Kabupaten:  </label>
                        <select name="kota" id="kota" class="form-control">
                            <option value="Semarang">Semarang</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                        </select>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="radio"class='form-check-input' name="jenis_kelamin" value="pria">Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="radio"class='form-check-input' name="jenis_kelamin" value="wanita">Wanita
                        </label>
                    </div>
                    <label for="">Peminatan:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]"value='coding'>Coding
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]"value='ux_design'>UX Design
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]"value='data_science'>Data Science
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
        <div class="row w-50 mt-5 mb-5 mx-auto">
            <div class="col-12">
                <?php
                // Masukkan logic PHP di sini
                if(isset($_POST["submit"])){
                    echo"<h3>Your Input:</h3>";
                    echo 'Nama: '.$_POST['nama'].'<br/>';
                    echo 'Email: '.$_POST['email'].'<br/>';
                    echo 'Kota: '.$_POST['kota'].'<br/>';
                    echo 'Jenis Kelamin: '.$_POST['jenis_kelamin'].'<br/>';
                    echo 'Minat: '.$_POST['minat'].'<br/>';

                    $minat = $_POST['minat'];
                    if(!empty($minat)){
                        echo'Peminatan yang dipilih:';
                        foreach($minat as $minat_item){
                            echo'<br/>'.$minat_item;
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script>
        function resetForm() {
            document.getElementById('form_mahasiswa').reset();
            document.getElementById('nama').value = "";
            document.getElementById('email').value = "";
            document.getElementById('kota').value = "semarang";
            document.querySelectorAll('.form-check-input').checked = 'false';
        }
    </script>
</body>

</html>