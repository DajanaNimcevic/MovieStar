$(document).ready(function() {
    $(document).on("click",".seat", function () {
        var row = $(this).data('row');
        var column = $(this).data('column');
        var id_screening = $(this).data('screening');
        var user = $(this).data('user');

        if ($(this).hasClass('occupied')) {
            return;
        } else if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $.post("reservation.php", {
                row: row,
                column: column,
                user: user,
                id_screening: id_screening,
                action: 'remove'
            });
        } else {
            $(this).addClass('selected');

            $.post("reservation.php", {
                row: row,
                column: column,
                user: user,
                id_screening: id_screening,
                action: 'reserve'
            });
        }
    });

});