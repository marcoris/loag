// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#personalnumber").val() == '') {
            $("#personalnumber").addClass("required");
            fail = true;
        } else {
            $("#personalnumber").removeClass("required");
        }
        if ($("#name").val() == '') {
            $("#name").addClass("required");
            fail = true;
        } else {
            $("#name").removeClass("required");
        }
        if ($("#surname").val() == '') {
            $("#surname").addClass("required");
            fail = true;
        } else {
            $("#surname").removeClass("required");
        }
        if ($("#category").val() == '') {
            $("#category").addClass("required");
            fail = true;
        } else {
            $("#category").removeClass("required");
        }
        if ($("#login").val() == '') {
            $("#login").addClass("required");
            fail = true;
        } else {
            $("#login").removeClass("required");
        }
        if ($("#password").val() == '') {
            $("#password").addClass("required");
            fail = true;
        } else {
            $("#password").removeClass("required");
        }

        if (fail) {
            e.preventDefault();
        }
    });

    $(".delete").on('click', function(e){
        if (!confirm('Wirklich löschen?')) {
            e.preventDefault();
        }
    });
});