/**
 * 
 */
var isValid = [ false, false ];
function isTitleValid() {
	var title = $("#title").val();

	if (title.length === 0) {
		$("#warnName")
				.html(
						"&nbsp;&nbsp;<font color='red'>You can't leave this empty.</font>");
		isValid[0] = false;
	}

	else if (title.length > 70) {
		$("#warnName")
				.html(
						"&nbsp;&nbsp;<font color='red'>The title is formed by no more than 70 charaters.</font>");
		isValid[0] = false;
	}

	else {
		$("#warnName")
				.html(
						"&nbsp;&nbsp;<font color='green'>You can use this title.</font>");
		isValid[0] = true;
	}
}
function isDescriptionValid() {
	var description = $("#description").val();

	if (description.length === 0) {
		$("#warnName1")
				.html(
						"&nbsp;&nbsp;<font color='red'>You can't leave this empty.</font>");
		isValid[1] = false;
	}

	else if (description.length > 1000) {
		$("#warnName1")
				.html(
						"&nbsp;&nbsp;<font color='red'>The description is formed by no more than 1000 charaters.</font>");
		isValid[1] = false;
	}

	else {
		$("#warnName1")
				.html(
						"&nbsp;&nbsp;<font color='green'>You can use this description.</font>");
		isValid[1] = true;
	}
}

function isAllValid() {
	if (isValid[0] === false) {
		document.getElementById('title').focus();
	}

	if (isValid[1] === false) {
		document.getElementById('description').focus();
	}

	else {
		$("#warnAgree").html("");
		$('#uploadModal').modal('show');
		document.getElementById('wishCreatedform').submit();
	}
}

function checkImg() {
	var txtImg = document.getElementById("File1");
	if (txtImg.value == "") {
		alert("Please choose .jpg or .png file!");
		txtImg.focus();
		return false;
	}

	var txtImg_url = txtImg.value.toLowerCase();
	var txtImg_ext = txtImg_url.substring(txtImg_url.length - 3,
			txtImg_url.length);
	if (txtImg_ext != "jpg" && txtImg_ext != "png") {
		alert("Please choose .jpg or .png!");
		txtImg.select();
		document.execCommand("Delete");
		txtImg.focus();
		return false;
	}
	alert('The image is ok!');
	return true;
}