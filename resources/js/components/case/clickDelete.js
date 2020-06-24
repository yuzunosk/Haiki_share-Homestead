// =================
// DOM取得
// =================
const clickDelete = document.getElementById("js-click-delete");
// =================
// 処理
// =================
// --- delete処理 ---
if (clickDelete != null) {
    const $ProductId = document.getElementById("js-click-delete").dataset.id;
    console.log($ProductId);

    clickDelete.addEventListener("click", function() {
        // alert("クリックされました");
        //画面を遷移させる
        const $res = confirm("商品を削除しますか？");
        if ($res) {
            window.location.href = "/store/product/delete/" + $ProductId;
        }
    });
}
