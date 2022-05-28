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

/**
 * elに入力された「テキストの高さ」が枠の高さより大きい間、サイズを1pxづつ下げる
 * （※Chromeは可読性を維持するため、10px以下のフォントサイズを指定したテキストも10pxで表示される仕様になっている）
 * @param {HTMLElement} el - テキストを表示するhtml要素
 * @param {number} default_px - 初期化基準となるフォントサイズ
 */
function resize(el, default_px)
{
    // get the frame size
    const regionHeight = el.getBoundingClientRect().height;

    // reset
    el.setAttribute("style", `font-size: ${default_px}px`);

    // (DELETE ME) measure the size: before
    let fontSize = window.getComputedStyle(el, null).getPropertyValue('font-size');
    console.log(`before: actualHeight : regionHeight ? ${el.scrollHeight} : ${regionHeight} (${fontSize})`);

    // decrease
    for (let size = default_px; el.scrollHeight > regionHeight && size >= 1; size -= 1) {
        el.setAttribute("style", `font-size: ${size}px`);
    }

    // (DELETE ME) measure the size: after
    fontSize = window.getComputedStyle(el, null).getPropertyValue('font-size');
    console.log(`after: actualHeight : regionHeight ? ${el.scrollHeight} : ${regionHeight} (${fontSize})`);
}
