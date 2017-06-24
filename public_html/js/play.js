$(document).ready(function () {
    $(".panel").on("show.bs.collapse hide.bs.collapse", function () {
        //Toggle direction of arrow
        $(this).find(".fa-chevron-right").toggleClass("down");
    });
    $(".answer-box").click(function () {
        //Reset selected box
        $(".answer-box.selected").removeClass("selected");
        $(this).addClass("selected");
    })
});