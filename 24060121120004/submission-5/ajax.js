// Nama - NIM      : Duma Mora Arta Sitorus - 24060121120004
// Deskripsi Kode  : Fungsi ajax javascript
//-----------------------------------------------------------

//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
        //code for modern browser
        return new XMLHttpRequest();
    } else {
        //code for old IE browser
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

//fungsi untuk melakukan request ke get_server_time.php melalui ajax
function get_server_time(){
    var xmlhttp = getXMLHTTPRequest();
    var page = 'get_server_time.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function(){
        document.getElementById('showtime').innerHTML = '<img src="../images/ajax_loader.png"/>';
        if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById('showtime').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

function add_customer_get(){
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var name = encodeURI(document.getElementById('name').value);
    var address= encodeURI(document.getElementById('address').value);
    var city = encodeURI(document.getElementById('city').value);
    //validate
    if(name != "" && address != "" && city != ""){
        //set url and inner
        var url = "add_customer_get.php?name=" + name + "&address=" + address + "&city=" + city;
        //alert(url)
        var inner = "add_response";
        //open request
        xmlhttp.open('GET', url, true);
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(null);
    } else{
        alert("Please fill all the fields");
    }    
}

function add_customer_post() {
    var xmlhttp = getXMLHTTPRequest();

    var name = encodeURI(document.getElementById('name').value);
    var address = encodeURI(document.getElementById('address').value);
    var city = encodeURI(document.getElementById('city').value);

    //validate
    if(name != "" && address != "" && city != ""){
        //set url and inner
        var url = "add_customer_post.php"; alert(url);
        var inner = "add_response";
        //set parameter and open request
        var params = "&name=" + name + "&address=" + address + "&city=" + city;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    } else {
        alert("Please fill all the fields");
    }
}

function callAjax(url,inner) {
    // TODO 4: Lengkapilah fungsi callAjax()
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.open('GET', url, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById(inner).innerHTML = '<img src="image/ajax_loader.png"/>';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function showCustomer(customerid) {
    // TODO 5: Lengkapilah fungsi showCustomer()
    var inner = 'detail_customer';
    var url = 'get_customer.php?id=' + customerid;
    if (customerid=="") {
        document.getElementById(inner).innerHTML = '';
    }else{
        callAjax(url, inner);
    }
}

function searchBooksByTitle() {
    var title = document.getElementById("title").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "search_result.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Perbarui hasil pencarian pada div dengan id "search-result"
            document.getElementById("search-result").innerHTML = xhr.responseText;
        }
    };

    var data = "title=" + encodeURIComponent(title);
    xhr.send(data);
}

document.addEventListener("DOMContentLoaded", function () {
    var titleInput = document.getElementById("title");

    titleInput.addEventListener("input", function () { 
        searchBooksByTitle();
    });
});

