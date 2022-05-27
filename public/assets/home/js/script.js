/** Draggableで使用 */
$(function () {
    const tr = $(".sortable");
    tr.sortable();
    tr.disableSelection();
    $("#submit").on('click', function () {
        $("#list-ids").text(tr.sortable("toArray").join(','));
    });

    // 置き換えようとして失敗中
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

/** 文字を小さくしていく */
function resize(textElem)
{
    console.log(textElem.getBoundingClientRect().height , textElem.scrollHeight);
    const regionHeight = textElem.getBoundingClientRect().height;
    const actualHeight = textElem.scrollHeight;
    textElem.setAttribute("style", 'font-size: 30px');
    for (let size = 30; regionHeight < actualHeight && size >= 1; size -= 1) {
        textElem.setAttribute("style", `font-size: ${size}px`);
    }
}
