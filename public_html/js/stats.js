function updateUsers() {
    $.post("http://nabbe.gabeorama.org/api/stats/active_users", {}, "json").done(function (data) {
        $(".active_users").text(data.active_users);
        $(".total_users").text(data.total_users);
        $(".active_percent").text("(" + (100 * data.active_users / data.total_users).toFixed(1) + "%)")
    });
}

updateUsers();
setInterval(updateUsers, 5000);