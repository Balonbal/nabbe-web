
function sendRequest(url, callback) {
    $.ajax({
        "url" : url,
        "success": callback
    })
}