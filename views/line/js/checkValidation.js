// here we check the input fields
$(function () {
    // form create station
    $("#submitStation").on('click', function(e){
        var fail = false;
        var $inputs = $('#station :input[type="text"], #station :input[type="number"]');

        var values = {};
        $inputs.each(function() {
            if ($(this).val() == '' || $(this).val() <= 0) {
                $(this).addClass('required');
                fail = true;
            } else {
                $(this).removeClass('required');
                fail = false;
                values[this.id] = $(this).val();
            }
        });

        // if there is a fail prevent from sending the page
        if (fail) {
            e.preventDefault();
        } else {
            console.log(values);
        }
    });

    // form save stations
    $("#submitLine").on('click', function(e){
        e.preventDefault();
        var fail = false;
    //     $.each($('#line').serializeArray(), function(i, field) {
    //         values[field.name] += field.value;
    //     });
        var $inputs = $('#line :input:not(:disabled)');
        var $mainstation = $("input[name='mainstation']:checked").val();

        // not sure if you wanted this, but I thought I'd add it.
        // get an associative array of just the values.
        var values = {};
        $inputs.each(function() {
            if ($(this).val() == '') {
                $(this).addClass('required');
                fail = true;
            } else {
                $(this).removeClass('required');
                fail = false;
                values[this.id] = $(this).val();
            }
        });
        if (fail) {
            console.log(fail);
        } else {
            console.log(values);
            console.log($mainstation);
        }
    })

    // delete function
    $(".delete").on('click', function(e){
        if (!confirm('Wirklich löschen?')) {
            e.preventDefault();
        } else {
            e.preventDefault();
            console.log($(this).attr('id'));
        }
    });
});