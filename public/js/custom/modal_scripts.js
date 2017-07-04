function show_modal(modal){
    $(modal).modal('show');
    $('.ui.radio.checkbox').checkbox();
    $('.ui.checkbox').checkbox();
    $('.ui.dropdown')
        .dropdown()
    ;
}


function hide_modal(){
    $('.modal').modal('hide')
        .find("input,textarea,select").not($("input[name='_token']"))
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
    $('form').children().removeClass("error").find(".ui.message").remove();
    $("div.error").removeClass("error");

}
$(".open-modal").on('click', function(){
    show_modal($(this).data("this-modal"));
});
$(".close-modal").on('click', function(){
    hide_modal();
});