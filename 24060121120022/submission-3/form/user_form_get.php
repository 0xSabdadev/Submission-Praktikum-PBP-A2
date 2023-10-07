<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Form Get</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section id="form-get">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
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
                                if(isset($_GET["submit"])){
                                    echo "<h3>Your Input : </h3>";
                                    echo "<h3>Your Input:</h3>";
                                    echo 'Nama = '.$_GET['nama'].'<br />';
                                    echo 'Email = '.$_GET['email'].'<br />';
                                    echo 'Kota = '.$_GET['kota'].'<br />';
                                    echo 'Jenis Kelamin = '.$_GET['jenis_kelamin'].'<br />';
                            
                                    $minat = $_GET['minat'];
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>