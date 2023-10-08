function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function callAjax(url,inner) {
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.open('GET',url,true);
    xmlhttp.onreadystatechange = function(){
        document.getElementById(inner).innerHTML = 'loading...';
        if((xmlhttp.readyState==4) && (xmlhttp.status==200)){
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
    
}

function getKabupaten(kode_prov) {
    var inner = 'kabupaten';
    var url = 'http://localhost/responsi_bismillah/app/model/get_kabupaten.php?id=' + kode_prov;
    if(kode_prov==""){
        document.getElementById(inner).innerHTML='';
    }else{
        callAjax(url,inner);
    }
}


function getUser() {
    var email = encodeURI(document.forms["daftar"]["email"].value);
    var inner = "error_email";
    var url = "http://localhost/responsi_bismillah/app/model/get_user.php?email=" + email;
  
    //TODO 8 : write ajax request to url
	callAjax(url,inner);
}

// function getUser(){
//     var email = encodeURI(document.forms["daftar"]["email"].value);
//     var inner = "error_email";

//     document.getElementById(inner).innerHTML = email;
// }