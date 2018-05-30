var checkCount = 0;

function countChecks(element) {
	if (element.checked == true) {
		checkCount++;
	} else {
		checkCount--;
	}
	return true;
}

function checksubmit(element) {
	if (checkCount < 5) {
		var numShort = 5 - checkCount;
		alert("Please select at least " + numShort.toString() + " more animes.");
		return false;
	}
	
	alert("Your answer has been successfully submitted. Thank you!");
	return true;
}