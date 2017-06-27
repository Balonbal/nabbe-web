function appendHistory(match) {
	console.log(match);
    $("<div>")
        .addClass("list-group-item")
        .addClass("text-center")
        .addClass(getResultClass(match.result))
        .append($("<div>")
            .addClass("row")
            .append($("<div>")
                .addClass("col-sm-9")
				.text(getResultPrep(match.result))
				.append(getProfileLink(match.opponent))
				.append(" with a score of ")
				.append(getResultText(match))
            )
            .append($("<small>")
                .addClass("col-sm-3")
                .text(getTimeString(match.time))
            )
        )
        .appendTo("#match-history");
}

function getResultClass(result) {
	switch (result) {
		case "win": 	return 	"list-group-item-success";
		case "loss": 	return 	"list-group-item-danger";
		case "tie": 	return 	"list-group-item-warning";
		default: 		return 	"hidden";
	}
}

function getResultPrep(result) {
    switch (result) {
        case "win": 	return 	"You won against ";
        case "loss": 	return 	"You lost to ";
        case "tie": 	return 	"You tied with ";
    }
}

function getResultText(match) {
	var me = 0, op = 0;
	$.each(match.scores, function (i, score) {
		me += score.me;
		op += score.opponent;
    });

	return $("<span>")
		.append($("<strong>")
			.text(me))
		.append("-")
		.append($("<strong>")
			.text(op));
}

function getProfileLink(user) {
	return $("<a>")
		.prop("href", "?view=" + user)
		.addClass("alert-link")
		.text(user)
}

function getTimeString(time) {
    return "just now";
}

function fetchProfile(username) {

}

$(document).ready(function () {
	$("#nameChangeForm").validator({
		custom: {
			"not-equals": function (el) {
				if (el.val() === store.jwtDecoded.sub) {
					return "No need to change to the same name"
				}
			}
		}
	}).submit(function (e) {
		e.preventDefault();;
		var data = $("#nameChangeForm").serializeArray();
		var obj = {username: data[0]["value"]};
		$.post($(this).prop("action"),
			JSON.stringify(obj), "json"
		).done(function(data) {
			alert("New username: " + data.new_username);
			$(".username").text(data.new_username);
		}).fail(function (data) {
			alert("Error updating username: " + JSON.parse(data.responseText).error);
        });

		return false;
    })
});
