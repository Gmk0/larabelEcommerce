$(function () {
    $("").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "method",
            url: $(this).attr("action"),
            data: new FormData(this),
            contentType: false,
            dataType: "json",
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $("span ." + prefix + "_error").text(val[0]);
                    });
                } else {
                    $("#main_form")[0].reset();
                    alert(data.msg);
                }
            },
        });
    });
});
