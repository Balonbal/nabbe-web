function updateUsers() {
    $.post("http://nabbe.gabeorama.org/api/stats/active_users", {}, "json").done(function (data) {
        $(".active_users").text(data.active_users);
    });
}

updateUsers();
setInterval(updateUsers, 5000);