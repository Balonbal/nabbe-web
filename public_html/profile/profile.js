//Buttons
const btnDelete = document.getElementById("btnDelete");
const btnChangeUN = document.getElementById("btnChangeUN");
const btnChangePW = document.getElementById("btnChangePW");

//Input fields
const inputUsername = document.getElementById("inputUsername");
const inputPasswordOld = document.getElementById("inputPasswordOld");
const inputPasswordNew1 = document.getElementById("inputPasswordNew1");
const inputPasswordNew2 = document.getElementById("inputPasswordNew2");

//I know it's a really shady way to get the old username, but I don't know how else I could do this.
let oldUsername = document.getElementById("oldUsername").innerHTML;

btnDelete.addEventListener('click', function (e) {
	if (confirm("Are you sure you want to permanently delete your account? (Note: this can not be reversed.)")) {
    	//Delete shit
    	console.log("delete shit");
	} else {
	    // Do nothing.
	    console.log("dont delete shit");
	}
});

btnChangeUN.addEventListener('click', function (e) {
	if (inputUsername.value === "" || inputUsername.value === oldUsername) {
		alert("Your new username can not be the same or blank.");
	} else {
		if (confirm("Are you sure you want to change your name to " + inputUsername.value + "?")) {
			oldUsername = inputUsername.value;
	    	console.log("Change name");
		} else {
		    console.log("dont change name");
		}
	}
});

btnChangePW.addEventListener('click', function (e) {
	
	if (confirm("Are you sure you want to change your password?")) {
    	console.log("Change password");
	} else {
	    console.log("dont change password");
	}
});
