$(document).ready(function () {
    if (typeof store !== "undefined") {
        if (typeof store.JWT.jwt !== "undefined") {
            store.jwtDecoded = parseJwt(store.JWT.jwt);

            var names = $(".username");
            for (var i = 0; i < names.length; ++i) {
                names[i].innerText = store.jwtDecoded.sub;
            }
        }
    }
});

function sendRequest(url, callback, error) {
    $.ajax({
        "url" : url,
        "success": callback,
        "error": (error ? error : function (err) {
                console.log(err);
            })
    })
}

function parseJwt (token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace('-', '+').replace('_', '/');
    return JSON.parse(window.atob(base64));
}