function appendList(friend) {
    //Assume presorted
    var el = $("<li></li>")
        .addClass("list-group-item")
        .text(friend.username)
        .append(
            $("<a>")
                .prop("href", "#")
                .prop("data-toggle", "tooltip")
                .prop("title", "Delete")
                .append(
                    $("<span>")
                        .addClass("fa")
                        .addClass("fa-trash-o")
                )
                .on({
                    click: function (e) {
                        var li = $(this.closest("li"));
                        if (sendRemoveRequest(li.text())) {
                            li.remove();
                        }
                    }
                })
        )
        .appendTo("#currentFriendList");

    if (!friend.accepted) {
        $(el).append(
            $("<span>")
                .prop("data-toggle", "tooltip")
                .prop("title", "Friend Request Pending")
                .addClass("fa")
                .addClass("fa fa-exclamation-triangle")
            )
            .addClass("list-group-item-warning");
    }
}

function sendRemoveRequest(friend) {
    console.log(friend);
    //TODO
    return true;
}

function fetchUsers(offset) {
    sendRequest("http://nabbe.gabeorama.org/api/friends/list", function (data) {
        $("#currentFriendList").empty();
        $.each(data, function(i, friend) {
            appendList(friend);
        });
    });
}

$(document).ready(function() {
    fetchUsers(0);

	/*var friends = ["Sly","Aksei","hakun","ice_poseidon","me","myself","I"];
	const currentFriendList = $("#currentFriendList");

	fetchUsers();
	putFriendsInList();
	// Ofc we have to fetch this from our server somehow.
	function fetchUsers() {
		//TODO
		//This is going to fill the friends-array.
	}

	function putFriendsInList() {
		for(var i = 0; i < friends.length; i++) {
			currentFriendList.append(
				$('<li>').attr('class','list-group-item').text(friends[i]).append(
					$('<a>').attr('href','javascript:void(0)').append(
						$('<span>').attr('class', 'glyphicon glyphicon-trash').attr('style', 'float:right')
			)));
		}
	}

	var deleteFriendBtns = $(".glyphicon-trash");

	for (var i = 0; i < deleteFriendBtns.length; i++) {
		deleteFriendBtns[i].addEventListener("click", function() {
			console.log("deleted " + deleteFriendBtns[i].parentNode.parentNode.innerHTML);
			deleteFriendBtns[i].parentNode.parentNode.remove();
			//Ofc you also have to delete this on the server somehow.
		});
	}*/
});