function click_button() {
    alert("111");
}

function check_input(a, b) {
    $(a).attr("value", b);
}

function output_current(e) {
    let id_el = $(e).parents().children(".id_el").text();

    id_el = id_el.trim();

    $("#id_url").val(id_el);

    let val = $(e)
        .parents()
        .parents()
        .children(".shortener_url")
        .children("a")
        .children("span")
        .text();

    val = val.trim();

    $("#modal_current_url_short").val(val);
}

/* my_ajax - edit currenty url short*/
$("#edit_url").on("submit", function (e) {
    e.preventDefault();

    $("#" + $("#id_url").val() + ">span").text(
        $("#modal_current_url_short").val()
    );

    /* let arr_url = $("#modal_current_url_short").val().split("/");
    arr_url.shift();
    let str_url = arr_url.join("/"); */

    let data_json = JSON.stringify({
        id_url: $("#id_url").val(),
        val_short: $("#modal_current_url_short").val(),
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/updateid",
        type: "POST",
        data: data_json,
        dataType: "json",
        contentType: "application/json",

        success: function (response) {
            console.log(response);
            alert(response["success"]);
        },
    });
});
