// here we check the input fields
$(function () {
    // check the input fields
    // var values = {};
    $(":submit").on('click', function(e){
        // e.preventDefault();
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

    // sorting up function
    $(".sort_up").on('click', function(e){
        e.preventDefault();
        $(this).attr('id');
        console.log($(this).attr('id'));
    });

    // sorting down function
    $(".sort_down").on('click', function(e){
        e.preventDefault();
        console.log($(this).attr('id'));
    });

    // adding new row function
    $(".add").on('click', function(e){
        e.preventDefault();
        console.log($(this).attr('id'));

        var new_row = "<tr>";
        new_row += "<td><input type='text' name='station_X' id='station_X'></td>";
        new_row += "<td><input type='text' name='time_x' id='time_x'></td>";
        new_row += "<td>";
        new_row += '<label><input type="radio" name="mainStation_x" data-id="" class="set_mainstation">HB</label>';
        new_row += '<a class="btn btn-warning sort_up" id="sort_up_x" href="#"><i class="fas fa-angle-up"></i></a> ';
        new_row += '<a class="btn btn-warning sort_down" id="sort_down_x" href="#"><i class="fas fa-angle-down"></i></a> ';
        new_row += '<a class="btn btn-danger delete" id="delete_x" href="#"><i class="fas fa-trash"></i></a> ';
        new_row += '<a class="btn btn-success add" id="add_x" href="#"><i class="fas fa-plus"></i></a>';
        new_row += '</td></tr>';

        $(this).parent().parent().before(new_row);
    });

    // setting mainstation
    // $(".set_mainstation").on('click', function(e){
    //     // save over ajax request
    //     var id = $(this).data('id');
    //     var name = $(this).attr('name').split("mainStation_");
    //     console.log(id);
    //     console.log(name[1]);

    //     $.post('line/saveMainstation', {'stationid': id, 'fk_line': name[1]});

    //     // return false;
    // });
});