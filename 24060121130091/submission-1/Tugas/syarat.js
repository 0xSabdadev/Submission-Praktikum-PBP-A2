// Nama: Fa'iq Rindha Maulana
// NIM: 24060121130091
// Lab: PBP A2
// Deskripsi File: Dokumen HTML Form Tambah Data Produk
// Tanggal: Pembuatan 02/09/2023

function validateForm() {
	//validasi name tidak boleh kosong
	if(document.forms["formTambahData"]["name"].value == ""){
		alert("Isi kolom nama");
		document.forms["formTambahData"]["name"].focus();
		return false;
	}
	//validasi deskripsi tidak boleh kosong
	if(document.forms["formTambahData"]["deskripsi"].value == ""){
		alert("Isi Deskripsi");
		return false;
	}

	//validasi Kategori tidak boleh kosong
	if(document.forms["formTambahData"]["kategori"].value == ""){
		alert("Pilih Kategori");
		document.forms["formTambahData"]["kategori"].focus();
		return false;
	}

	//validasi Sub Kategori tidak boleh kosong
	if(document.forms["formTambahData"]["SubKategori"].value == ""){
		alert("Pilih Sub Kategori");
		document.forms["formTambahData"]["SubKategori"].focus();
		return false;
	}

	//validasi Harga Satuan tidak boleh kosong
	if(document.forms["formTambahData"]["hargaSatuan"].value == ""){
		alert("Isi Harga Satuan");
		document.forms["formTambahData"]["hargaSatuan"].focus();
		return false;
	}

	// validasi Grosir tidak boleh kosong
	if(document.forms["formTambahData"]["grosir"].value== ""){
		alert("Pilih minimal 1");
		return false;
	}

	// Aktifkan input Harga Grosir jika Ya dipilih, nonaktifkan jika Tidak
	let yaGrosir = document.getElementById("ya");
    let hargaGrosirInput = document.getElementById("hargaGrosir");

	// validasi grosir jika YA
	hargaGrosirInput.disabled = !yaGrosir.checked;
	if (yaGrosir.checked && (hargaGrosirInput.value === "")) {
		alert("Harga grosir harus diisi!!");
		return false; // Mencegah pengiriman formulir jika validasi gagal
	}

	//jasKim
	let selectedJasaKirim = document.querySelectorAll('input[name="jasaKirim"]:checked');
    if (selectedJasaKirim.length < 3) {
        alert("Pilih setidaknya tiga opsi jasa kirim!");
        return false; // Pembatalan pengiriman formulir
    }

	//captcha harus diisi
	let captchaText = document.forms["formTambahData"]["captcha_text"].value;
	let captchaInput= document.forms["formTambahData"]["captcha_input"].value;
	if(captchaInput === ""){
		alert("Isi captcha");
		return false;
	}
	if(captchaInput !== captchaText){
		alert("captcha salah");
		return false;
	}

	//Berhasil submit
	alert("Semua data berhasil diisi. Formulir akan dikirim.");
    return true;
}



//segmentasi kategori
function segmenKategori(){
	let x = document.forms["formTambahData"]["kategori"].value;

	if(x == "Baju"){
		document.getElementById("SubKategori").innerHTML =
			'<option value="">--Pilih Sub Kategori--</option>' +
			'<option value="Baju Pria">Baju Pria</option>' +
			'<option value="Baju Wanita">Baju Wanita</option>' +
			'<option value="Baju Anak">Baju Anak</option>';
	}
	if(x == "Elektronik"){
		document.getElementById("SubKategori").innerHTML =
			'<option value="">--Pilih Sub Kategori--</option>' +
			'<option value="Mesin Cuci">Mesin Cuci</option>' +
			'<option value="Kulkas">Kulkas</option>' +
			'<option value="AC">AC</option>';
	}
	if(x == "Alat Tulis"){
		document.getElementById("SubKategori").innerHTML =
			'<option value="">--Pilih Sub Kategori--</option>' +
			'<option value="Kertas">Kertas</option>' +
			'<option value="Map">Map</option>' +
			'<option value="Pulpen">Pulpen</option>' ;
	}
}

function aktifNonAktif() {
    let yaGrosir = document.getElementById("ya");
    let hargaGrosirInput = document.getElementById("hargaGrosir");

    // Jika "Tidak Grosir" dipilih, nonaktifkan kolom harga grosir
    if (!yaGrosir.checked) {
        hargaGrosirInput.disabled = true;
        hargaGrosirInput.value = ""; // Kosongkan nilai kolom harga grosir jika dinonaktifkan
    } else {
        hargaGrosirInput.disabled = false;
    }
}


//Generates the captcha function
function generateCaptcha(){
	let code = '';
	const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	
	for (let i = 0; i < 5; i++) {
		const randomIndex = Math.floor(Math.random() * characters.length);
		code += characters.charAt(randomIndex);
	}
	
	document.forms["formTambahData"]["captcha_text"].value = code;
}

