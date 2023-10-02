/**
 * Nama        : Mulya Irwansyah
 * NIM         : 24060121140110
 * Deskripsi   : file yang berisi fungsi-fungsi ajax yang akan dipanggil di file lain
*/

// fungsi untuk membuat objek XMLHttpRequest sebagai core ajax
function getXMLHTTPRequest() {
  if (window.XMLHttpRequest) {
    // code untuk modern browsers
    // Semua browser modern (Chrome, Firefox, IE7+, Edge, Safari, Opera)
    // memiliki objek XMLHttpRequest bawaan.

    return new XMLHttpRequest(); 
  } else { 
    // code untuk old IE browsers
    return new ActiveXObject('Microsoft.XMLHTTP');
  }
  // Objek XMLHttpRequest dapat digunakan untuk bertukar data dengan server
  // web di belakang layar. Ini berarti dimungkinkan untuk memperbarui bagian
  // halaman web, tanpa memuat ulang seluruh halaman.
}

// fungsi untuk melakukan request ke get_server_time.php melalui ajax
function get_server_time() {
  var xmlhttp = getXMLHTTPRequest();
  var page = 'get_server_time.php';
  xmlhttp.open('GET', page, true);
  xmlhttp.onreadystatechange = function () {
    document.getElementById('showtime').innerHTML = '<img src="images/ajax_loader.png"/>';
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('showtime').innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.send(null);
}

// menampilkan nama di add customer dengan metode GET
function add_customer_get() {
  var xmlhttp = getXMLHTTPRequest();
  // get input value
  // Kegunaan Javascript encodeURI itu adalah untuk mengeliminasi string di url sehingga bisa menjadi URL Friendly. 
  // Fungsi ini mengkodekan semua karakter khusus, kecuali:, /? : @ & = + $ #
  var name = encodeURI(document.getElementById('name').value);
  var address = encodeURI(document.getElementById('address').value);
  var city = encodeURI(document.getElementById('city').value);

  //validate
  if (name != '' && address != '' && city != '') {
    // set url and inner
    var url = 'add_customer_get.php?name=' + name + '&address=' + address + '&city=' + city;
    // alert(url);
    // inner merupakan nama variabel dari id "add_response"
    var inner = 'add_response';
    // open request
    xmlhttp.open('GET', url, true);
    // Properti onreadystatechange mendefinisikan fungsi yang akan dieksekusi ketika readyState berubah.
    // Properti status dan properti statusText menyimpan status objek XMLHttpRequest. Memegang status
    // XMLHttpRequest. Fungsi onreadystatechange dipanggil setiap kali readyState berubah.
    xmlhttp.onreadystatechange = function () {
      document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
      // readyState: 4: request finished and response is ready status: 200: "OK" When readyState is 4 and
      // status is 200, the response is ready: since when xmlhttp. readyState == 4 , response is ready,
      // why do we still need xmlhttp.
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
    };
    xmlhttp.send(null);
  } else {
    alert('Please fill all the fields');
  }
}

// Fungsi untuk menambahkan data customer dengan metode POST
function add_customer_post() {
  var xmlhttp = getXMLHTTPRequest();
  // get input value
  var name = encodeURI(document.getElementById('name').value);
  var address = encodeURI(document.getElementById('address').value);
  var city = encodeURI(document.getElementById('city').value);
  if (name != '' && address != '' && city != '') {
    // set url and inner
    var url = 'add_customer_post.php';
    alert(url);
    var inner = 'add_response';
    // set parameter and open request
    var params = 'name=' + name + '&address=' + address + '&city=' + city;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function () {
      document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
    };
    xmlhttp.send(params);
  } else {
    alert('Please fill all the fields');
  }
}

// Fungsi urlAjax
function callAjax(url, inner) {
  var xmlhttp = getXMLHTTPRequest();
  xmlhttp.open('GET', url, true);
  xmlhttp.onreadystatechange = function () {
    document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(inner).innerHTML = xmlhttp.responseText;
    }
    return false;
  };
  xmlhttp.send(null);
}

// Fungsi untuk menampilkan data customer
function showCustomer(customerid) {
  var inner = 'detail_customer';
  var url = 'get_customer.php?id=' + customerid;
  if (customerid == '') {
    document.getElementById(inner).innerHTML = '';
  } else {
    callAjax(url, inner);
  }
}

// Fungsi untuk menampilkan data buku 
function showBooks(title) {
  var inner = 'detail_books';
  var url = 'get_books.php?id=' + title;
  if (title == '') {
    document.getElementById(inner).innerHTML = '';
  } else {
    callAjax(url, inner);
  }
}