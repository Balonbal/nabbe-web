$(document).ready(function () {
	$("#nameChangeForm").validator({
		custom: {
			"not-equals": function (el) {
				if (el.val() === store.jwtDecoded.sub) {
					return "No need to change to the same name"
				}
			}
		}
	});
});
