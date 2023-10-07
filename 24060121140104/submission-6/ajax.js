// Nama : Divia Shinta Sukarsaatmadja
// Nim  : 24060121140104
// lab  : A2

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
  var email = document.forms["daftar"]["email"].value.trim();
  var inner = "emailAvailability";

  if (email === '') {
      document.getElementById(inner).innerHTML = "<span style='color: red;'>Email tidak boleh kosong</span>";
      return;
  }

  email = encodeURI(email);
  var url = "get_user.php?email=" + email;

  //TODO 8 : write ajax request to url
  var xmlhttp = getXMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var response = xmlhttp.responseText;

          var emailAvailability = document.getElementById(inner);
          if (response.includes('Email telah digunakan')) {
              emailAvailability.style.color = 'red';
          } else {
              emailAvailability.style.color = 'green';
          }
          emailAvailability.innerHTML = response;
      }
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

function getKabupaten(kode_prov) {
  var inner = "kabupaten";
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;

  //TODO 9 : write ajax request to url
  var xmlhttp = getXMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(inner).innerHTML = xmlhttp.responseText;
    }
  };

  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
