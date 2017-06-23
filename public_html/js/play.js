$(document).ready(function () {
    $(".panel").on("show.bs.collapse hide.bs.collapse", function () {
        //Toggle direction of arrow
        $(this).find(".fa-chevron-right").toggleClass("down");
    })
});