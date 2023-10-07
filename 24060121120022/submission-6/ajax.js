// Nama : Aprilyanto Setiyawan Siburian
// Nim  : 24060121120022
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
  var email = encodeURI(document.forms["daftar"]["email"].value);
	var inner = "error_email";
	var url = "get_user.php?email=" + email;
	//TODO 8 : write ajax request to url
	var ajax = getXMLHttpRequest();
	ajax.open('GET', url, true);
	ajax.send();
	// Set response
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			if (!ajax.responseText) {
				document.getElementById(inner).innerHTML =
					"<p style='color: green;'>Email Belum Digunakan</p>";
				document.getElementById('submit').disabled = false;
			} else {
				document.getElementById(inner).innerHTML =
					"<p style='color: red;'>Email Sudah Digunakan</p>";
				document.getElementById('submit').disabled = true;
			}
		}
	};
}

function getKabupaten(kode_prov) {
  var inner = "kabupaten";
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;

  // TODO 9 : write ajax request to url
  // Membuat objek XMLHttpRequest
  var ajax = new XMLHttpRequest();

  // Menyiapkan permintaan GET ke URL
  ajax.open('GET', url, true);

  // Menangani perubahan status permintaan
  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        document.getElementById(inner).innerHTML = ajax.responseText;
      } else {
        // Handle error here (e.g., display an error message)
        console.log('Error: ' + ajax.statusText);
      }
    }
  };

  // Mengirim permintaan
  ajax.send();
}
