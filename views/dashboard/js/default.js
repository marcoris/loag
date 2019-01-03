$(function() {

    $(":submit").on('click', function(e) {
        if($("#password").val() == '') {
            e.preventDefault();
            $("#password").addClass("required");
        } else {
            $("#password").removeClass("required");
        }
    });
    // get list
    // $.get('dashboard/xhrGetListings', function(data) {
    //    for (var i = 0; i < data.length; i++) {
    //        $('#listInserts').append('<li>'+data[i].text+'<a rel="'+data[i].id+'" class="delete" href="#">X</a></li>');
    //     }

    //     // delete item
    //     $('.delete').on('click', function() {
    //         var id = $(this).attr('rel');
    //         $(this).parent().remove();

    //         $.post('dashboard/xhrDeleteListing', {'id': id});
    
    //         return false;
    //     });
    // }, 'json');
    
    // // post insert and add it in the list
    // $('#randomInsert').submit(function() {
    //     var url = $(this).attr('action');
    //     var data = $(this).serialize();
    //     $("#textfield").val('');
        
    //     $.post(url, data, function(res) {
    //         $('#listInserts').append('<li>'+res.text+'<a rel="'+res.id+'" class="delete" href="#">X</a></li>');
        
    //     // delete item
    //     $('.delete').on('click', function() {
    //         var id = $(this).attr('rel');
    //         $(this).parent().remove();

    //         $.post('dashboard/xhrDeleteListing', {'id': id});
    
    //         return false;
    //     });
    // }, 'json');

    //     return false;
    // });
});