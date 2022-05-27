$(function () {
    const tr = $(".sortable");
    tr.sortable();
    tr.disableSelection();
    $("#submit").on('click', function () {
        $("#list-ids").text(tr.sortable("toArray").join(','));
    });

    // $('.sortable').sortable({
    //     opacity: 0.5,
    //     placeholder: "drag",
    //     handle: '.sortable',
    //     axis: 'x',
    //     update: function ( event, ui ) {
    //         const updateRows = $(this).sortable('toArray').join(',');
    //         $(this).closest('.table-bordered').find('.to_array_text').text(updateRows);
    //     }
    // });
});
