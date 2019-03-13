// here we check the input fields
$(function() {
    // form create line
    $("#createLine").on('click', function(e) {
        let fail = false;
        let inputs = $('#line');

        if (inputs.val() == '' || inputs.val() <= 0) {
            $(inputs).addClass('required');
            fail = true;
        } else {
            $(inputs).removeClass('required');
            fail = false;
        }

        // if there is a fail prevent from sending the page
        if (fail) {
            e.preventDefault();
            console.log(inputs);
        } else {
            console.log(inputs);
        }
    });
    
    // form create station
    $("#submitStation").on('click', function(e) {
        let fail = false;
        let inputs = $('#station :input[type="text"], #station :input[type="number"]');

        let values = {};
        inputs.each(function() {
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
    $("#submitLine").on('click', function(e) {
        e.preventDefault();
        let fail = false;
    //     $.each($('#line').serializeArray(), function(i, field) {
    //         values[field.name] += field.value;
    //     });
        let inputs = $('#line :input:not(:disabled)');
        let $mainstation = $("input[name='mainstation']:checked").val();

        // not sure if you wanted this, but I thought I'd add it.
        // get an associative array of just the values.
        let values = {};
        inputs.each(function() {
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