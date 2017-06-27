var example = {
    "text": "Wake up<br>Grab a brush and put a little (makeup)<br>Grab a brush and put a little<br>",
    "options": [
        {id: 23, text: "Geirs sang"},
        {id: 64, text: "tinuseses sang"},
        {id: 84, text: "Et annet alternativ"},
        {id: 115, text: "Jeg har faktisk ingen anelse om hva det riktfulle svaret er"}
    ], time: 3
};
var selected = 0;
function checkAnswer() {
    //TODO get correctness from server
    var correct = (Math.random() >= 0.5);
    var correctAnswer = Math.floor(Math.random() * 4) + 1;
    console.log(correctAnswer);

    $(".answer-box").addClass("wrong").css({cursor: "not-allowed"})
        .find(".fa")
        .removeClass("fa-question").addClass("fa-times");
    $("#option-" + (correctAnswer + 1)).parents(".answer-box")
        .removeClass("wrong").addClass("correct")
        .find(".fa")
        .removeClass("fa-times").addClass("fa-check");

}


function loadQuestion(question) {
    $("#game-screen").removeClass("hidden");
    $(".question-body").html(question.text);
    $.each(question.options, function (i, opt) {
        $("#option-" + (i + 1)).text(opt.text);
    });
    $("#timebar")
        .css({width: "100%"})
        .removeClass("progress-bar-warning progress-bar-danger")
        .animate({width: "0%"},
            { duration: question.time * 1000,
            step: function (s) {
                $(this).text(timify(s * question.time / 100));
                if (Math.abs(s - 50) < 0.1) $(this).addClass("progress-bar-warning");
                if (Math.abs(s - 25) < 0.1) $(this).removeClass("progress-bar-warning").addClass("progress-bar-danger");
            }, easing: "linear",
            complete: checkAnswer}
        )
}

function timify(num) {
    return Math.floor(num/60) + ":" + (num % 60 < 10 ? "0" : "") + Math.floor(num % 60);
}
$(document).ready(function () {
    $(".panel").on("show.bs.collapse hide.bs.collapse", function () {
        //Toggle direction of arrow
        $(this).find(".fa-chevron-right").toggleClass("down");
    });
    $(".answer-box").click(function () {
        //Reset selected box
        $(".answer-box.selected").removeClass("selected");
        $(this).addClass("selected");
        selected = parseInt($(this).find(".option-text").prop("id").substr(("option-").length));

        //TODO Submit selection
    });

    //loadQuestion(example);
});