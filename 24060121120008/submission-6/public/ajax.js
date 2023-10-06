// Nama : Tiara Fitra Ramadhani Siregar
// Nim  : 24060121120008
// lab  : PBP A2

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
  var email = encodeURI(document.forms["forms"]["email"].value);
  var inner = "error_email";
  var url = "get_user.php?email=" + email;

  var ajax = getXMLHttpRequest();
  ajax.open('GET', url, true);
  ajax.send();

  ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {
          if (ajax.status == 200) {
              if (ajax.responseText.trim() === "false") {
                  document.getElementById(inner).innerHTML =
                      "<p style='color: green;'>Email tersedia!</p>";
                  document.getElementById('submit').disabled = false;
              } else if (ajax.responseText.trim() === "true") {
                  document.getElementById(inner).innerHTML =
                      "<p style='color: red;'>Email sudah terdaftar!</p>";
                  document.getElementById('submit').disabled = true;
              } else {
                  console.error("Unexpected response from server: " + ajax.responseText);
              }
          } else {
              console.error("An error occurred while processing the request.");
          }
      }
  };
}


function getKabupaten(kode_prov) {
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;

  // TODO 9: Membuat permintaan Ajax ke URL
  var xmlhttp = getXMLHttpRequest();
  xmlhttp.open("GET", url, true);

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
      document.getElementById('kabupaten').innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.send();
}
