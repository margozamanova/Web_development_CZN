let countJava = 0;
$("textarea").on('change keyup paste', function() {
    if ($(this).val().match(/#\J/)) {
        $('.text-well').html(countJava++);
    }
}); 