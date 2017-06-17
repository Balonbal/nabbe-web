$(document).ready(function() {
	let friends = ["Sly","Aksei","hakun","ice_poseidon","me","myself","I"];
	const currentFriendList = $("#currentFriendList");

	fetchUsers();
	putFriendsInList();
	// Ofc we have to fetch this from our server somehow.
	function fetchUsers() {
		//TODO
		//This is going to fill the friends-array.
	}

	function putFriendsInList() {
		for(let i = 0; i < friends.length; i++) {
			currentFriendList.append(
				$('<li>').attr('class','list-group-item').text(friends[i]).append(
					$('<a>').attr('href','javascript:void(0)').append(
						$('<span>').attr('class', 'glyphicon glyphicon-trash').attr('style', 'float:right')
			)));
		}
	}
	let deleteFriendBtns = $(".glyphicon-trash")

	for (let i = 0; i < deleteFriendBtns.length; i++) {
		deleteFriendBtns[i].addEventListener("click", function() {
			console.log("deleted " + deleteFriendBtns[i].parentNode.parentNode.innerHTML);
			deleteFriendBtns[i].parentNode.parentNode.remove();
			//Ofc you also have to delete this on the server somehow.
		});
	}
});