/**
 * Created by MiKoRiza-OnE on 10/17/2015.
 */

$(function () {
    lightbox.option({
        'wrapAround': true
    });
    $('#delete-confirmation').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
});