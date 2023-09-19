<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 14 September 2023
     Lab        : PBP A2
 -->
 <html>
    <head>
        <title>User Form Post</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="satu">
            <div class="judul">
                <label>Form Mahasiswa</label>
            </div>

            <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                    <label for="nama">Nama:</label><br />
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                </div>

                <div class="form-group">
                    <label for="text">Email:</label><br />
                    <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="kota">Kota/ Kabupaten:</label><br />
                    <select id="kota" name="kota" class="form-control">
                        <option value="" selected disable>--Pilih kota--</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                    </select>
                </div>

                <div class="jk">
                    <label>Jenis Kelamin:</label><br />
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
                        </label>
                    </div>
                </div>

                <div class="jk">
                    <label>Peminatan:</label><br />
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
                        </label>
                    </div>
                </div>

                <!--submit dan reset button-->
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>

        <div class="yourinput">
            <?php
                if(isset($_POST["submit"])){
                    echo 'Your Input:<br />';
                    echo 'Nama = '.$_POST['nama'].'<br />';
                    echo 'Email = '.$_POST['email'].'<br />';
                    echo 'Kota = '.$_POST['kota'].'<br />';
                    if(!empty($_POST['jenis_kelamin'])){
                        if(!empty( $_POST['jenis_kelamin'])){ 
                            echo "Jenis Kelamin = ".$_POST['jenis_kelamin'].'<br />';
                        }
                    }else{
                        echo "Tidak ada jenis kelamin yang dipilih.<br />";
                    }
                        
                    if(!empty($_POST['minat'])){
                        if(!empty($_POST['minat'])){ 
                            $minat = $_POST['minat'];
                            echo "Peminatan yang dipilih = ";
                            foreach($minat as $minat_item){
                                echo '<br />'.$minat_item;
                            }
                        }
                    }else{
                        echo "Tidak ada peminatan yang dipilih.";
                    }
                }
            ?>
        </div>
    </body>
</html>
