<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Form Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <section id="form-post">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" autocomplete="on" action="">
                                <div class="form-group">
                                    <label for="nama">Nama :</label>
                                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota / Kabupaten :</label>
                                    <select class="form-control" id="kota" name="kota">
                                        <option value="Semarang">Semarang</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Bandung">Bandung</option>
                                        <option value="Surabaya">Surabaya</option>
                                    </select>
                                </div>
                                <label>Jenis Kelamin : </label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin"
                                            value="pria">Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin"
                                            value="wanita">Wanita
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="minat[]"
                                            value="coding">Coding
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="minat[]"
                                            value="ux_design">UX
                                        Design
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="minat[]"
                                            value="data_science">Data Science
                                    </label>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                            <?php 
                                if(isset($_POST["submit"])){
                                    echo "<h3>Your Input : </h3>";
                                    echo "<h3>Your Input:</h3>";
                                    echo 'Nama = '.$_POST['nama'].'<br />';
                                    echo 'Email = '.$_POST['email'].'<br />';
                                    echo 'Kota = '.$_POST['kota'].'<br />';
                                    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br />';
                            
                                    $minat = $_POST['minat'];
                                    if (!empty($minat)){
                                        echo 'Peminatan yang dipilih: ';
                                        foreach($minat as $minat_item){
                                            echo '<br />'.$minat_item;
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>