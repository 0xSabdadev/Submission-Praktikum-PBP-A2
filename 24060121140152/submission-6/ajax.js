// Nama : Adri Audifirst
// Nim  : 24060121140152
// lab  : A2

function getUser() {
  var email = encodeURI(document.forms["daftar"]["email"].value);
  var inner = "error_email";
  var url = "get_user.php?email=" + email;

  //TODO 8 : write ajax request to url
  axios.get(url)
    .then(function (response) {
      if (!response.data) {
        document.getElementById(inner).innerHTML =
          "<p style='color: green;'>Email tersedia</p>";
        document.getElementById("submit").disabled = false;
      } else {
        document.getElementById(inner).innerHTML =
          "<p style='color: red;'>Email sudah digunakan</p>";
        document.getElementById("submit").disabled = true;
      }
    })
    .catch(function (error) {
      console.error("Error: " + error);
    });
}

function getKabupaten(kode_prov) {
  var inner = "kabupaten";
  var url = "get_kabupaten.php?kode_prov=" + kode_prov;

  //TODO 9 : write ajax request to url
  axios.get(url)
    .then(function (response) {
      document.getElementById(inner).innerHTML = response.data;
    })
    .catch(function (error) {
      console.error("Error: " + error);
    });
}