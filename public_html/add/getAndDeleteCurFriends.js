let friends = ["Sly","Aksei","hakun","ice_poseidon","me","myself","I"];
const currentFriendList = document.getElementById("currentFriendList");

fetchUsers();
putFriendsInList();
// Ofc we have to fetch this from our server somehow.
function fetchUsers() {
	//TODO
	//This is going to fill the friends-array.
}

function putFriendsInList() {
	for(let i = 0; i < friends.length; i++) {
		const li = document.createElement("li");
		li.innerHTML=friends[i];
		li.setAttribute("class", "list-group-item");

		const a = document.createElement("a");
    	a.href = "javascript:void(0)";

    	const span = document.createElement("span");
    	span.setAttribute("class", "glyphicon glyphicon-trash");
	    span.setAttribute("style", "float:right");
    	a.appendChild(span);


    	li.appendChild(a);
		currentFriendList.appendChild(li);
	}
}

const deleteFriendBtns = document.querySelectorAll(".glyphicon-trash");

for (let i = 0; i < deleteFriendBtns.length; i++) {
	deleteFriendBtns[i].addEventListener("click", function() {
		console.log("deleted " + deleteFriendBtns[i].parentNode.parentNode.innerHTML);
		currentFriendList.removeChild(deleteFriendBtns[i].parentNode.parentNode);
		//Ofc you also have to delete this on the server somehow.
	});
}
