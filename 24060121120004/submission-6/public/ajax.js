// Nama : Duma Mora Arta Sitorus
// Nim  : 2406012112004
// lab  : A1

function getXMLHttpRequest() {
  if (window.XMLHttpRequest) {
    //code for modern browser
    return new XMLHttpRequest();
  } else {
    //code for old IE browser
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}

function getUser() {
  var email = encodeURI(document.forms["formulir"]["email"].value);
  var inner = "error_email";
  var url = "get_user.php?email=" + email;

  // TODO 8: Membuat permintaan Ajax ke URL
  var xmlhttp = getXMLHttpRequest();
  xmlhttp.open("GET", url, true);

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
      document.getElementById(inner).innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.send();
}


function getKabupaten(kode_prov) {
  var inner = "kabupaten";
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;

  // Buat objek XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // Tentukan jenis permintaan dan URL
  xhr.open('GET', url, true);

  // Atur callback untuk menangani respons
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          var dropdownKabupaten = document.getElementById('kabupaten');
          dropdownKabupaten.innerHTML = xhr.responseText;
      }
  };

  // Kirim permintaan
  xhr.send();
};



