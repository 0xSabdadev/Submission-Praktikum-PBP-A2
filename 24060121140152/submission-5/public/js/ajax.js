// File: ajax.js
// Nama: Adri Audifirst
// NIM: 24060121140152
// Date: 3 September 2023
// Deskripsi: Fungsi Asynchronous Javascript dan XML
function getXMLHTTPRequest() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else {
		return new ActiveXObject('Microsoft.XMLHTTP');
	}
}

function get_server_time() {
	const xhr = getXMLHTTPRequest();
	const page = '../controller/get_server_time.php';

	callAjax(page, 'showtime');
	xhr.send(null);
}

function add_customer_get() {
	const xhr = getXMLHTTPRequest();

	const name = encodeURI(document.getElementById('name').value);
	const address = encodeURI(document.getElementById('address').value);
	const city = encodeURI(document.getElementById('city').value);

	if (name != '' && address != '' && city != '') {
		const url = `../controller/add_customer_get.php?name=${name}&address=${address}&city=${city}`;
		const inner = 'add_response';

		callAjax(url, inner);
	} else {
		alert('Please fill all the fields');
	}
}

function add_customer_post() {
	const xhr = getXMLHTTPRequest();

	const name = encodeURI(document.getElementById('name').value);
	const address = encodeURI(document.getElementById('address').value);
	const city = encodeURI(document.getElementById('city').value);

	if (name != '' && address != '' && city != '') {
		// TODO 3: Buatlah sebuah HTTP Request dengan method POST
		const url = `../controller/add_customer_post.php`;
		const inner = 'add_response';
		const params = `name=${name}&address=${address}&city=${city}`;

		xhr.open('POST', url, true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById(inner).innerHTML = xhr.responseText;
			}
			return false;
		};
		xhr.send(params);
	} else {
		alert('Please fill all the fields');
	}
}

function callAjax(url, inner) {
	const xhr = getXMLHTTPRequest();

	xhr.open('GET', url, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById(inner).innerHTML = xhr.responseText;
		}
		return false;
	};
	xhr.send(null);
}

function showCustomer(customerid) {
	const inner = 'detail_customer';
	const url = `../controller/get_customer.php?id=${customerid}`;
	if (customerid === '') {
		document.getElementById(inner).innerHTML = '';
	} else {
		callAjax(url, inner);
	}
}

function searchBooks() {
	const title = document.getElementById('title').value;
	const url = `../controller/get_book.php?title=${title}`;
	const inner = 'search_results';

	callAjax(url, inner);
}