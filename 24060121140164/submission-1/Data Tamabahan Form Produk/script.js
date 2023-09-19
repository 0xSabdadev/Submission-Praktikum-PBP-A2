function validateForm(){
    var nProduk = document.forms["formTambahDataProduk"]["fnProduk"].value
    var nDeskripsi = document.forms["formTambahDataProduk"]["fnDeskripsi"].value
    var nKategori = document.forms["formTambahDataProduk"]["fnKategori"].value
    var nSubKategori = document.forms["formTambahDataProduk"]["fnSubKategori"].value
    var nHargaSatuan = document.forms["formTambahDataProduk"]["fnHargaSatuan"].value
    var nGrosir = document.forms["formTambahDataProduk"]["fnGrosir"].value
    var nHargaGrosir = document.forms["formTambahDataProduk"]["fnHargaGrosir"].value
    var nJasaKirim = document.forms["formTambahDataProduk"]["jasaKirim[]"].value

    if(nProduk == "") {
        alert("You must fill the product name")
        return false
    }
    if(nDeskripsi == "") {
        alert("You must fill the description")
        return false
    }
    if(nKategori == "") {
        alert("You must choose the category")
        return false
    }
    if(nSubKategori == "") {
        alert("You must choose the sub category")
        return false
    }
    if(nHargaSatuan == "") {
        alert("You must fill the price")
        return false
    }
    if(nGrosir == "") {
        alert("You must select")
        return false
    }
    if(nGrosir == "Ya" && document.forms["formTambahDataProduk"]["fnHargaGrosir"].value == "") {
        alert("You must fill the price if it's distributor")
        return false
    } else if (isNaN(document.forms["formTambahDataProduk"]["fnHargaGrosir"].value)) {
        alert("Distributor price must be number")
        document.forms["formTambahDataProduk"]["fnHargaGrosir"].value = "";
        return false
    }
    var selectJasaKirim = 0
    for (var i = 0; i < jasaKirim.length; i++){
        if (nJasaKirim[i].checked) {
            selectJasaKirim++
        }
    }
    if (selectJasaKirim < 3) {
        alert("You must choose minimal 3 delivery service")
        return false
    }
    if(document.forms["formTambahDataProduk"]["captchaInput"].value != document.forms["formTambahDataProduk"]["captchaText"].value) {
        alert("Please type Captcha correctly")
    }
    alert('Successful! Thank you for filling the form')
    return true
}

function select_subKategory(){
    let fnKategori = document.forms["formTambahDataProduk"]["fnKategori"].value
    switch (fnKategori) {
        case "Baju":
            document.getElementById("fnSubKategori").innerHTML = 
                '<option value="Baju Pria">Baju Pria</option>' +
                '<option value="Baju Wanita">Baju Wanita</option>' +
                '<option value="Baju Anak">Baju Anak</option>'
            break
        case "Elektronik":
            document.getElementById("fnSubKategori").innerHTML = 
                '<option value="Mesin Cuci">Mesin Cuci</option>' +
                '<option value="Kulkas">Kulkas</option>' +
                '<option value="AC">AC</option>'
            break
        case "Alat Tulis":
            document.getElementById("fnSubKategori").innerHTML = 
                '<option value="Kertas">Kertas</option>' +
                '<option value="Map">Map</option>' +
                '<option value="Pulpen">Pulpen</option>'
            break
    }
}

function checkedGrosir() {
    var nGrosir = document.forms["formTambahDataProduk"]["fnGrosir"].value
    if (nGrosir == "Ya") {
        document.getElementById("fnHargaGrosir").disabled = false
    } else {
        document.getElementById("fnHargaGrosir").disabled = true
    }
}

function generateCaptcha(){
    let code = ""

    for (let i = 0; i < 5; i++) {
        const randomCharCode = Math.floor(Math.random() * 26) + (Math.random() < 0.5 ? 65 : 97);
        const randomChar = String.fromCharCode(randomCharCode);
        code += randomChar;
    }
    document.forms["formTambahDataProduk"]["captchaText"].value = code
}