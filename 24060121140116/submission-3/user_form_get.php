<!DOCTYPE html>
<html>

<head>
    <title>Form Input Data Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    #judul {
        text-align: center;
        font-family: "Arial", sans-serif;
    }

    body {
        background-color: #f3e0f9;
    }

    .container {
        background-color: #eed0f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #751af3 !important;
        border-color: #751af3 !important;
    }

    .btn-danger {
        background-color: #ff5858 !important;
        border-color: #ff5858 !important;
    }

    .form-check-label {
        color: black;
    }

    .form-control {
        color: black;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 id="judul">Form Input Data Mahasiswa</h2>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class="table">
                <tr>
                    <td><label for="nama">Nama:</label></td>
                    <td><input type="text" class="form-control" id="nama" name="nama" maxlength="50"></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" class="form-control" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="kota">Kota / Kabupaten:</label></td>
                    <td>
                        <select id="kota" name="kota" class="form-control">
                            <option value="Semarang">Semarang</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Jenis Kelamin:</label></td>
                    <td>
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
                    </td>
                </tr>
                <tr>
                    <td><label>Peminatan:</label></td>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX
                                Design
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data
                                Science
                            </label>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- submit, reset, dan button -->
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</body>

</html>