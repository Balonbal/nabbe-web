$(document).ready(function () {
});

function populate() {
    if (typeof store !== "undefined") {
        if (typeof store.JWT.jwt !== "undefined") {
            store.jwtDecoded = parseJwt(store.JWT.jwt);

            $.when(fetchUserData(store.jwtDecoded.sub)).done(function (me) {
                if (me) {
                    store.me = me;
                    $(".username").text(me.username);
                }
            })
        }
    }
}

function getBaseDomain() {
    return window.location.protocol + "//" + window.location.host;
}

function fetchUserData(uuid) {
    return $.post(
        getBaseDomain() + "/api/profile/get",
        JSON.stringify({uuid: uuid}),
        "json"
    ).done(function (data) {
        return data;
    }).fail(function (data) {
        console.log(data);
        return false;
    })
}

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