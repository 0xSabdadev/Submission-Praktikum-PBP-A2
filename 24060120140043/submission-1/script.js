let subkategori = document.getElementById("subkategori");
let yes = document.getElementById("yes");
let no = document.getElementById("no");
let hargagrosir = document.getElementById("hargagrosir");
let jasakirim = document.getElementsByClassName("jasakirim");
let captcha = document.getElementById("captcha");
let captcha1 = document.getElementById("captcha1");

function dropdownlist(index){
    switch(index){
        case "Baju":
            subkategori.options[0] = new Option("Baju Pria");
            subkategori.options[1] = new Option("Baju Wanita");
            subkategori.options[2] = new Option("Baju Anak");
            break;
        case "Elektronik":
            subkategori.options[0] = new Option("Mesin Cuci");
            subkategori.options[1] = new Option("Kulkas");
            subkategori.options[2] = new Option("AC");
            break;
        case "AlatTulis":
            subkategori.options[0] = new Option("Kertas");
            subkategori.options[1] = new Option("Map");
            subkategori.options[2] = new Option("Pulpen");
            break;
        default:
            subkategori.options[0] = new Option("--Sub Kategori--");
            break;
    }
    return true;
}

function radiochecked(){
    if (no.checked){
        hargagrosir.disabled = true;
    }
    else if(yes.checked){
        hargagrosir.required = true;
        hargagrosir.disabled = false;
    }
}

let jasa = document.getElementById("jasa");
function checkbox(){
    let check = 0;
    for (var i=0;i<jasakirim.length;i++){
        if (jasakirim[i].checked){
            check++;
        }
    }
    if (check<2){
        alert("Minimal 3 jasa kirim")
    }
}

const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generateString(length) {
    let result = '';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

captcha.value = generateString(5);

function capcay(){
    if (captcha.value !== captcha1.value){
        alert("Captcha salah!");
    }
}
