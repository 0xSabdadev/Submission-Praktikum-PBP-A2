function getXMLHTTPRequest() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else {
		return new ActiveXObject('Microsoft.XMLHTTP');
	}
}

function get_server_time() {
	const xhr = getXMLHTTPRequest();
	const page = '../controllers/get_server_time.php';

	callAjax(page, 'showtime');
	xhr.send(null);
}

function add_customer_get() {
	const xhr = getXMLHTTPRequest();

	const name = encodeURI(document.getElementById('name').value);
	const address = encodeURI(document.getElementById('address').value);
	const city = encodeURI(document.getElementById('city').value);

	// Validate
	if (name != '' && address != '' && city != '') {
		// set url and inner
		const url = `../controllers/add_customer_get.php?name=${name}&address=${address}&city=${city}`;
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

	// Validate
	if (name != '' && address != '' && city != '') {
		// TODO 3: Buatlah sebuah HTTP Request dengan method POST
		// set url, inner, and parameter
		const url = `../controllers/add_customer_post.php`;
		const inner = 'add_response';
		const params = `name=${name}&address=${address}&city=${city}`;

		// open request
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
	const url = `../controllers/get_customer.php?id=${customerid}`;
	if (customerid === '') {
		document.getElementById(inner).innerHTML = '';
	} else {
		callAjax(url, inner);
	}
}

function searchBooks() {
	const title = document.getElementById('title').value;
	const url = `../controllers/get_book.php?title=${title}`;
	const inner = 'search_results';

	callAjax(url, inner);
}

// function displaySearchResults(results) {
// 	const resultContainer = document.getElementById('search_results');
// 	resultContainer.innerHTML = '';

// 	if (results.length === 0) {
// 		resultContainer.innerHTML = 'No search result';
// 	} else {
// 		for (let i = 0; i < results.length; i++) {
// 			const result = results[i];
// 			const resultItem = document.createElement('div');
// 			resultItem.innerHTML = `<p>${result.title}</p>`;
// 			resultItem.innerHTML += `<p>${result.author}</p>`;

// 			resultItem.onclick = function () {
// 				showBookDetails(result.isbn, 'book-detail');
// 				resultContainer.innerHTML = '';
// 			};
// 			resultContainer.appendChild(resultItem);
// 		}
// 	}
// }

// function showBookDetails(bookISBN, inner) {
// 	const xhr = getXMLHTTPRequest();
// 	const url = `../controllers/book_details.php?isbn=${bookISBN}`;

// 	xhr.open('GET', url, true);
// 	xhr.onreadystatechange = function () {
// 		if (xhr.readyState == 4 && xhr.status == 200) {
// 			document.getElementsByClass(inner).innerHTML = xhr.responseText;
// 		}
// 	};
// 	xhr.send(null);
// }
