function validateDate() {
	if(document.forms["form_peminjaman"]["tanggal-pinjam"].value=="")
		var startTime = new Date();
	else
		var startTime = new Date(document.forms["form_peminjaman"]["tanggal-pinjam"].value);
	var finishTime = new Date(document.forms["form_peminjaman"]["tanggal-kembali"].value);
	var currentTime = new Date();
	if(startTime < currentTime) {
		alert("Tanggal minimal peminjaman adalah hari ini");
	}
	else if(finishTime <= startTime) {
		alert("Tanggal selesai peminjaman harus setelah tanggal peminjaman");
	}
	else {
		return true;
	}
	
	return false;
	
}

function validateDatePerbaikan() {
	var finishTime = new Date(document.forms["form_perbaikan"]["estimasi"].value);
	var currentTime = new Date();
	if(finishTime < currentTime) {
		alert("Tanggal minimal peminjaman adalah hari ini");
	}
	else {
		return true;
	}
	return false;
}