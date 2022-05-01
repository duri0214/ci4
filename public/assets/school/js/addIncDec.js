// TODO: テキストエリアを増減する外部jsファイルを作る
// https://4ndan.com/blog/form/
// https://qiita.com/Yuji-207/items/0b0bd72330974186be8c

function addIncreaseAbility(obj, classToIncrease)
{
    obj.addEventListener("click", function () {
        const aObjectToIncrease = classToIncrease.last();
        aObjectToIncrease.clone().val('').insertAfter(aObjectToIncrease);  // inputを最後尾に追加
        // if ($('.text').length >= 2) {
        //     $(btn_remove).show();  // inputが2つ以上あるときに削除ボタンを表示
        // }
    })
}

function addDecreaseAbility(obj)
{

}

// button
const btn_clone = $('.btn-clone');  // 追加ボタン
const btn_remove = $('.btn-remove');  // 削除ボタン

// clone
btn_clone.click();

// remove
btn_remove.click(function () {
    $('.text').last().remove();
    if ($('.text').length < 2) {
        btn_remove.hide();  // inputが2つ未満のときに削除ボタンを非表示
    }
});
