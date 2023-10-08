// Nama : Mitslina
// Nim  : 24060121130068
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
  var email = document.forms["daftar"]["email"].value;
  var inner = "error_email";
  var url = "get_user.php?email=" + email;
  
  //TODO 8 : write ajax request to url
  var xmlhttp = getXMLHttpRequest();

  xmlhttp.open("GET", url, true);

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var response = xmlhttp.responseText.trim();
      if (response == "available") {
        document.getElementById(inner).innerHTML = "Email tersedia.";
        document.getElementById(inner).style.color = "green";
      } else {
        document.getElementById(inner).innerHTML = "Email sudah digunakan.";
        document.getElementById(inner).style.color = "#b91c1c";
      }
    }
  }
  xmlhttp.send(null);
}



function getKabupaten(kode_prov) {
  var inner = "kabupaten";
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;
  
  //TODO 9 : write ajax request to url
  if(kode_prov == ""){
    document.getElementById(inner).innerHTML = '';
  }else {
    var xmlhttp = getXMLHttpRequest(); 
    xmlhttp.open('GET', url, true); 
    console.log = url;
    xmlhttp.onreadystatechange = function() { 
      if ((xmlhttp.readyState== 4) && (xmlhttp.status == 200)) { 
          document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.send(null);
  }
}
