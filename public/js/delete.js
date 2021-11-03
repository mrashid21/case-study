$(document).ready(function () {

    $('.sa-warning').click(function (e) {
        
        route = $(this).data('route');
        id = $(this).data('id');
        title = $(this).data('title');
        restore = $(this).data('restore');

        $('#title').html(title);
        if(restore) {
            $('#form-restore').attr('action', route + '/' + id + '/' + restore);
            $('#modal-restore').modal('show');
        } else {
            $('#form-delete').attr('action', route + '/' + id);
            $('#modal-delete').modal('show');
        }


        
    });
});

