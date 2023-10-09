// Nama : Ardian Fajar Widyaputra
// Nim  : 24060121140116
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
  var email = document.getElementById("email").value;

  if (email.trim() !== "") {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "check_email.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              document.getElementById("error_email").innerHTML = xhr.responseText;
          }
      };
      xhr.send("email=" + email);
  } else {
      document.getElementById("error_email").innerHTML = "";
  }
}

function getKabupaten(kodeProvinsi) {
  var kabupatenSelect = document.getElementById('kabupaten');
  var errorKabupaten = document.getElementById('error_kabupaten');
  
  // Kosongkan daftar kabupaten saat memilih provinsi lain
  kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
  
  // Kirim permintaan Ajax ke server
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'get_kabupaten_by_provinsi.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
              // Isi daftar kabupaten berdasarkan data dari server
              response.kabupaten.forEach(function(kab) {
                  var option = document.createElement('option');
                  option.value = kab.kode_kab;
                  option.textContent = kab.nama_kab;
                  kabupatenSelect.appendChild(option);
              });
          } else {
              // Tampilkan pesan error jika terjadi kesalahan
              errorKabupaten.textContent = 'Gagal memuat daftar kabupaten.';
          }
      }
  };
  xhr.send('kode_prov=' + kodeProvinsi);
}

function getProvinsi() {
  var provinsiSelect = document.getElementById('provinsi');
  var errorProvinsi = document.getElementById('error_provinsi');

  // Kirim permintaan Ajax ke server
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_provinsi.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
          if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              if (response.success) {
                  // Isi daftar provinsi berdasarkan data dari server
                  response.provinsi.forEach(function(prov) {
                      var option = document.createElement('option');
                      option.value = prov.kode_prov;
                      option.textContent = prov.nama_prov;
                      provinsiSelect.appendChild(option);
                  });
              } else {
                  // Tampilkan pesan error jika terjadi kesalahan
                  errorProvinsi.textContent = 'Gagal memuat daftar provinsi.';
              }
          } else {
              // Tampilkan pesan error jika terjadi kesalahan saat menghubungi server
              errorProvinsi.textContent = 'Gagal menghubungi server.';
          }
      }
  };
  xhr.send();
}

window.onload = getProvinsi;





