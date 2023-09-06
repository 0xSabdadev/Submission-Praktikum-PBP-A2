function myFunction() {
    document.getElementById("paragraf").innerHTML
    = "Hypertext Markup Language";
}

function getSubkategori(){
    let kategori = document.forms["formRegistration"]["kategori"].value;
    if(kategori == "Baju"){
        document.getElementById("subkategori").innerHTML =
        '<option value="">--Pilih Sub Kategori--</option>' +
        '<option value="BajuPria">Baju Pria</option>' +
        '<option value="BajuWanita">Baju Wanita</option>' +
        '<option value="BajuAnak">Baju Anak</option>';
    }
    if(kategori == "Elektronik"){
        document.getElementById("subkategori").innerHTML =
        '<option value="">--Pilih Sub Kategori--</option>' +
        '<option value="MesinCuci">Mesin Cuci</option>' +
        '<option value="Kulkas">Kulkas</option>' +
        '<option value="AC">AC</option>';
    }
    if(kategori == "AlatTulis"){
        document.getElementById("subkategori").innerHTML =
        '<option value="">--Pilih Sub Kategori--</option>' +
        '<option value="Kertas">Kertas</option>' +
        '<option value="Map">Map</option>' +
        '<option value="Pulpen">Pulpen</option>';
    }
}

function generateCaptcha() {
    let alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let captcha = '';
    for (let i = 0; i < 5; i++) {
        let randomIndex = Math.floor(Math.random() * alphabets.length);
        captcha += alphabets[randomIndex];
    }
    document.forms["formRegistration"]["captcha_text"].value = captcha;
}

function validateForm() {
	//validasi name tidak boleh kosong
	if(document.forms["formRegistration"]["nama"].value == ""){
		alert("Nama tidak boleh kosong.");
		document.forms["formRegistration"]["nama"].focus();
		return false;
	}
    //validasi deskripsi tidak boleh kosong
	if(document.forms["formRegistration"]["deskripsi"].value == ""){
		alert("Deskripsi tidak boleh kosong.");
		document.forms["formRegistration"]["description"].focus();
		return false;
	}
	//validasi kategori tidak boleh kosong
	if(document.forms["formRegistration"]["kategori"].value == ""){
		alert("Pilih kategori terlebih dahulu.");
		return false;
	}
    //validasi sub kategori tidak boleh kosong
	if(document.forms["formRegistration"]["subkategori"].value == ""){
		alert("Pilih sub kategori terlebih dahulu.");
		return false;
	}
	//validasi harga satuan tidak boleh kosong dan harus numerik
	if(document.forms["formRegistration"]["harga"].value == ""){
		alert("Harga satuan tidak boleh kosong.");
		document.forms["formRegistration"]["harga"].focus();
		return false;
	}else if(isNaN(document.forms["formRegistration"]["harga"].value)){
		alert("Harga satuan harus numerik.");
		document.forms["formRegistration"]["harga"].value = "";
		document.forms["formRegistration"]["harga"].focus();
		return false;
	}
	//validasi grosir tidak boleh kosong
	if(document.forms["formRegistration"]["grosir"].value == ""){
		alert("Pilih ya atau tidak untuk grosir.");
		document.forms["formRegistration"]["grosir"].focus();
		return false;
	}
	//validasi harga grosir tidak boleh kosong jika grosir == "ya"
	if(document.forms["formRegistration"]["grosir"].value == "Ya"){
		if(document.forms["formRegistration"]["hargaGrosir"].value == ""){
            alert("Isi harga grosir terlebih dahulu.");
            document.forms["formRegistration"]["hargaGrosir"].focus();
            return false;
        }else if(isNaN(document.forms["formRegistration"]["hargaGrosir"].value)){
            alert("Harga grosir harus numerik.");
            document.forms["formRegistration"]["hargaGrosir"].value = "";
            document.forms["formRegistration"]["hargaGrosir"].focus();
            return false;
        }
	}
	//validasi jasa, minimal pilih 3
	var jasa = document.forms["formRegistration"]["jasa[]"];
    var checkedCount = 0;

    for (let i = 0; i < jasa.length; i++) {
        if (jasa[i].checked) {
            checkedCount++;
        }
    }

    if (checkedCount < 3) {
        alert("Pilih minimal 3 jasa pengiriman.");
        return false;
    }
	//validasi text captcha harus sesuai dengan captcha yang di-generate
	if(document.forms["formRegistration"]["captcha_input"].value != document.forms["formRegistration"]["captcha_text"].value){
		alert("Captcha tidak sesuai.");
        return false;
	}
	alert('Terima kasih sudah mengisi form.')
    return true;
}
