// Nama : Fitra Syamli Yudhisaputra
// Nim  : 24060121140124
// lab  : A2
// Tanggal : 05/10/2023 

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
  var email = encodeURI(document.forms["daftar"]["email"].value);
  var inner = "email_status";
  var url = "get_user.php?email=" + email;
  var xmlhttp = getXMLHttpRequest();

  // Menentukan jenis permintaan dan URL
  if (email != "") {
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
      document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var response = xmlhttp.responseText;
        if (response == false) {
          document.getElementById(inner).innerHTML = "<span style='color: red;'>Email tidak tersedia</span>";
        } else {
          document.getElementById(inner).innerHTML = "<span style='color: green;'>Email tersedia</span>";
        }
      }
      return false;
    };
    xmlhttp.send(null);
  } else {
    alert("Please fill all the fields.");
  }
}

function getKabupaten(kode_prov) {
  var inner = "kabupaten";
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;

  //TODO 9 : write ajax request to url
  var xmlhttp = getXMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(inner).innerHTML = xmlhttp.responseText;
    }
    return false;
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
