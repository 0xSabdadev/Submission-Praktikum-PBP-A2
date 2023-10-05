// Nama : Sheva Ivanda Pratama
// Nim  : 24060120140089
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
  $.post('get_user.php', {'email' : email}, function(data) {
    if (data == 1)
    { 
        $("#cekEmail").submit(); //Jika belum ada di database maka bisa langsung submit
    }
    else
    {
         alert("Email sudah ada di database"); //Jika sudah ada di database maka akan keluar alert
         return false;
    }
  });
}

function getKabupaten(kode_prov) {
  $.ajax({
    type: 'POST',
    url: 'get_kabupaten.php',
    data: { kode_prov: kode_prov },
    dataType: 'json',
    success: function (data) {
        $('#kode_kab').html('<option value="">Pilih kabupaten</option>');

        $.each(data, function (index, kabupaten) {
            $('#kode_kab').append('<option value="' + kabupaten.kode_kab + '">' + kabupaten.nama_kab + '</option>');
        });
    },
    error: function () {
        console.log('Error loading kabupaten data.');
    }
  });

  //TODO 9 : write ajax request to url
}
