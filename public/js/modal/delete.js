$('#modal-delete').on('show.bs.modal', function (event) {
    var url = $(event.relatedTarget).data('url');
    $(this).find('form').attr('action', url);
})

/*$('.delete-item').on('click', function (event) {
    var url = $(this).data('url');
    var token = $('[name=_token]').val();

    $.ajax({
        url: url,
        type: 'DELETE',
        data: {_token:token},
        success: function(result,status,xhr) {

            console.log(result);
            console.log(status);
            console.log(xhr);
        },
        error: function(xhr,status,error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
})*/
